<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.profileEdit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
  
    public function update(Request $request): RedirectResponse
    {
        $user = Auth::user(); // Get the authenticated user
    
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'lowercase', 'email', 'max:255',
                Rule::unique(User::class)->ignore($user->id), // Use $user instead of $this->user()
            ],
        ]);
    
        $user->fill($request->only('name', 'email')); // Use only the specified fields to fill
        $user->save();
    
        return redirect()->route('profile.profileEdit')->with('status', 'profil mis à jour');
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



public function updatePassword(Request $request): RedirectResponse
{
    $validated = $request->validateWithBag('updatePassword', 
    [
        'current_password' => ['required', 'current_password'],
        'password' => ['required', Password::defaults(), 'confirmed'],
    ]);

    $request->user()->update([
        'password' => Hash::make($validated['password']),
    ]);

    return back()->with('status', 'password-updated');
}

    
}
