<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\ProfileView;

class ProfileController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function show(string $id): View
    {
        $users_profile = User::find($id);
        $is_profile_of_logged_in_user = true;

        if ($users_profile->id !== Auth::id()) {
            $is_profile_of_logged_in_user = false;
            $visitorId = Auth::id();
            $profileView = new ProfileView();
            $profileView->user_id = $users_profile->id;
            $profileView->visitor_id = $visitorId;
            $profileView->viewed_at = now()->toDateTimeString();
            $profileView->save();
        }

        return view('profile.edit', [
            'user' => $users_profile,
            'is_profile_of_logged_in_user' => $is_profile_of_logged_in_user
        ]);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'is_profile_of_logged_in_user' => true
        ]);
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
