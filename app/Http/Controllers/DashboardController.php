<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $unpublishedVideos = Video::where('user_id', auth()->id())
                                  ->where('published', false)
                                  ->orderBy('created_at', 'DESC')
                                  ->paginate(3, ['*'], 'due');

        $publishedVideos = Video::where('user_id', auth()->id())
                                ->where('published', true)
                                ->orderBy('created_at', 'DESC')
                                ->paginate(3, ['*'], 'posted');

        return view('dashboard')->with([
            'videos' => $unpublishedVideos,
            'publishedVideos' => $publishedVideos,
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

    public function videosDue()
    {
        return view('tools.videos-due');
    }
}
