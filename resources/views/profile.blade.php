@extends('layout.master')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <form id="profileForm" action="{{ route('redirect.page', ['profile_update']) }}" method="post">
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

                <!-- Confirm Password fields initially hidden -->
                <div id="confirmPasswordFields" class="hidden mt-4">
                    <label for="confirm_password" class="mt-2 mb-2 block">Confirm New Password</label>
                    <input required type="password" name="confirm_password" id="confirm_password" class="w-full h-10 rounded pl-4 bg-white">
                </div>

                <div class="mt-5 pb-5 flex justify-end items-end">
                    <button type="button" id="updateButton" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700" onclick="toggleForm()">Update Profile</button>
                </div>
                <div class="mt-2 pb-5">
                    <p class="text-sm text-gray-600">Click the text below to change your password:</p>
                    <a href="{{ route('redirect.page', ['change_password']) }}" class="text-blue-500 underline">Change Password</a>
                </div>
            </div>
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
