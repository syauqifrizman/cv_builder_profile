@extends('layout.master')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <form id="profileForm" action="{{ route('updateProfile') }}" method="post">
            @csrf
            <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md p-8 w-96">
                @if (session()->has('error'))
                    <div class="bg-red-50 rounded border border-solid border-red-50 p-2">
                        <div class="flex justify-center items-center">
                            <h1 class="text-lg text-red-800 italic">{{ session('error') }}</h1>
                        </div>
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="bg-green-50 rounded border border-solid border-green-50 p-2">
                        <div class="flex justify-center items-center">
                            <h1 class="text-lg text-green-800 italic">{{ session('success') }}</h1>
                        </div>
                    </div>
                @endif
                <div class="pt-5">
                    <h1 class="text-2xl font-medium">Profile</h1>
                </div>

                <!-- Add these hidden fields to store the original values -->
                <input type="hidden" name="original_username" value="{{ Auth::user()->username }}">
                <input type="hidden" name="original_email" value="{{ Auth::user()->email }}">

                <div class="mt-4">
                    <label for="nama" class="mb-2 block">Username</label>
                    <input required type="text" name="username" id="nama" placeholder="JohnDoe" class="w-full h-10 rounded pl-4 bg-gray-200" value="{{ Auth::user()->username }}" readonly>
                </div>

                <div class="mt-4">
                    <label for="email" class="mb-2 block">Email</label>
                    <input required type="email" name="email" id="email" placeholder="john@example.com" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" class="w-full h-10 rounded pl-4 bg-gray-200" value="{{ Auth::user()->email }}" readonly>
                </div>

                <!-- Confirm Password fields initially hidden -->
                <div id="confirmPasswordFields" class="hidden mt-4">
                    <label for="confirm_password" class="mt-2 mb-2 block">Confirm Password</label>
                    <input required type="password" name="confirm_password" id="confirm_password" class="w-full h-10 rounded pl-4 bg-white">
                </div>

                <div class="mt-5 pb-5 flex justify-end items-end">
                    <button type="submit" id="updateButton" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700" onclick="toggleForm()">Update Profile</button>
                </div>
                <div class="mt-2 pb-5">
                    <p class="text-sm text-gray-600">Click the text below to change your password:</p>
                    <a href="{{ route('changePasswordPage')}}" class="text-blue-500 underline">Change Password</a>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>




        <script>
            function toggleForm() {
                var usernameInput = document.getElementById('nama');
                var emailInput = document.getElementById('email');
                var updateButton = document.getElementById('updateButton');
                var confirmPasswordFields = document.getElementById('confirmPasswordFields');

                usernameInput.readOnly = !usernameInput.readOnly;
                emailInput.readOnly = !emailInput.readOnly;

                // Toggle background color for the username and email fields
                usernameInput.style.backgroundColor = usernameInput.readOnly ? '#f3f4f6' : 'white';
                emailInput.style.backgroundColor = emailInput.readOnly ? '#f3f4f6' : 'white';

                if (!usernameInput.readOnly) {
                    // If fields are editable, show Confirm Password fields
                    confirmPasswordFields.classList.remove('hidden');
                    updateButton.textContent = 'Confirm';
                } else {
                    // If fields are not editable, hide Confirm Password fields
                    confirmPasswordFields.classList.add('hidden');
                    updateButton.textContent = 'Update Profile';
                }
            }
        </script>

    </div>
@endsection
