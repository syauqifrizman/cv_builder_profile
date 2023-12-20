@extends('layout.cv_builder')

@section('cv_form')
    {{-- personal --}}
    <div class="form-step" id="step1">
        <form action="{{ route('store_personal', ['username' => $doc->user->username, 'document' => $doc->id]) }}" method="post" id="stepForm1">
            @csrf
            {{-- @if ($doc->personal != null) --}}
                @method('PUT')
            {{-- @endif --}}

            <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md">
                <div class="container-form">

                    <div class="pt-5">
                        <h1 class="text-2xl font-medium">Your Personal information</h1>
                    </div>

                    <div class="mt-4">
                        <label for="personal_name" class="mb-2 block">Full Name</label>
                        <input required type="text" name="personal_name" id="personal_name" placeholder="Insert you name, e.g. Syauqi Frizman" class="w-full h-10 rounded pl-4 @error('personal_name') border-2 border-red-500 @enderror" value="{{ old('personal_name', $doc->personal->fullname) }}">

                        @error('personal_name')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="personal_location" class="mb-2 block">Location</label>
                        <input required type="text" name="personal_location" id="personal_location" placeholder="Insert your current location, e.g. Jakarta Barat, Indonesia" class="w-full h-10 rounded pl-4 @error('personal_location') border-2 border-red-500 @enderror" value="{{ old('personal_location', $doc->personal->domicile) }}">

                        @error('personal_location')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="personal_email" class="mb-2 block">Email</label>
                        <input required type="email" name="personal_email" id="personal_email" placeholder="Insert your active email, e.g. syauqi@gmail.com" class="w-full h-10 rounded pl-4 @error('personal_email') border-2 border-red-500 @enderror" value="{{ old('personal_email', $doc->personal->email) }}">

                        @error('personal_email')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="personal_number" class="mb-2 block">Phone Number (Mobile)</label>
                        <input required type="tel" name="personal_number" id="personal_number" placeholder="Insert your active phone number, e.g. +62822612345" class="w-full h-10 rounded pl-4 @error('personal_number') border-2 border-red-500 @enderror" value="{{ old('personal_number', $doc->personal->phone_number) }}">

                        @error('personal_number')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="personal_linkedin" class="mb-2 block">Linkedin Profile URL</label>
                        <input required type="url" name="personal_linkedin" id="personal_linkedin" placeholder="Insert your linkedin profile url, e.g. https://linkedin.com/in/syauqi" class="w-full h-10 rounded pl-4 @error('personal_linkedin') border-2 border-red-500 @enderror" value="{{ old('personal_linkedin', $doc->personal->linkedin_url) }}">

                        @error('personal_linkedin')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="personal_portofolio" class="mb-2 block">Portofolio/Website URL (opsional)</label>
                        <input type="url" name="personal_portofolio" id="personal_portofolio" placeholder="Insert your portofolio/website url, e.g. https://github.com/syauqi" class="w-full h-10 rounded pl-4 @error('personal_portofolio') border-2 border-red-500 @enderror" value="{{ old('personal_portofolio', $doc->personal->portofolio_url) }}">

                        @error('personal_portofolio')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="personal_description" class="mb-2 block">Brief description of yourself</label>
                        <textarea required rows="5" name="personal_description" id="personal_description" placeholder="Insert a brief description of yourself, e.g. I am Syauqi, a final year student of Computer Science majoring in Software Engineering from Bina Nusantara University.I have career interest in mobile application, and web development. I have the ability to use C++, Java." class="w-full h-30 rounded pl-4 py-2 pr-2 @error('personal_description') border-2 border-red-500 @enderror">{{ old('personal_description', $doc->personal->description) }}</textarea>

                        @error('personal_description')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="personal_photo" class="mb-2 block">Photo (opsional)
                        </label>
                        <div class="flex items-center justify-center w-full h-24 border-2 border-sky-200 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-sky-50">
                            <div class="w-full flex justify-center items-center">
                                <svg class="w-8 h-8 mr-4 text-sky-200 dark:text-sky-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <div class="items-center">
                                    <p>Upload your photo</p>
                                    <p>PNG, JPG, JPEG (Max. 2MB)</p>
                                </div>
                            </div>
                            {{-- <input type="file" name="personal_photo" id="personal_photo" onchange="previewImage()" class="hidden @error('personal_photo') border-2 border-red-500 @enderror">

                            @error('personal_photo')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror --}}
                        </div>

                        {{-- <div class="w-64 h-auto flex items-center justify-center">
                            <div id="imagePreview"></div>
                        </div> --}}

                        {{-- <script>
                            function previewImage() {
                                const fileInput = document.getElementById("personal_photo");
                                const imagePreview = document.getElementById("imagePreview");

                                // Clear any previous preview
                                while (imagePreview.firstChild) {
                                    imagePreview.removeChild(imagePreview.firstChild);
                                }

                                if (fileInput.files && fileInput.files[0]) {
                                    const reader = new FileReader();

                                    reader.onload = function (e) {
                                        const img = document.createElement("img");
                                        img.src = e.target.result;
                                        img.className = "w-64 h-auto flex items-center justify-center";
                                        imagePreview.appendChild(img);
                                    };

                                    reader.readAsDataURL(fileInput.files[0]);
                                }
                            }
                        </script> --}}
                    </div>
                </div>

                <div class="mt-5 pb-5 flex justify-end items-end">
                    <button type="button" id="resetButton" class="bg-white rounded-md px-6 py-2 border border-sky-800 hover:bg-sky-50">Reset</button>

                    <button type="submit" id="save" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Save & Next</button>
                </div>
            </div>
        </form>
    </div>
@endsection
