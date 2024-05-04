<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'videos' => Video::orderBy('created_at', 'DESC')->paginate(3)
        ]);
    }
}
