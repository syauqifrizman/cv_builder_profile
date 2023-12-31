@extends('layout.cv_builder')

@section('cv_form')
    {{-- experience --}}
    <div class="form-step" id="step2">
        <form action="" method="post" id="stepForm2">
            @csrf
            {{-- @if ($doc->experience != null) --}}
                {{-- @method('PUT') --}}
            {{-- @endif --}}

            <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md">
                <div class="">
                    <div class="pt-5">
                        <h1 class="text-2xl font-medium">Your Experience Information</h1>
                    </div>
                    {{-- @dump($doc) --}}

                    {{-- @if ($doc->experience) --}}
                        @foreach ($doc->experience as $experience)
                            <div class="rounded mb-4">
                                {{-- company_name --}}
                                <div class="mt-4">
                                    <label for="experience_company_name" class="mb-2 block">Company Name</label>
                                    <input required type="text" name="experience_company_name" id="experience_company_name" placeholder="Insert company name, e.g. Tokopaedi" class="w-full h-10 rounded pl-4 @error('experience_company_name') border-2 border-red-500 @enderror" value="{{ old('experience_company_name', $experience->company_name) }}">

                                    @error('experience_company_name')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- company_position --}}
                                <div class="mt-4">
                                    <label for="experience_company_position" class="mb-2 block">Your Position</label>
                                    <input required type="text" name="experience_company_position" id="experience_company_position" placeholder="Insert your position in the company, e.g. Software Engineer" class="w-full h-10 rounded pl-4 @error('experience_company_position') border-2 border-red-500 @enderror" value="{{ old('experience_company_position', $experience->position) }}">

                                    @error('experience_company_position')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- company_location --}}
                                <div class="mt-4">
                                    <label for="experience_company_location" class="mb-2 block">Company Location</label>
                                    <input required type="text" name="experience_company_location" id="experience_company_location" placeholder="Insert the location of the company city, e.g. Jakarta Barat" class="w-full h-10 rounded pl-4 @error('experience_company_location') border-2 border-red-500 @enderror" value="{{ old('experience_company_location', $experience->company_location) }}">

                                    @error('experience_company_location')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- company_description --}}
                                <div class="mt-4">
                                    <label for="experience_company_description" class="mb-2 block">Company Description (opsional)</label>
                                    <textarea rows="5" name="experience_company_description" id="experience_company_description" placeholder="Please briefly describe your company, e.g. Tech-powered online grocery supply chain. Series C-funded ($139mio raised)" class="w-full h-20 rounded pl-4 pt-2 pb-2 @error('experience_company_description') border-2 border-red-500 @enderror">{{ old('experience_company_description', $experience->company_description) }}</textarea>

                                    @error('experience_company_description')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- company_start_date and company_end_date --}}
                                <div class="mt-4 flex justify-between gap-6">
                                    <div class="w-1/2">
                                        <label for="experience_company_start_date" class="mb-2 block">Start Date</label>
                                        <input required type="date" name="experience_company_start_date" id="experience_company_start_date" class="w-full h-10 rounded pl-4 @error('experience_company_start_date') border-2 border-red-500 @enderror" value="{{ old('experience_company_start_date', $experience->start_date) }}">

                                        @error('experience_company_start_date')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/2">
                                        <label for="experience_company_end_date" class="mb-2 block">End Date</label>
                                        <input required type="date" name="experience_company_end_date" id="experience_company_end_date" class="w-full h-10 rounded pl-4 @error('experience_company_end_date') border-2 border-red-500 @enderror" value="{{ old('experience_company_end_date', $experience->end_date) }}">

                                        @error('experience_company_end_date')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                {{-- company_experience_description --}}
                                <div class="mt-4">
                                    <label for="experience_description_table" class="mb-2 block">Achievements or Job Description (opsional)</label>
                                    <div class="">
                                        {{-- @if ($experience->experienceDescription) --}}
                                        {{-- @dump($doc) --}}
                                            @foreach ($experience->experienceDescription as $description)
                                                <div class="mb-2 flex items-center">
                                                    <div class="w-2 h-2 bg-black rounded-full mx-2"></div>
                                                    <div class="w-full">
                                                        <textarea name="experience_description_table" id="experience_description_table" class="w-full rounded pl-4 py-2 pr-2 @error('experience_description_table') border-2 border-red-500 @enderror">{{ old('experience_description_table', $description->description) }}</textarea>

                                                        @error('experience_description_table')
                                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endforeach
                                        {{-- @else --}}
                                            {{-- <div class="mb-2 flex items-center">
                                                <div class="w-2 h-2 bg-black rounded-full mx-2"></div>
                                                <div class="w-full">
                                                    <textarea name="experience_description_table" id="experience_description_table" class="w-full rounded pl-4 py-2 pr-2 @error('experience_description_table') border-2 border-red-500 @enderror">{{ old('experience_description_table') }}</textarea>

                                                    @error('experience_description_table')
                                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div> --}}
                                        {{-- @endif --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    {{-- @else --}}


                    {{-- @endif --}}
                </div>

                <div class="mt-5 pb-5 flex justify-end items-end">
                    <button type="button" id="prevBtn" onclick="window.location.href='{{ route('detail_personal', ['username' => $doc->user->username, 'document' => $doc->id, 'type' => 'read']) }}'" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Back</button>

                    <button type="button" id="nextBtn" onclick="window.location.href='{{ route('detail_project', ['username' => $doc->user->username, 'document' => $doc->id, 'type' => 'read']) }}'" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Next</button>
                </div>
            </div>
        </form>
    </div>
@endsection
