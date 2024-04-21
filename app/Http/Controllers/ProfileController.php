<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function updatePicture(Request $request)
    {
        // Validate the request data
        $request->validate([
            'profile_picture' => 'required|image|max:10000', // Maximum file size of 10MB
        ]);

        // Get the user
        $user = Auth::user();

        // If the user already has a profile picture, delete it
        if ($user->profile_picture) {
            Storage::delete($user->profile_picture);
        }

        // Store the new profile picture in the storage directory
        $imageName = now()->format('YmdHis') . '_' . $request->file('profile_picture')->getClientOriginalName();
        $request->file('profile_picture')->storeAs('public/profile_pictures', $imageName);

        // Update the user's profile_picture field with the new image path
        $user->update(['profile_picture' => 'profile_pictures/' . $imageName]);

        // Redirect back with a success message
        return redirect()->back()->with('status', 'profile-updated.');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
