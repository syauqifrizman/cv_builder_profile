@extends('layout.cv_builder')

@section('cv_form')
    {{-- project --}}
    <div class="form-step" id="step3">
        <form action="" method="post" id="stepForm3">
            @csrf
            {{-- @if ($doc->experience != null) --}}
                {{-- @method('PUT') --}}
            {{-- @endif --}}

            {{-- mulai dari sini --}}
            <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md">
                <div class="">
                    <div class="pt-5">
                        <h1 class="text-2xl font-medium">Your Project and Achievement</h1>
                    </div>

                    {{-- ini harus di-looping --}}
                    @foreach ($doc->project as $project)
                        <div class="rounded mb-4">
                            <div class="mt-4 flex justify-between gap-4">
                                {{-- project name --}}
                                <div class="w-3/4">
                                    <label for="project_name" class="mb-2 block">Project Name</label>
                                    <input required type="text" name="project_name" id="project_name" placeholder="Insert project name, e.g. Online Booking Platform for Internet Cafe Management" class="w-full h-10 rounded pl-4 @error('project_name') border-2 border-red-500 @enderror" value="{{ old('project_name', $project->project_name) }}">
                                    @error('project_name')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>


                                {{-- project_year --}}
                                <div class="w-1/4">
                                    <label for="project_year" class="mb-2 block">Year (opsional)</label>
                                    <input type="text" name="project_year" id="project_year" placeholder="Insert project year" class="w-full h-10 rounded pl-4 @error('project_year') border-2 border-red-500 @enderror" value="{{ old('project_year', $project->year) }}">
                                    @error('project_year')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            {{-- project portofolio --}}
                            <div class="mt-4">
                                <label for="project_url" class="mb-2 block">Portofolio URL (opsional)</label>
                                <input type="url" name="project_url" id="project_url" placeholder="Insert your portofolio url, e.g. https://github.com/syauqi/intercafe" class="w-full h-10 rounded pl-4 @error('project_url') border-2 border-red-500 @enderror" value="{{ old('project_url', $project->project_url) }}">
                            </div>

                            @error('project_url')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror

                            {{-- ini harus di-looping --}}
                            {{-- project description --}}
                            <div class="mt-4">
                                <label for="project_detail" class="mb-2 block">Project Description (opsional)</label>
                                <div class="">
                                    @foreach ($project->projectDetail as $projectDetail)
                                        <div class="mb-1 flex items-center">
                                            <div class="w-2 h-2 bg-black rounded-full mx-2"></div>
                                            <div class="w-full">
                                                <textarea name="project_detail" id="project_detail" class="w-full rounded pl-4 py-2 pr-2">{{ old('project_detail', $projectDetail->description) }}</textarea>
                                            </div>
                                            @error('project_detail')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5 pb-5 flex justify-end items-end">
                    <button type="button" id="prevBtn" onclick="window.location.href='{{ route('detail_experience', ['username' => $doc->user->username, 'document' => $doc->id, 'type' => 'read']) }}'" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Back</button>

                    <button type="button" id="nextBtn" onclick="window.location.href='{{ route('detail_education', ['username' => $doc->user->username, 'document' => $doc->id, 'type' => 'read']) }}'" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Next</button>
                </div>
            </div>
        </form>
    </div>
@endsection
