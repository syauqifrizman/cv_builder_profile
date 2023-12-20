<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{

    public function goToProfile(){
        return view('profile', [
            "title" => "Profile Page"
        ]);
    }
    public function goToPassword(){
        return view('change_password', [
            "title" => "Password Page"
        ]);
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::id());
        // $user = Auth::user();

        // Validate the form data
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'confirm_password' => 'required|string',
        ]);
        if (!Hash::check($request->input('confirm_password'), $user->password)) {
            return redirect()->back()->with('error', 'The password is incorrect.');
        }

        $user->username = $request->input('username');
        $user->email = $request->input('email');

        $user->save();

        return redirect()->route('updatePage',)->with('success', 'Profile updated successfully.');

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
            return redirect()->back()->with('error', 'The old password is incorrect.');
        }

        // Update the user's password
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        return redirect()->route('updatePage')->with('success', 'Password changed successfully.');
    }
}
