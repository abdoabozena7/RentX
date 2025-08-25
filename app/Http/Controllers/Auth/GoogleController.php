<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
// Note: this controller relies on the Laravel Socialite package.
use Laravel\Socialite\Facades\Socialite;

/**
 * Handle Google OAuth authentication.
 *
 * To enable Google login and registration, ensure you have installed
 * laravel/socialite and configured GOOGLE_CLIENT_ID, GOOGLE_CLIENT_SECRET
 * and GOOGLE_REDIRECT_URI in your .env file.
 */
class GoogleController extends Controller
{
    /**
     * Redirect the user to Google's OAuth page.
     */
    public function redirect()
    {
        // Check if the Socialite class exists. If not, abort gracefully with
        // a helpful error message instead of causing an internal server error.
        if (!class_exists(\Laravel\Socialite\Facades\Socialite::class)) {
            abort(500, 'Google login is not configured. Install laravel/socialite and set up your Google credentials.');
        }
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function callback()
    {
        // Ensure Socialite is available before attempting to process the callback.
        if (!class_exists(\Laravel\Socialite\Facades\Socialite::class)) {
            abort(500, 'Google login is not configured. Install laravel/socialite and set up your Google credentials.');
        }
        $googleUser = Socialite::driver('google')->stateless()->user();
        // Find or create a user based on the Google account
        $user = User::firstOrCreate([
            'email' => $googleUser->getEmail(),
        ], [
            'name' => $googleUser->getName() ?: $googleUser->getNickname(),
            'password' => Hash::make(Str::random(16)),
        ]);
        Auth::login($user);
        return redirect()->route('dashboard');
    }
}