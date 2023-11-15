@extends('layout.master')

@section('content')

    <div class="parent h-screen w-screen">
        <div class="flex h-screen">
            <div class="left-content w-1/2 p-5">
                <div class="flex justify-center items-center h-full">
                    <div class="bg-sky-50 rounded border border-solid border-sky-50 p-5 w-4/5">
                        <div class="flex justify-center items-center">
                            <h1 class="text-2xl font-bold">Register</h1>
                        </div>

                        <form action="" method="post">
                            <div class="container grid grid-rows-3 gap-4">
                                <div>
                                    <label for="email" class="mb-2 block">Email</label>
                                    <input required type="email" name="input" id="email" placeholder="Masukkan alamat email anda, e.g. syauqi@gmail.com" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" class="w-full h-10 rounded pl-4">
                                </div>

                                <div>
                                    <label for="password" class="mb-2 block">Password</label>
                                    <input required type="password" name="input" id="password" placeholder="Masukkan password anda" class="w-full h-10 rounded pl-4">
                                </div>

                                <div>
                                    <label for="copassword" class="mb-2 block">Confirm Password</label>
                                    <input required type="password" name="input" id="copassword" placeholder="Masukkan password anda" class="w-full h-10 rounded pl-4">
                                </div>
                            </div>
                            <div>
                                <div class="mt-4 flex gap-2">
                                    <input type="checkbox" name="tos" id="tos" class="w-4">
                                    <p>By signing up, I accept ... <a href="" class="underline text-blue-500">Terms & Privacy Policy.</a></p>
                                </div>

                                <div class="mt-4 flex justify-center items-center">
                                    <button type="submit" class="btn-solid">REGISTER</button>
                                </div>

                                <div class="mt-2 flex justify-center items-center">
                                    <p>Already have an account? <a href="{{ route('login') }}" class="underline text-blue-500">Login</a></p>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="right-content w-1/2 p-5 bg-sky-50">
                <div class="flex justify-center items-center h-full">
                    <div class="p-5 w-4/5">
                        <div class="top-0 text-3xl font-bold flex justify-center p-5">
                            Let's Get Started!
                        </div>
                        <img src="{{ asset('assets/register_img.svg') }}" alt="" class="rounded-lg">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
