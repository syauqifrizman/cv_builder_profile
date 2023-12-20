@extends('layout.cv_builder')

@section('cv_form')
{{-- skill other --}}
<div class="form-step" id="step5">
    <form action="{{ route('store_skillOther', ['username' => $doc->user->username, 'document' => $doc->id])}}" method="post" id="stepForm5">
        @csrf
        {{-- @if ($doc->experience != null) --}}
            @method('PUT')
        {{-- @endif --}}

        <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md">
            <div class="">
                <div class="pt-5">
                    <h1 class="text-2xl font-medium">Your Skill/Other Information</h1>
                </div>

                {{-- ini harus di-looping --}}
                <div class="mt-4">
                    @foreach ($doc->skillOther as $skillOther)
                    <div class="rounded border border-sky-100 mb-4">
                        <div class="mb-2">
                            {{-- skill_other title --}}
                            {{-- di sini coba validasi kalo ada title nya, tampilin sebagai H1, kalo bukan, tampilin input type text --}}
                            <div class="flex items-center w-full mb-2">
                                <div class="w-2 h-2 bg-black rounded-full mx-2"></div>
                                {{-- <h1>{{ $skillOther->title }}</h1> --}}
                                <input type="text" name="skill_other_title" id="skill_other_title" placeholder="Insert title type e.g. Skills" class="w-full h-10 rounded pl-4 @error('skill_other_title') border-2 border-red-500 @enderror" value="{{ old('skill_other_title', $skillOther->title) }}">

                                @error('skill_other_title')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- skill_other description --}}
                            <div class="pl-6 w-full">
                                <textarea name="skill_other_description" id="skill_other_description" placeholder="Insert the description based on the title e.g. Python, Java, MySQL, Git, Figma" class="w-full rounded pl-4 py-2 pr-2">{{ old('skill_other_description', $skillOther->description) }}</textarea>

                                @error('skill_other_description')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mt-5 pb-5 flex justify-end items-end">
                <button type="button" id="resetButton" class="bg-white rounded-md px-6 py-2 border border-sky-800 hover:bg-sky-50">Reset</button>

                <button type="button" id="prevBtn" onclick="prevStep()" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Back</button>

                <button type="submit" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Save</button>
            </div>
        </div>
    </form>
</div>

@endsection
