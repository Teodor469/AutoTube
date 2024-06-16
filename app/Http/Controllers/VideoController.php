<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string',
            'video_path' => 'required|mimes:mp4,mov,avi|max:50000',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
            'scheduled_time' => 'date|nullable',
        ]);

        $videoPath = '';
        if ($request->has('video_path')) {
            $file = $request->file('video_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $path = 'uploads/category/';
            $file->move($path, $filename);

            $videoPath = $path . $filename;
            $validated['video_path'] = $videoPath;
        }

        $thumbnailPath = '';
        if ($request->has('thumbnail')) {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            $path = 'uploads/thumbnails/';
            $file->move($path, $filename);

            $thumbnailPath = $path . $filename;
            $validated['thumbnail'] = $thumbnailPath;
        }

        Video::create(
            [
                'user_id' => auth()->user()->id,
                'description' => $validated['description'],
                'video_path' => $videoPath,
                'thumbnail' => $thumbnailPath,
                'scheduled_time' => $validated['scheduled_time'] ?? null,
            ]
        );

        return redirect()->route('dashboard')->with('success', 'Video added successfully!');
    }

    public function destroy(Video $video)
    {
        if (auth()->id() !== $video->user_id) {
            abort(404);
        }

        $filePath = public_path($video->video_path);

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $video->delete();

        return redirect()->route('dashboard')->with('success', 'Video deleted successfully!');
    }

    public function edit(Video $video)
    {
        if (auth()->id() !== $video->user_id) {
            abort(404);
        }

        $editing = true;

        return view('videos.show', compact('video', 'editing'));
    }

    public function update(Video $video)
    {
        if (auth()->id() !== $video->user_id) {
            abort(404);
        }

        $validated = request()->validate([
            'description' => 'required|string',
        ]);

        $video->update($validated);

        return redirect()->route('videos.show', $video->id)->with('success', "Video updated successfully!");
    }
}
