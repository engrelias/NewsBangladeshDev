<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


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


        public function adminEdit($id): View
        {
            $user = \App\Models\User::find($id);
            return view('admin.profile.index', [
                'user' => $user,
            ]);
        }


        public function adminUpdate(Request $request, $id)
        {
            $user = User::findOrFail($id);

             // Handle file upload if exists
            if ($request->hasFile('profile_photo_path')) {
                if ($user->profile_photo_path) {
                    Storage::disk('public')->delete($user->profile_photo_path);
                }
                $user->profile_photo_path = $request->file('profile_photo_path')->store('admin', 'public');
            }
            

            // Update user
            $user->update([
                'name' => $request->name,
                'profile_photo_path' =>  $user->profile_photo_path,
                'email' => $request->email,
                'user_role' => $request->user_role
            ]);

            return Redirect::route('admin.dashboard')->with('success', 'Profile updated successfully!');
        }



        public function adminPasswordChange(Request $request): RedirectResponse
        {
            $validated = $request->validateWithBag('updatePassword', [
                'current_password' => ['required', 'current_password'],
                'password' => ['required', Password::defaults(), 'confirmed'],
            ]);

            $request->user()->update([
                'password' => Hash::make($validated['password']),
            ]);

            Auth::logout();

            return back()->with('status', 'password-updated');
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
