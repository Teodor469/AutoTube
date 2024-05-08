<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // return view('dashboard', [
        //     'videos' => Video::orderBy('created_at', 'DESC')->paginate(3, ['*'], 'due'),
        //     'publishedVideos' => Video::where('published', true)->paginate(3, ['*'], 'posted'),
        // ]);

        return view('dashboard')->with([
            'videos' => Video::where('published', false)->orderBy('created_at', 'DESC')->paginate(3, ['*'], 'due'),
            'publishedVideos' => Video::where('published', true)->orderBy('created_at', 'DESC')->paginate(3, ['*'], 'posted'),
        ]);
    }
}
