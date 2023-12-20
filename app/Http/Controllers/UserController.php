<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function goToLoginPage(){
        return view('login.index', [
            "title" => "Login Page"
        ]);
    }

    public function goToRegisterPage(){
        return view('register.index', [
            "title" => "Register Page"
        ]);
    }

    public function registerAccount(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email:dns|unique:users',
            'email_confirmation' => 'required|email:dns|same:email',
            'password' => 'required|min:5|max:255|confirmed',
            'password_confirmation' => 'required|min:5|max:255|',
            'tos_checkbox' => 'accepted'
        ]);

        $userData = [
            'email' => $validatedData['email'],
            'username' => $this->generateUsername($validatedData['email']),
            'password' => Hash::make($validatedData['password']),
        ];

        User::create($userData);

        return redirect()->route('loginPage')->with('success', 'Registration Success');
    }

    public function loginAccount(Request $request){
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user(); // Get the authenticated user
            // $userId = $user->id;
            return redirect()->route('dashboard', ['username' => $user->username])->with('success', 'Login Success');
        }else{
            session()->flash('error', 'Email atau Password Salah');
            return redirect()->route('loginPage')->with('error', 'Invalid Credential');
        }
    }
    public function logoutAccount()
    {
        Auth::logout();
        return redirect()->route('loginPage');
    }

    private function getLastUserId(){
        $lastUser = User::latest('id')->first();

        if($lastUser){
            return $lastUser->id + 1;
        }

        return 1;
    }

    private function generateUsername($email){
        $user_id = $this->getLastUserId();

        $baseUsername = substr($email, 0, strpos($email, '@'));

        $maxbaseUsernameLength = 15;
        $minbaseUsernameLength = 6;
        if (strlen($baseUsername) > $maxbaseUsernameLength) {
            $baseUsername = substr($baseUsername, 0, $maxbaseUsernameLength);
        }
        else if(strlen($baseUsername) < $minbaseUsernameLength){
            $baseUsername = str_pad($baseUsername, $minbaseUsernameLength, 'user_', STR_PAD_LEFT);
        }

        $generatedUsername = $baseUsername . $user_id;

        return $generatedUsername;
    }
}
