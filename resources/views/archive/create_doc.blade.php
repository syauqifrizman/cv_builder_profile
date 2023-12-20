@extends('layout.master')

@section('content')
    <div class="grid grid-cols-2 mt-6 mr-4 ml-4 mb-8 pt-16 gap-4">
        <div class="container-left">
            <div class="step bg-sky-50 rounded-md flex items-start pt-4 pr-2 pb-4 pl-2">
                <div class="flex-1 flex flex-col items-center justify-start text-center">
                    <button class="rounded-full bg-sky-800 text-white w-10 h-10">
                        1
                    </button>
                    <div>
                        <label for="" class="text-sm font-medium">Personal Information</label>
                    </div>
                </div>

                <div class="step flex-1 flex flex-col items-center justify-start text-center">
                    <button class="rounded-full bg-gray-400 text-white w-10 h-10">
                        2
                    </button>
                    <div>
                        <label for="" class="text-sm font-medium">Experience</label>
                    </div>
                </div>

                <div class="step flex-1 flex flex-col items-center justify-center text-center">
                    <button class="rounded-full bg-gray-400 text-white  w-10 h-10">
                        3
                    </button>
                    <div>
                        <label for="" class="text-sm font-medium">Project and Achievement</label>
                    </div>
                </div>

                <div class="step flex-1 flex flex-col items-center justify-center text-center">
                    <button class="rounded-full bg-gray-400 text-white w-10 h-10">
                        4
                    </button>
                    <div>
                        <label for="" class="text-sm font-medium">Education</label>
                    </div>
                </div>

                <div class="step flex-1 flex flex-col items-center justify-center text-center">
                    <button class="rounded-full bg-gray-400 text-white  w-10 h-10">
                        5
                    </button>
                    <div>
                        <label for="" class="text-sm font-medium">Skills/Others</label>
                    </div>
                </div>
            </div>

            {{-- form step --}}
            <div class="form-step" id="step1">
                <form action="{{ route('store_data')}}" method="post" enctype="multipart/form-data" id="stepForm1">
                    @csrf
                    <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md">
                        <div class="container-form">

                            <div class="pt-5">
                                <h1 class="text-2xl font-medium">Your Personal information</h1>
                            </div>

                            <div class="mt-4">
                                <label for="personal_name" class="mb-2 block">Full Name</label>
                                <input required type="text" name="personal_name" id="personal_name" placeholder="Insert you name, e.g. Syauqi Frizman" class="w-full h-10 rounded pl-4 @error('personal_name') border-2 border-red-500 @enderror" value="{{ old('personal_name') }}">

                                @error('personal_name')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="personal_location" class="mb-2 block">Location</label>
                                <input required type="text" name="personal_location" id="personal_location" placeholder="Insert your current location, e.g. Jakarta Barat, Indonesia" class="w-full h-10 rounded pl-4 @error('personal_location') border-2 border-red-500 @enderror" value="{{ old('personal_location') }}">

                                @error('personal_location')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="personal_email" class="mb-2 block">Email</label>
                                <input required type="email" name="personal_email" id="personal_email" placeholder="Insert your active email, e.g. syauqi@gmail.com" class="w-full h-10 rounded pl-4 @error('personal_email') border-2 border-red-500 @enderror" value="{{ old('personal_email') }}">

                                @error('personal_email')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="personal_number" class="mb-2 block">Phone Number (Mobile)</label>
                                <input required type="tel" name="personal_number" id="personal_number" placeholder="Insert your active phone number, e.g. +62822612345" class="w-full h-10 rounded pl-4 @error('personal_number') border-2 border-red-500 @enderror" value="{{ old('personal_number') }}">

                                @error('personal_number')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="personal_linkedin" class="mb-2 block">Linkedin Profile URL</label>
                                <input required type="url" name="personal_linkedin" id="personal_linkedin" placeholder="Insert your linkedin profile url, e.g. https://linkedin.com/in/syauqi" class="w-full h-10 rounded pl-4 @error('personal_linkedin') border-2 border-red-500 @enderror" value="{{ old('personal_linkedin') }}">

                                @error('personal_linkedin')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="personal_portofolio" class="mb-2 block">Portofolio/Website URL (opsional)</label>
                                <input type="url" name="personal_portofolio" id="personal_portofolio" placeholder="Insert your portofolio/website url, e.g. https://github.com/syauqi" class="w-full h-10 rounded pl-4 @error('personal_portofolio') border-2 border-red-500 @enderror" value="{{ old('personal_portofolio') }}">

                                @error('personal_portofolio')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="personal_description" class="mb-2 block">Brief description of yourself</label>
                                <textarea required rows="5" name="personal_description" id="personal_description" placeholder="Insert a brief description of yourself, e.g. I am Syauqi, a final year student of Computer Science majoring in Software Engineering from Bina Nusantara University.I have career interest in mobile application, and web development. I have the ability to use C++, Java." class="w-full h-30 rounded pl-4 py-2 pr-2 @error('personal_description') border-2 border-red-500 @enderror">{{ old('personal_description') }}</textarea>

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
                                    <input type="file" name="personal_photo" id="personal_photo" onchange="previewImage()" class="hidden @error('personal_photo') border-2 border-red-500 @enderror">

                                    @error('personal_photo')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
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

                            <button type="submit" id="save" onclick="nextStep()" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Save & Next</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="form-step hidden" id="step2">
                <form action="{{ route('store_data')}}" method="post" id="stepForm2">
                    @csrf
                    <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md">
                        <div class="">
                            <div class="pt-5">
                                <h1 class="text-2xl font-medium">Your Personal Experience Information</h1>
                            </div>

                            <div class="rounded border border-sky-100 mb-4">
                                <div class="mt-4">
                                    <label for="company_name" class="mb-2 block">Company Name</label>
                                    <input required type="text" name="company_name" id="company_name" placeholder="Insert company name, e.g. Tokopaedi" class="w-full h-10 rounded pl-4 @error('company_name') border-2 border-red-500 @enderror" value="{{ old('company_name') }}">

                                    @error('company_name')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <label for="company_position" class="mb-2 block">Your Position</label>
                                    <input type="text" name="company_position" id="company_position" placeholder="Insert your position in the company, e.g. Software Engineer" class="w-full h-10 rounded pl-4 @error('company_position') border-2 border-red-500 @enderror" value="{{ old('company_position') }}">

                                    @error('company_position')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <label for="company_location" class="mb-2 block">Company Location</label>
                                    <input type="text" name="company_location" id="company_location" placeholder="Insert the location of the company city, e.g. Jakarta Barat" class="w-full h-10 rounded pl-4 @error('company_location') border-2 border-red-500 @enderror" value="{{ old('company_location') }}">

                                    @error('company_location')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mt-4">
                                    <label for="company_desc" class="mb-2 block">Company Description</label>
                                    <textarea rows="5" name="company_desc" id="company_desc" placeholder="Please briefly describe your company, e.g. Tech-powered online grocery supply chain. Series C-funded ($139mio raised)" class="w-full h-20 rounded pl-4 pt-2 pb-2 @error('company_desc') border-2 border-red-500 @enderror">{{ old('company_desc') }}</textarea>

                                    @error('company_desc')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mt-4 flex justify-between gap-6">
                                    <div class="w-1/2">
                                        <label for="company_start" class="mb-2 block">Start</label>
                                        <input type="date" name="company_start" id="company_start" class="w-full h-10 rounded pl-4 @error('company_start') border-2 border-red-500 @enderror" value="{{ old('company_start') }}">

                                        @error('company_start')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/2">
                                        <label for="company_end" class="mb-2 block">End</label>
                                        <input type="date" name="company_end" id="company_end" class="w-full h-10 rounded pl-4 @error('company_end') border-2 border-red-500 @enderror" value="{{ old('company_end') }}">

                                        @error('company_end')
                                            <p class="text-red-500 text-sm">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label for="experience_escription" class="mb-2 block">Achievements or Job Description</label>
                                    <div class="">
                                        <div class="mb-2 flex items-center">
                                            <div class="w-2 h-2 bg-black rounded-full mx-2"></div>
                                            <div class="w-full">
                                                <textarea name="experience_escription" id="experience_escription" class="w-full rounded pl-4 py-2 pr-2 @error('experience_escription') border-2 border-red-500 @enderror">{{ old('experience_escription') }}</textarea>

                                                @error('experience_escription')
                                                <p class="text-red-500 text-sm">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="mt-5 pb-5 flex justify-end items-end">
                            <button type="button" id="resetButton" class="bg-white rounded-md px-6 py-2 border border-sky-800 hover:bg-sky-50">Reset</button>

                            <button type="button" id="prevBtn" onclick="prevStep()" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Back</button>

                            <button type="button" id="nextBtn" onclick="nextStep()" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Next</button>
                        </div>
                    </div>
                </form>
            </div>

            {{--
            <div class="form-step hidden" id="step3">
                <form action="{{ route('store_data')}}" method="post" id="stepForm3">
                    @csrf
                    <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md">
                        <div class="">
                            <div class="pt-5">
                                <h1 class="text-2xl font-medium">Your Project and Achievement</h1>
                            </div>

                            <div class="rounded border border-sky-100 mb-4">
                                <div class="mt-4 flex justify-between gap-4">
                                    <div class="w-3/4">
                                        <label for="project_name" class="mb-2 block">Project Name</label>
                                        <input required type="text" name="input" id="company_name" placeholder="Insert project name, e.g. Online Booking Platform for Internet Cafe Management" class="w-full h-10 rounded pl-4">
                                    </div>

                                    <div class="w-1/4">
                                        <label for="project_year" class="mb-2 block">Year</label>
                                        <input type="text" name="input" id="project_year" class="w-full h-10 rounded pl-4">
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label for="project_url" class="mb-2 block">Portofolio URL (opsional)</label>
                                    <input type="url" name="input" id="project_url" placeholder="Insert your portofolio url, e.g. https://github.com/syauqi/intercafe" class="w-full h-10 rounded pl-4">
                                </div>

                                <div class="mt-4">
                                    <label for="project_detail" class="mb-2 block">Project Description</label>
                                    <div class="">
                                        <div class="mb-1 flex items-center">
                                            <div class="w-2 h-2 bg-black rounded-full mx-2"></div>
                                            <div class="w-full">
                                                <textarea name="description" id="project_detail" class="w-full rounded pl-4 py-2 pr-2"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 pb-5 flex justify-end items-end">
                            <button type="button" id="resetButton" class="bg-white rounded-md px-6 py-2 border border-sky-800 hover:bg-sky-50">Reset</button>

                            <button type="submit" id="prevBtn" onclick="prevStep()" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Back</button>

                            <button type="submit" id="nextBtn" onclick="nextStep()" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Next</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="form-step hidden" id="step4">
                <form action="{{ route('store_data')}}" method="post" id="stepForm4">
                    @csrf
                    <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md">
                        <div class="">
                            <div class="pt-5">
                                <h1 class="text-2xl font-medium">Your Educational Information</h1>
                            </div>

                            <div class="rounded border border-sky-100 mb-4">
                                <div class="mt-4 flex justify-between gap-4">
                                    <div class="mt-4 w-1/2">
                                        <label for="education_name" class="mb-2 block">School/University Name</label>
                                        <input required type="text" name="input" id="school_name" placeholder="Insert school name, e.g. SUNIB University" class="w-full h-10 rounded pl-4">
                                    </div>

                                    <div class="mt-4 w-1/2">
                                        <label for="education_location" class="mb-2 block">School/University Location</label>
                                        <input type="text" name="input" id="school_location" placeholder="Insert the location of the school city, e.g. Jakarta Barat" class="w-full h-10 rounded pl-4">
                                    </div>
                                </div>

                                <div class="mt-4 flex justify-between gap-4">
                                    <div class="mt-4 w-1/2">
                                        <label for="education_level" class="mb-2 block">Educational Level</label>
                                        <input type="text" name="input" id="company_location" placeholder="Insert the educational level, e.g. Undergraduate" class="w-full h-10 rounded pl-4">
                                    </div>

                                    <div class="mt-4 w-1/2">
                                        <label for="education_major" class="mb-2 block">Education Major</label>
                                        <input type="text" name="input" id="education_major" placeholder="Insert the education major, e.g. Computer Science" class="w-full h-10 rounded pl-4">
                                    </div>
                                </div>

                                <div class="mt-4 flex justify-between gap-4">
                                    <div class="mt-4 w-1/2">
                                        <label for="current_score" class="mb-2 block">GPA Score (Opsional)</label>
                                        <input type="text" name="input" id="current_score" placeholder="Insert your GPA score, e.g. 3.90" class="w-full h-10 rounded pl-4">
                                    </div>

                                    <div class="mt-4 w-1/2">
                                        <label for="max_score" class="mb-2 block">Max GPA Score</label>
                                        <input type="text" name="input" id="max_score" placeholder="Insert the maximum of GPA score, e.g. 4.0" class="w-full h-10 rounded pl-4">
                                    </div>
                                </div>

                                <div class="mt-4 flex justify-between gap-4">
                                    <div class="w-1/2">
                                        <label for="star_date" class="mb-2 block">Start</label>
                                        <input type="date" name="input" id="star_date" class="w-full h-10 rounded pl-4">
                                    </div>

                                    <div class="w-1/2">
                                        <label for="end_date" class="mb-2 block">End</label>
                                        <input type="date" name="input" id="end_date" class="w-full h-10 rounded pl-4">
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label for="related_coursework" class="mb-2 block">Related Coursework (Use ',' to seperate courses)</label>
                                    <div class="w-full">
                                        <textarea name="description" id="related_coursework" class="w-full rounded pl-4 py-2 pr-2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 pb-5 flex justify-end items-end">
                            <button type="button" id="resetButton" class="bg-white rounded-md px-6 py-2 border border-sky-800 hover:bg-sky-50">Reset</button>

                            <button type="submit" id="prevBtn" onclick="prevStep()" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Back</button>

                            <button type="submit" id="nextBtn" onclick="nextStep()" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Next</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="form-step hidden" id="step5">
                <form action="{{ route('store_data')}}" method="post" id="stepForm5">
                    @csrf
                    <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md">
                        <div class="">
                            <div class="pt-5">
                                <h1 class="text-2xl font-medium">Your Skill/Other Information</h1>
                            </div>

                            <div class="mt-4">
                                <div class="rounded border border-sky-100 mb-4">
                                    <div class="mb-2">
                                        <div class="flex items-center w-full mb-2">
                                            <div class="w-2 h-2 bg-black rounded-full mx-2"></div>
                                            <h1>Your Other</h1>
                                        </div>
                                        <div class="pl-6 w-full">
                                            <textarea name="description" id="other_description" class="w-full rounded pl-4 py-2 pr-2"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 pb-5 flex justify-end items-end">
                            <button type="button" id="resetButton" class="bg-white rounded-md px-6 py-2 border border-sky-800 hover:bg-sky-50">Reset</button>

                            <button type="submit" id="prevBtn" onclick="prevStep()" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Back</button>

                            <button type="submit" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Save</button>
                        </div>
                    </div>
                </form>
            </div> --}}
        </div>

        <script>
            let currentStep = 1;
            const form = document.getElementById('multiStepForm');

            function showStep(step){
                const steps = document.querySelectorAll('.form-step');
                steps.forEach((s, index) => {
                    if(index + 1 === step){
                        s.classList.remove('hidden');
                    }
                    else{
                        s.classList.add('hidden');
                    }
                });
            }

            function nextStep(){
                if(currentStep < 5){
                    currentStep++;
                    showStep(currentStep);
                }
            }

            function prevStep(){
                if(currentStep > 1){
                    currentStep--;
                    showStep(currentStep);
                }
            }
        </script>

        {{-- ini untuk view export pdf --}}
        <div class="container-right">

        </div>

    </div>
@endsection
