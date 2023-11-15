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
                        <div class="flex justify-center items-center">
                            <h1 class="text-2xl font-bold">Login</h1>
                        </div>

                        <form action="" method="post">
                            <div class="container grid grid-rows-2 gap-4">
                                <div>
                                    <label for="email" class="mb-2 block">Username/Email</label>
                                    <input required type="email" name="input" id="email" placeholder="Masukkan alamat email anda, e.g. syauqi@gmail.com" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" class="w-full h-10 rounded pl-4">
                                </div>

                                <div>
                                    <label for="password" class="mb-2 block">Password</label>
                                    <input required type="password" name="input" id="password" placeholder="Masukkan password anda" class="w-full h-10 rounded pl-4">
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

    {{-- <div class="grid grid-cols-2 gap-4">
        <div id="left_content" class="">

        </div>

        <div id="right_content" class="w-4/6 h-screen flex flex-col justify-center mx-auto my-auto">
            <div class="bg-sky-50 rounded border border-solid border-sky-50 pt-5 pr-5 pb-5 pl-5">
                <div class="flex justify-center items-center">
                    <h1 class="text-2xl font-medium">Login</h1>
                </div>

                <form action="" method="post">
                    <div class="">
                        <div class="mt-4">
                            <label for="email" class="mb-2 block">Username/Email</label>
                            <input required type="email" name="input" id="email" placeholder="Masukkan alamat email anda, e.g. syauqi@gmail.com" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" class="w-full h-10 rounded pl-4">
                        </div>

                        <div class="mt-4">
                            <label for="password" class="mb-2 block">Password</label>
                            <input required type="password" name="input" id="password" placeholder="Masukkan password anda" class="w-full h-10 rounded pl-4">
                        </div>

                        <div class="mt-4">
                            <a href="#" class="underline text-blue">Forgot password?</a>
                        </div>

                        <div class="mt-4 flex justify-center items-center">
                            <button type="submit" class="bg-sky-800 text-white rounded-md px-6 py-2 border border-sky-800 hover:bg-sky-700">SIGN IN</button>
                        </div>

                        <div class="mt-2 flex justify-center items-center">
                            <p>Don't have an account? <a href="/signup" class="underline text-blue">Sign up</a></p>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection
