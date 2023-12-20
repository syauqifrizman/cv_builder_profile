@extends('layout.master')

@section('content')
<div class="mx-auto w-1/4 h-screen flex items-center">
    <div class="w-full bg-sky-50 rounded border border-solid border-sky-50 p-5 ">
        @if (session()->has('success'))
            <div class="bg-green-50 rounded border border-solid border-green-50 p-2">
                <div class="flex justify-center items-center">
                    <h1 class="text-lg text-green-800 italic">{{ session('success') }}</h1>
                </div>
            </div>
        @endif
        <h1 class="text-2xl font-bold flex justify-center items-center mb-4">Create New Document</h1>

        <form action="{{ route('create_document', ['username' => Auth::user()->username]) }}" method="post">
            @csrf
            <div class="">
                <div>
                    <label for="title_doc" class="mb-2 block">Document Title</label>
                    <input required type="text" name="title_doc" id="title_doc" placeholder="Insert New Document Title" class="w-full h-10 rounded pl-4 @error('title_doc') border-2 border-red-500 @enderror" value="{{ old('title_doc') }}">
                    @error('title_doc')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-4 flex justify-center items-center">
                <button type="submit" class="btn-solid">CREATE DOCUMENT</button>
            </div>

            @if (session()->has('error'))
                <div class="bg-red-50 rounded border border-solid border-red-50 p-2 mt-4">
                    <div class="flex justify-center items-center">
                        <h1 class="text-lg text-red-800 italic">{{ session('error') }}</h1>
                    </div>
                </div>
            @endif
        </form>
    </div>
</div>



@endsection
