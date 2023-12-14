@extends('layout.master')

@section('content')

    <div class="parent h-screen w-screen">
        <div class="flex h-screen">
            <div class="left-content w-1/2 p-5 bg-sky-50">
                <div class="flex justify-center items-center h-full">
                    <div class="p-5 w-4/5">
                        <div class="top-0 text-3xl font-bold flex justify-center p-5">
                            Welcome Back!
                        </div>
                        <img src="{{ asset('assets/login_img.svg') }}" alt="" class="rounded-lg">
                    </div>
                </div>
            </div>

            <div class="right-content w-1/2 p-5">
                <div class="flex justify-center items-center h-full">
                    <div class="bg-sky-50 rounded border border-solid border-sky-50 p-5 w-4/5">
                        <div>
                            @if (session()->has('success'))
                                <div class="bg-green-50 rounded border border-solid border-green-50 p-2">
                                    <div class="flex justify-center items-center">
                                        <h1 class="text-lg text-green-800 italic">{{ session('success') }}</h1>
                                    </div>
                                </div>
                            @endif
                            <h1 class="text-2xl font-bold flex justify-center items-center">Login</h1>
                        </div>

                        <form action="{{ route('actionlogin') }}" method="post">
                            @csrf
                            <div class="container grid grid-rows-2 gap-4">
                                <div>
                                    <label for="email" class="mb-2 block">Username/Email</label>
                                    <input required type="email" name="email" id="email" placeholder="Masukkan alamat email anda, e.g. syauqi@gmail.com" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" class="w-full h-10 rounded pl-4">
                                </div>

                                <div>
                                    <label for="password" class="mb-2 block">Password</label>
                                    <input required type="password" name="password" id="password" placeholder="Masukkan password anda" class="w-full h-10 rounded pl-4">
                                </div>
                            </div>
                            <div>
                                <div class="mt-4">
                                    <a href="#" class="underline text-blue-500">Forgot password?</a>
                                </div>

                                <div class="mt-4 flex justify-center items-center">
                                    <button type="submit" class="btn-solid">LOGIN</button>
                                </div>

                                <div class="mt-2 flex justify-center items-center">
                                    <p>Don't have an account? <a href="{{ route('register') }}" class="underline text-blue-500">Register</a></p>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
