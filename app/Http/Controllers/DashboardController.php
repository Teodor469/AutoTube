<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function publishedVideos()
    {
        $publishedVideos = Video::where('user_id', auth()->id())
            ->where('published', true)
            ->orderBy('created_at', 'DESC')
            ->paginate(6, ['*'], 'posted');

        return view('tools.videos-uploaded')->with([
            'videos' => $publishedVideos
        ]);
    }

    public function unpublishedVideos()
    {
        $unpublishedVideos = Video::where('user_id', auth()->id())
            ->where('published', false)
            ->orderBy('created_at', 'DESC')
            ->paginate(6, ['*'], 'due');

        return view('tools.videos-due')->with([
            'videos' => $unpublishedVideos
        ]);
    }

    public function landingPage()
    {
        return view('landing-page');
    }

    public function uploadVideos()
    {
        return view('tools.submit-video');
    }
}
