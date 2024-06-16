<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Google\Client;
use Google\Service\YouTube;

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
            ->orderBy('created_at', 'DESC');

        if (request()->has('search')) {
            $publishedVideos = $publishedVideos->where('description', 'like', '%' . request()->get('search', '') . '%');
        }

        $videos = $publishedVideos->paginate(6, ['*'], 'due');

        return view('tools.videos-uploaded')->with('videos', $videos);
    }

    public function unpublishedVideos()
    {
        $unpublishedVideos = Video::where('user_id', auth()->id())
            ->where('published', false)
            ->orderBy('created_at', 'DESC');


        if (request()->has('search')) {
            $unpublishedVideos = $unpublishedVideos->where('description', 'like', '%' . request()->get('search', '') . '%');
        }

        $videos = $unpublishedVideos->paginate(6, ['*'], 'due');

        return view('tools.videos-due')->with('videos', $videos);
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
