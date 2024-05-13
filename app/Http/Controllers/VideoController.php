<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function show(Video $video)
    {
        return view('videos.show', compact('video'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'video_path' => 'required|mimes:mp4,mov,avi|max:50000',
            'scheduled_time' => 'date|nullable',
        ]);

        if ($request->has('video_path')) {
            $file = $request->file('video_path');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;

            $path = 'uploads/category/';
            $file->move($path, $filename);
        }


        Video::create(
            [
                'user_id' => auth()->user()->id,
                'description' => request()->get('description', ''),
                'video_path' => $path . $filename,
                'scheduled_time' => request()->get('scheduled_time', ''),
                'published' => request()->get('published', '')
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
