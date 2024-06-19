<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_YouTube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class YouTubeController extends Controller
{
    public function index(Request $request)
    {
        $client = $this->getClient();
        if ($request->has('code')) {
            $client->fetchAccessTokenWithAuthCode($request->get('code'));
            Session::put('access_token', $client->getAccessToken());
            return redirect()->route('dashboard');
        }

        if (Session::has('access_token')) {
            $client->setAccessToken(Session::get('access_token'));
            if ($client->isAccessTokenExpired()) {
                Session::forget('access_token');
                return redirect()->route('dashboard');
            }
        } else {
            $authUrl = $client->createAuthUrl();
            return redirect()->away($authUrl);
        }

        $youtube = new Google_Service_YouTube($client);
        $channelStats = $youtube->channels->listChannels('statistics', ['mine' => true]);

        $videoStats = $youtube->videos->listVideos('statistics', ['myRating' => 'like']);


        return view('dashboard', compact('channelStats', 'videoStats'));
    }

    public function oauthCallback(Request $request)
    {
        $client = $this->getClient();
        $client->fetchAccessTokenWithAuthCode($request->code);
        Session::put('access_token', $client->getAccessToken());

        return redirect()->route('dashboard');
    }

    private function getClient()
    {
        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(route('oauthCallback'));
        $client->addScope(Google_Service_YouTube::YOUTUBE_READONLY);

        return $client;
    }
}
