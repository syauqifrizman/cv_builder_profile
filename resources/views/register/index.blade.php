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

                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="container grid grid-rows-3 gap-2">
                                <div>
                                    <label for="email" class="mb-2 block">Email</label>
                                    <input required type="email" name="email" id="email" placeholder="Masukkan alamat email anda, e.g. syauqi@gmail.com" class="w-full h-10 rounded pl-4 @error('email') border-2 border-red-500 @enderror" value="{{ old('email') }}">

                                    @error('email')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email_confirmation" class="mb-2 block">Confirm Email</label>
                                    <input required type="email" name="email_confirmation" id="email_confirmation" placeholder="Masukkan ulang alamat email anda, e.g. syauqi@gmail.com" class="w-full h-10 rounded pl-4 @error('email_confirmation') border-2 border-red-500 @enderror" value="{{ old('email_confirmation') }}">

                                    @error('email_confirmation')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="password" class="mb-2 block">Password</label>
                                    <input required type="password" name="password" id="password" placeholder="Masukkan password anda" class="w-full h-10 rounded pl-4 @error('password') border-2 border-red-500 @enderror" value="{{ old('password') }}">

                                    @error('password')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="password_confirmation" class="mb-2 block">Confirm Password</label>
                                    <input required type="password" name="password_confirmation" id="password_confirmation" placeholder="Masukkan password anda" class="w-full h-10 rounded pl-4 @error('password_confirmation') border-2 border-red-500 @enderror" value="{{ old('password_confirmation') }}">

                                    @error('password_confirmation')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <div class="mt-4 flex gap-2">
                                    <input required type="checkbox" name="tos_checkbox" id="tos_checkbox" class="w-4 @error('tos_checkbox') border-2 border-red-500 @enderror" value="1" {{ old('tos_checkbox') ? 'checked' : '' }}>
                                    <p>By signing up, I accept ... <a href="" class="underline text-blue-500">Terms & Privacy Policy.</a></p>
                                </div>
                                @error('tos_checkbox')
                                    <div>
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    </div>
                                @enderror

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
