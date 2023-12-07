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

                {{-- <div class="step flex-1 flex flex-col items-center justify-center text-center">
                    <button class="rounded-full bg-gray-400 text-white  w-10 h-10">
                        6
                    </button>
                    <div>
                        <label for="" class="text-sm font-medium">Other</label>
                    </div>
                </div> --}}
            </div>

            <form action="{{url('builder.blade.php')}}" method="post" enctype="multipart/form-data" id="multiStepForm">
                @csrf
                <div class="form-step" id="step1">
                    {{-- grid left input data --}}
                    <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md">
                        <div class="container-form">

                            <div class="pt-5">
                                <h1 class="text-2xl font-medium">Your Personal information</h1>
                            </div>

                            <div class="mt-4">
                                <label for="name" class="mb-2 block">Full Name</label>
                                <input required type="text" name="input" id="name" value="{{ $document ? $document->personal->fullname : '' }}" placeholder="Insert you name, e.g. Syauqi Frizman" class="w-full h-10 rounded pl-4">
                            </div>

                            <div class="mt-4">
                                <label for="location" class="mb-2 block">Location</label>
                                <input type="text" name="input" id="location" value="{{ $document ? $document->personal->domicile : '' }}" placeholder="Insert your current location, e.g. Jakarta Barat, Indonesia" class="w-full h-10 rounded pl-4">
                            </div>

                            <div class="mt-4">
                                <label for="email" class="mb-2 block">Email</label>
                                <input required type="email" name="input" id="email" value="{{ $document ? $document->personal->email : '' }}" placeholder="Insert your active email, e.g. syauqi@gmail.com" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" class="w-full h-10 rounded pl-4">
                            </div>

                            <div class="mt-4">
                                <label for="phone_number" class="mb-2 block">Phone Number (Mobile)</label>
                                <input required type="tel" name="input" id="phone_number" value="{{ $document ? $document->personal->phone_number : '' }}" placeholder="Insert your active phone number, e.g. +62822612345" class="w-full h-10 rounded pl-4">
                            </div>

                            <div class="mt-4">
                                <label required for="linkedin" class="mb-2 block">Linkedin Profile URL</label>
                                <input type="url" name="input" id="linkedin" value="{{ $document ? $document->personal->linkedin_url : '' }}" placeholder="Insert your linkedin profile url, e.g. https://linkedin.com/in/syauqi" class="w-full h-10 rounded pl-4">
                            </div>

                            <div class="mt-4">
                                <label for="portofolio" class="mb-2 block">Portofolio/Website URL (opsional)</label>
                                <input type="url" name="input" id="portofolio" value="{{ $document ? $document->personal->portofolio_url : '' }}" placeholder="Insert your portofolio/website url, e.g. https://github.com/syauqi" class="w-full h-10 rounded pl-4">
                            </div>

                            <div class="mt-4">
                                <label required for="description" class="mb-2 block">Brief description of yourself</label>
                                <textarea rows="5" name="input" id="description" placeholder="Insert a brief description of yourself, e.g. I am Syauqi, a final year student of Computer Science majoring in Software Engineering from Bina Nusantara University.I have career interest in mobile application, and web development. I have the ability to use C++, Java." class="w-full h-30 rounded pl-4 py-2 pr-2">{{ $document ? $document->personal->description : '' }}</textarea>
                            </div>

                            <div class="mt-4">
                                <label for="photo" class="mb-2 block">Photo (opsional)
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
                                        <input type="file" name="input" id="photo" class="hidden" onchange="previewImage()">
                                    </div>
                                </label>

                                <div class="w-64 h-auto flex items-center justify-center">
                                    <div id="imagePreview"></div>
                                </div>

                                <script>
                                    function previewImage() {
                                        const fileInput = document.getElementById("photo");
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
                                </script>
                            </div>

                        </div>

                        <div class="mt-5 pb-5 flex justify-end items-end">
                            <button type="button" id="resetButton" class="bg-white rounded-md px-6 py-2 border border-sky-800 hover:bg-sky-50">Reset</button>

                            <button type="button" id="nextBtn" onclick="nextStep()" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Next</button>
                        </div>
                    </div>
                </div>

                <div class="form-step hidden" id="step2">
                    {{-- grid left input data --}}
                    <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md">
                        <div class="">
                            <div class="pt-5">
                                <h1 class="text-2xl font-medium">Your Personal Experience Information</h1>
                            </div>

                            @foreach ($document->experience as $experience)
                            <div class="rounded border border-sky-100 mb-4">
                                <div class="mt-4">
                                    <label for="company_name" class="mb-2 block">Company Name</label>
                                    <input required type="text" name="input" id="company_name" value="{{ $experience ? $experience->company_name : '' }}" placeholder="Insert company name, e.g. Tokopaedi" class="w-full h-10 rounded pl-4">
                                </div>

                                <div class="mt-4">
                                    <label for="company_position" class="mb-2 block">Your Position</label>
                                    <input type="text" name="input" id="position" value="{{ $experience ? $experience->position : '' }}" placeholder="Insert your position in the company, e.g. Software Engineer" class="w-full h-10 rounded pl-4">
                                </div>

                                <div class="mt-4">
                                    <label for="company_location" class="mb-2 block">Company Location</label>
                                    <input type="text" name="input" id="company_location" value="{{ $experience ? $experience->location : '' }}" placeholder="Insert the location of the company city, e.g. Jakarta Barat" class="w-full h-10 rounded pl-4">
                                </div>

                                <div class="mt-4">
                                    <label for="company_desc" class="mb-2 block">Company Description</label>
                                    <textarea rows="5" name="input" id="company_desc" placeholder=""Please briefly describe your company, e.g. Tech-powered online grocery supply chain. Series C-funded ($139mio raised)" class="w-full h-20 rounded pl-4 pt-2 pb-2">{{$experience ? $experience->company_description : '' }}</textarea>
                                </div>

                                <div class="mt-4 flex justify-between gap-6">
                                    <div class="w-1/2">
                                        <label for="company_start" class="mb-2 block">Start</label>
                                        <input type="date" name="input" id="company_start" value="{{ $experience ? $experience->start_date : '' }}" class="w-full h-10 rounded pl-4">
                                    </div>

                                    <div class="w-1/2">
                                        <label for="company_end" class="mb-2 block">End</label>
                                        <input type="date" name="input" id="company_end" value="{{ $experience ? $experience->end_date : '' }}" class="w-full h-10 rounded pl-4">
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label for="experienceDescription" class="mb-2 block">Achievements or Job Description</label>
                                    <div class="">
                                        @foreach ($experience->experienceDescription as $description)
                                        <div class="mb-2 flex items-center">
                                            <div class="w-2 h-2 bg-black rounded-full mx-2"></div>
                                            <div class="w-full">
                                                <textarea name="description" id="experienceDescription" class="w-full rounded pl-4 py-2 pr-2">{{ $description->description }}</textarea>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                            @endforeach

                        </div>

                        <div class="mt-5 pb-5 flex justify-end items-end">
                            <button type="button" id="resetButton" class="bg-white rounded-md px-6 py-2 border border-sky-800 hover:bg-sky-50">Reset</button>

                            <button type="submit" id="prevBtn" onclick="prevStep()" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Back</button>

                            <button type="submit" id="nextBtn" onclick="nextStep()" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Next</button>
                        </div>
                    </div>
                </div>

                <div class="form-step hidden" id="step3">
                    {{-- grid left input data --}}
                    <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md">
                        <div class="">
                            <div class="pt-5">
                                <h1 class="text-2xl font-medium">Your Project and Achievement</h1>
                            </div>

                            @foreach ($document->project as $project)
                            <div class="rounded border border-sky-100 mb-4">
                                <div class="mt-4 flex justify-between gap-4">
                                    <div class="w-3/4">
                                        <label for="project_name" class="mb-2 block">Project Name</label>
                                        <input required type="text" name="input" id="company_name" value="{{ $project ? $project->project_name : '' }}" placeholder="Insert project name, e.g. Online Booking Platform for Internet Cafe Management" class="w-full h-10 rounded pl-4">
                                    </div>

                                    <div class="w-1/4">
                                        <label for="project_year" class="mb-2 block">Year</label>
                                        <input type="text" name="input" id="project_year" value="{{ $project ? $project->year : '' }}" class="w-full h-10 rounded pl-4">
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label for="project_url" class="mb-2 block">Portofolio URL (opsional)</label>
                                    <input type="url" name="input" id="project_url" value="{{ $project ? $project->project_url : '' }}" placeholder="Insert your portofolio url, e.g. https://github.com/syauqi/intercafe" class="w-full h-10 rounded pl-4">
                                </div>

                                <div class="mt-4">
                                    @if ($project->projectDetail->count() > 0)
                                    <label for="project_detail" class="mb-2 block">Project Description</label>
                                    <div class="">
                                        @foreach ($project->projectDetail as $projectDetail)
                                        <div class="mb-1 flex items-center">
                                            <div class="w-2 h-2 bg-black rounded-full mx-2"></div>
                                            <div class="w-full">
                                                <textarea name="description" id="project_detail" class="w-full rounded pl-4 py-2 pr-2">{{ $projectDetail->description }}</textarea>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>

                            </div>
                            @endforeach

                        </div>

                        <div class="mt-5 pb-5 flex justify-end items-end">
                            <button type="button" id="resetButton" class="bg-white rounded-md px-6 py-2 border border-sky-800 hover:bg-sky-50">Reset</button>

                            <button type="submit" id="prevBtn" onclick="prevStep()" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Back</button>

                            <button type="submit" id="nextBtn" onclick="nextStep()" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Next</button>
                        </div>
                    </div>
                </div>

                <div class="form-step hidden" id="step4">
                    {{-- grid left input data --}}
                    <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md">
                        <div class="">
                            <div class="pt-5">
                                <h1 class="text-2xl font-medium">Your Educational Information</h1>
                            </div>

                            @foreach ($document->education as $education)
                            <div class="rounded border border-sky-100 mb-4">
                                <div class="mt-4 flex justify-between gap-4">
                                    <div class="mt-4 w-1/2">
                                        <label for="education_name" class="mb-2 block">School/University Name</label>
                                        <input required type="text" name="input" id="school_name" value="{{ $education ? $education->education_name : '' }}" placeholder="Insert company name, e.g. Tokopaedi" class="w-full h-10 rounded pl-4">
                                    </div>

                                    <div class="mt-4 w-1/2">
                                        <label for="education_location" class="mb-2 block">School/University Location</label>
                                        <input type="text" name="input" id="school_location" value="{{ $education ? $education->education_location : '' }}" placeholder="Insert your position in the company, e.g. Software Engineer" class="w-full h-10 rounded pl-4">
                                    </div>
                                </div>

                                <div class="mt-4 flex justify-between gap-4">
                                    <div class="mt-4 w-1/2">
                                        <label for="education_level" class="mb-2 block">Educational Level</label>
                                        <input type="text" name="input" id="company_location" value="{{ $education ? $education->education_level : '' }}" placeholder="Insert the location of the company city, e.g. Jakarta Barat" class="w-full h-10 rounded pl-4">
                                    </div>

                                    <div class="mt-4 w-1/2">
                                        <label for="education_major" class="mb-2 block">Education Major</label>
                                        <input type="text" name="input" id="education_major" value="{{ $education ? $education->education_major : '' }}" placeholder="Insert the location of the company city, e.g. Jakarta Barat" class="w-full h-10 rounded pl-4">
                                    </div>
                                </div>

                                <div class="mt-4 flex justify-between gap-4">
                                    <div class="mt-4 w-1/2">
                                        <label for="current_score" class="mb-2 block">GPA Score (Opsional)</label>
                                        <input type="text" name="input" id="current_score" value="{{ $education ? $education->current_score : '' }}" placeholder="Insert the location of the company city, e.g. Jakarta Barat" class="w-full h-10 rounded pl-4">
                                    </div>

                                    <div class="mt-4 w-1/2">
                                        <label for="max_score" class="mb-2 block">Max GPA Score</label>
                                        <input type="text" name="input" id="max_score" value="{{ $education ? $education->max_score : '' }}" placeholder="Insert the location of the company city, e.g. Jakarta Barat" class="w-full h-10 rounded pl-4">
                                    </div>
                                </div>

                                <div class="mt-4 flex justify-between gap-4">
                                    <div class="w-1/2">
                                        <label for="star_date" class="mb-2 block">Start</label>
                                        <input type="date" name="input" id="star_date" value="{{ $education ? $education->start_date : '' }}" class="w-full h-10 rounded pl-4">
                                    </div>

                                    <div class="w-1/2">
                                        <label for="end_date" class="mb-2 block">End</label>
                                        <input type="date" name="input" id="end_date" value="{{ $education ? $education->end_date : '' }}" class="w-full h-10 rounded pl-4">
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <label for="related_coursework" class="mb-2 block">Related Coursework (Use ',' to seperate courses)</label>
                                    <div class="w-full">
                                        <textarea name="description" id="related_coursework" class="w-full rounded pl-4 py-2 pr-2">{{ $education->related_coursework }}</textarea>
                                    </div>
                                </div>

                            </div>
                            @endforeach

                        </div>

                        <div class="mt-5 pb-5 flex justify-end items-end">
                            <button type="button" id="resetButton" class="bg-white rounded-md px-6 py-2 border border-sky-800 hover:bg-sky-50">Reset</button>

                            <button type="submit" id="prevBtn" onclick="prevStep()" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Back</button>

                            <button type="submit" id="nextBtn" onclick="nextStep()" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Next</button>
                        </div>
                    </div>
                </div>

                <div class="form-step hidden" id="step5">
                    {{-- grid left input data --}}
                    <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md">
                        <div class="">
                            <div class="pt-5">
                                <h1 class="text-2xl font-medium">Your Skill/Other Information</h1>
                            </div>

                            <div class="mt-4">
                                @foreach ($document->skillOther as $item)
                                <div class="rounded border border-sky-100 mb-4">
                                    <div class="mb-2">
                                        <div class="flex items-center w-full mb-2">
                                            <div class="w-2 h-2 bg-black rounded-full mx-2"></div>
                                            <h1>{{ $item->title }}</h1>
                                        </div>
                                        <div class="pl-6 w-full">
                                            <textarea name="description" id="other_description" class="w-full rounded pl-4 py-2 pr-2">{{ $item->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>


                        </div>

                        <div class="mt-5 pb-5 flex justify-end items-end">
                            <button type="button" id="resetButton" class="bg-white rounded-md px-6 py-2 border border-sky-800 hover:bg-sky-50">Reset</button>

                            <button type="submit" id="prevBtn" onclick="prevStep()" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Back</button>

                            <button type="submit" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Save</button>
                        </div>
                    </div>
                </div>

            </form>
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
            <div class="bg-sky-50 rounded-md pb-16 flex justify-end items-end">
                <div class="flex-1  pt-3 pl-3 pr-3">
                    <label for="font_style">Font Style</label>
                    <select name="style" id="font_style">
                        <option value="Arial">Arial</option>
                        <option value="Calibri">Calibri</option>
                        <option value="Comic Sans MS">Comic Sans MS</option>
                        <option value="Courier New">Courier New</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Helvetica">Helvetica</option>
                        <option value="Impact">Impact</option>
                        <option value="Lucida Console">Lucida Console</option>
                        <option value="Lucida Sans Unicode">Lucida Sans Unicode</option>
                        <option value="Palatino Linotype">Palatino Linotype</option>
                        <option value="Tahoma">Tahoma</option>
                        <option value="Times New Roman">Times New Roman</option>
                        <option value="Trebuchet MS">Trebuchet MS</option>
                        <option value="Verdana">Verdana</option>
                    </select>
                </div>

                <div class="flex-1  pt-3 pl-3 pr-3">
                    <label for="color_style">Color</label>
                    <br>
                    <input type="color" name="color" id="color_style" value="#000000">
                </div>

                <button id="download-pdf" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 mr-3 border border-sky-800 hover:bg-sky-700">Download</button>
            </div>

            <div>
                <div id="content" class="bg-white mt-5 pr-6 pl-6 mb-6 rounded-md border-solid border border-sky-50 h-screen">
                    <h1 class="mt-5">Preview:</h1>
                    <div id="displayed-content"></div>
                </div>

                <script>
                    // Function to capture form data and display it in the content div
                    function displayFormData() {
                        // Get the form elements by their IDs
                        const nama = document.getElementById("nama").value;
                        const lokasi = document.getElementById("lokasi").value;
                        const email = document.getElementById("email").value;
                        const telpon = document.getElementById("telpon").value;
                        const portofolio = document.getElementById("portofolio").value;
                        const linkedin = document.getElementById("linkedin").value;
                        const deskripsi = document.getElementById("deskripsi").value;

                        // Create HTML to display the data
                        const content = `
                            <h2>Informasi Pribadi</h2>
                            <p><strong>Nama Lengkap:</strong> ${nama}</p>
                            <p><strong>Lokasi/Domisili:</strong> ${lokasi}</p>
                            <p><strong>Email:</strong> ${email}</p>
                            <p><strong>Nomor Handphone (Mobile):</strong> ${telpon}</p>
                            <p><strong>Portofolio/Website URL:</strong> ${portofolio}</p>
                            <p><strong>Linkedin Profile URL:</strong> ${linkedin}</p>
                            <p><strong>Deskripsi singkat tentang dirimu:</strong> ${deskripsi}</p>
                        `;

                        // Display the data in the content div
                        document.getElementById("displayed-content").innerHTML = content;
                    }

                    // Attach the function to the form submission
                    document.querySelector("form").addEventListener("submit", function (event) {
                        event.preventDefault(); // Prevent the default form submission
                        displayFormData(); // Call the function to display data
                    });
                </script>

                {{-- html css to pdf --}}
                <script>
                    document.getElementById('download-pdf')
                    .addEventListener('click', () => {
                        const element = document.getElementById('content');
                        const options = {
                            filename: 'download.pdf',
                            margin: 0,
                            image: { type: 'jpeg', quality: 0.98 },
                            html2canvas: { scale: 2 },
                            jsPDF: {
                                unit: 'in',
                                format: 'letter',
                                orientation: 'portrait'
                            }
                        };
                        html2pdf().set(options).from(element).save();
                    });
                </script>
            </div>
        </div>

    </div>
@endsection
