<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{

    public function index(){
        return view('register.index', [
            "title" => "Register Page"
        ]);
    }

    // public function create(){
    //     return view('register.index');
    // }

    // public function store(Request $request)
    // {

    //     $this->validate(request(), [
    //         'username' => 'required',
    //         'email' => 'required|email',
    //         'password' => 'required|confirmed'
    //     ]);

    //     $user = User::create([
    //         'username' => $request->username,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);
    //     // $user = new User([
    //     //     'username' => $request->username,
    //     //     'email' => $request->email,
    //     //     'password' => Hash::make($request->password),
    //     // ]);
    //     // $user->save();

    //     // auth()->login($user);
    //     if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
    //         $request->session()->regenerate();

    //         return redirect()->intended('dashboard');
    //     }

    //     // return redirect()->to('dashboard');
    // }

    public function store(Request $request){
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

        return redirect()->route('login')->with('success', 'Registration Success');
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
