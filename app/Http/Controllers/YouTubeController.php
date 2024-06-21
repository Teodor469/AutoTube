<?php

namespace App\Http\Controllers;

use Google\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class YouTubeController extends Controller
{

public function index(Request $request)
{
    // Set the redirect URL
    $redirectUrl = 'https://redirectmeto.com/https://demo.test';

    // Create and configure Google client
    $client = new Client();
    $client->setAuthConfig(base_path('autotube.json'));
    $client->setRedirectUri($redirectUrl);
    $client->addScope('https://www.googleapis.com/auth/youtube');

    // === SCENARIO 1: PREPARE FOR AUTHORIZATION ===
    $authUrl = "";
    if (!$request->has('code') && !Session::has('google_oauth_token')) {
        $codeVerifier = $client->getOAuth2Service()->generateCodeVerifier();
        Session::put('code_verifier', $codeVerifier);

        // Get the URL to Google’s OAuth server to initiate the authentication and authorization process
        $authUrl = $client->createAuthUrl();
        return Redirect::away($authUrl);
    }

    // === SCENARIO 2: COMPLETE AUTHORIZATION ===
    // If we have an authorization code, handle callback from Google to get and store access token
    if ($request->has('code')) {
        $token = $client->fetchAccessTokenWithAuthCode($request->input('code'), Session::get('code_verifier'));
        $client->setAccessToken($token);
        Session::put('google_oauth_token', $token);
        return Redirect::away($redirectUrl);
    }

    // === SCENARIO 3: ALREADY AUTHORIZED ===
    // If we’ve previously been authorized, we’ll have an access token in the session
    if (Session::has('google_oauth_token')) {
        $client->setAccessToken(Session::get('google_oauth_token'));
        if ($client->isAccessTokenExpired()) {
            Session::forget('google_oauth_token');
            $connected = false;
        } else {
            $connected = true;
        }
    } else {
        $connected = false;
    }

    // === SCENARIO 4: TERMINATE AUTHORIZATION ===
    if ($request->has('disconnect')) {
        Session::forget(['google_oauth_token', 'code_verifier']);
        return redirect($redirectUrl);
    }

    return view('tools.youtube-dashboard')->with(['connected' => $connected, 'authUrl' => $authUrl ?? null]);
}

}
