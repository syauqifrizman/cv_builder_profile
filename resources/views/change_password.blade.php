@extends('layout.master')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <form action="{{ url('profile.blade.php') }}" method="post">
            @csrf
            <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md p-8 w-96">
                <div class="pt-5">
                    <h1 class="text-2xl font-medium">Change Password</h1>
                </div>

                <div class="mt-4">
                    <label for="old_password" class="mb-2 block">Old Password</label>
                    <input required type="password" name="old_password" id="old_password" class="w-full h-10 rounded pl-4">
                </div>

                <div class="mt-4">
                    <label for="new_password" class="mb-2 block">New Password</label>
                    <input required type="password" name="new_password" id="new_password" class="w-full h-10 rounded pl-4">
                </div>

                <div class="mt-4">
                    <label for="confirm_password" class="mb-2 block">Confirm New Password</label>
                    <input required type="password" name="confirm_password" id="confirm_password" class="w-full h-10 rounded pl-4">
                </div>

                <div class="mt-5 pb-5 flex justify-end items-end">
                    <button type="submit" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Change Password</button>
                </div>
            </div>
        </form>
    </div>
@endsection
