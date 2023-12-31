@extends('layout.cv_builder')

@section('cv_form')
{{-- education --}}
<div class="form-step" id="step4">
    <form action="" method="post" id="stepForm4">
        @csrf
        {{-- @if ($doc->experience != null) --}}
            {{-- @method('PUT') --}}
        {{-- @endif --}}

        <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md">
            <div class="">
                <div class="pt-5">
                    <h1 class="text-2xl font-medium">Your Educational Information</h1>
                </div>

                {{-- ini harusnya di-looping sih --}}
                {{-- education_name dan education_location --}}
                @foreach ($doc->education as $education)
                    <div class="rounded mb-4">
                        <div class="mt-4 flex justify-between gap-4">
                            {{-- education_name --}}
                            <div class="mt-4 w-1/2">
                                <label for="education_name" class="mb-2 block">School/University Name</label>
                                <input required type="text" name="education_name" id="education_name" placeholder="Insert school name, e.g. SUNIB University" class="w-full h-10 rounded pl-4 @error('education_name') border-2 border-red-500 @enderror" value="{{ old('education_name', $education->education_name) }}">

                                @error('education_name')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- education_location --}}
                            <div class="mt-4 w-1/2">
                                <label for="education_location" class="mb-2 block">School/University Location</label>
                                <input type="text" name="education_location" id="education_location" placeholder="Insert the location of the school city, e.g. Jakarta Barat" class="w-full h-10 rounded pl-4 @error('education_location') border-2 border-red-500 @enderror" value="{{ old('education_location', $education->education_location) }}">

                                @error('education_location')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- education level --}}
                        <div class="mt-4 flex justify-between gap-4">
                            <div class="mt-4 w-1/2">
                                <label for="education_level" class="mb-2 block">Educational Level</label>
                                <input type="text" name="education_level" id="education_level" placeholder="Insert the educational level, e.g. Undergraduate" class="w-full h-10 rounded pl-4 @error('education_level') border-2 border-red-500 @enderror" value="{{ old('education_level', $education->education_level) }}">

                                @error('education_level')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- education major --}}
                            <div class="mt-4 w-1/2">
                                <label for="education_major" class="mb-2 block">Education Major</label>
                                <input type="text" name="education_major" id="education_major" placeholder="Insert the education major, e.g. Computer Science" class="w-full h-10 rounded pl-4 @error('education_major') border-2 border-red-500 @enderror" value="{{ old('education_major', $education->education_major) }}">

                                @error('education_major')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- current_score --}}
                        <div class="mt-4 flex justify-between gap-4">
                            <div class="mt-4 w-1/2">
                                <label for="current_score" class="mb-2 block">GPA Score (opsional)</label>
                                <input type="text" name="current_score" id="current_score" placeholder="Insert your GPA score, e.g. 3.90" class="w-full h-10 rounded pl-4 @error('current_score') border-2 border-red-500 @enderror" value="{{ old('current_score', $education->current_score) }}">

                                @error('current_score')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- max score --}}
                            <div class="mt-4 w-1/2">
                                <label for="max_score" class="mb-2 block">Max GPA Score (opsional)</label>
                                <input type="text" name="max_score" id="max_score" placeholder="Insert the maximum of GPA score, e.g. 4.0" class="w-full h-10 rounded pl-4 @error('max_score') border-2 border-red-500 @enderror" value="{{ old('max_score', $education->max_score) }}">

                                @error('max_score')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- start date --}}
                        <div class="mt-4 flex justify-between gap-4">
                            <div class="w-1/2">
                                <label for="start_date" class="mb-2 block">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="w-full h-10 rounded pl-4 @error('start_date') border-2 border-red-500 @enderror" value="{{ old('start_date', $education->star_date) }}">

                                @error('start_date')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- end date --}}
                            <div class="w-1/2">
                                <label for="end_date" class="mb-2 block">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="w-full h-10 rounded pl-4 @error('end_date') border-2 border-red-500 @enderror" value="{{ old('end_date', $education->end_date) }}">

                                @error('end_date')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- related coursework --}}
                        <div class="mt-4">
                            <label for="related_coursework" class="mb-2 block">Related Coursework (Use ',' to seperate courses) (opsional)</label>
                            <div class="w-full">
                                <textarea name="related_coursework" id="related_coursework" class="w-full rounded pl-4 py-2 pr-2 @error('related_coursework') border-2 border-red-500 @enderror">{{ old('related_coursework', $education->related_coursework) }}</textarea>

                                @error('related_coursework')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-5 pb-5 flex justify-end items-end">
                <button type="button" id="prevBtn" onclick="window.location.href='{{ route('detail_project', ['username' => $doc->user->username, 'document' => $doc->id, 'type' => 'read']) }}'" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Back</button>

                <button type="button" id="nextBtn" onclick="window.location.href='{{ route('detail_skillOther', ['username' => $doc->user->username, 'document' => $doc->id, 'type' => 'read']) }}'" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Next</button>
            </div>
        </div>
    </form>
</div>
@endsection
