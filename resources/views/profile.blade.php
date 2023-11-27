@extends('layout.master')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <form action="{{ url('profile_update.blade.php') }}" method="post">
            @csrf
            <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md p-8 w-96">
                <div class="pt-5">
                    <h1 class="text-2xl font-medium">Profile</h1>
                </div>

                <div class="mt-4">
                    <label for="nama" class="mb-2 block">Username</label>
                    <input required type="text" name="username" id="nama" placeholder="JohnDoe" class="w-full h-10 rounded pl-4 bg-gray-200" readonly>
                </div>

                <div class="mt-4">
                    <label for="email" class="mb-2 block">Email</label>
                    <input required type="email" name="email" id="email" placeholder="john@example.com" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" class="w-full h-10 rounded pl-4 bg-gray-200" readonly>
                </div>

                <div class="mt-5 pb-5 flex justify-end items-end">
                    <button type="submit" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Update profile</button>
                </div>
                <div class="mt-2 pb-5">
                    <p class="text-sm text-gray-600">Click the text below to change your password:</p>
                    <a href="{{ url('change_password.blade.php') }}" class="text-blue-500 underline">Change Password</a>
                </div>
            </div>
        </form>

    </div>
@endsection

