<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{

    public function logout()
    {
        Auth::logout();
        return redirect()->route('redirect.page', ['page' => 'login']);
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::id());
        // $user = Auth::user();

        // Validate the form data
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'confirm_password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        return $fail('The current password is incorrect.');
                    }
                },
            ],
        ]);

        $user->username = $request->input('username');
        $user->email = $request->input('email');

        $user->save();

        return redirect()->route('redirect.page', ['profile'])->with('success', 'Profile updated successfully.');

    }

    public function changePassword(Request $request)
    {
        $user = User::find(Auth::id());

        // Validate the form data
        $request->validate([
            'old_password' => 'required|string',
            'new_password' => 'required|string',
            'confirm_password' => 'required|string|same:new_password',
        ]);

        // Check if the old password matches the user's current password
        if (!Hash::check($request->input('old_password'), $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.'])->withInput();
        }

        // Update the user's password
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->route('redirect.page', ['profile'])->with('success', 'Password changed successfully.');
    }
}
