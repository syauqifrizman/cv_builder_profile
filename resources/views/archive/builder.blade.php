<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <script src=
    "https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js">
    </script>

    <title>CV Builder</title>
</head>
<body>
    {{-- navbar --}}
    <nav class="bg-sky-50 p-3 fixed top-0 w-full z-50 backdrop-blur-lg bg-opacity-50">
        <div class="flex items-center justify-between">
            <div>
                <a href="/" class="text-black hover:bg-sky-800 hover:text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Home</a>
                <a href="/builder" class="text-black hover-bg-sky-800 hover:text-white rounded-md px-3 py-2 text-sm font-medium">CV Builder</a>
            </div>
            <div class="flex space-x-4">
                <a href="#" class="border-solid border border-sky-800 text-black hover:bg-sky-200 rounded-md px-6 py-2 text-sm font-medium">SIGN IN</a>
                <a href="#" class="bg-sky-800 text-white hover:bg-sky-700 rounded-md px-6 py-2 text-sm font-medium">SIGN UP</a>
            </div>
        </div>
    </nav>

    <div class="grid grid-cols-2 mt-6 mr-4 ml-4 mb-8 pt-16 gap-4">
        <form action="{{url('builder.blade.php')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="bg-sky-50 rounded-md flex items-start ... pt-4 pr-2 pb-4 pl-2">
                    <div class="flex-1 ... flex flex-col items-center justify-start text-center">
                        <button class="rounded-full bg-sky-800 text-white w-10 h-10">
                            1
                        </button>
                        <div>
                            <label for="" class="text-sm font-medium">Informasi Pribadi</label>
                        </div>
                    </div>

                    <div class="flex-1 ... flex flex-col items-center justify-start text-center">
                        <button class="rounded-full bg-gray-400 text-white w-10 h-10">
                            2
                        </button>
                        <div>
                            <label for="" class="text-sm font-medium">Pengalaman</label>
                        </div>
                    </div>

                    <div class="flex-1 ... flex flex-col items-center justify-center text-center">
                        <button class="rounded-full bg-gray-400 text-white w-10 h-10">
                            3
                        </button>
                        <div>
                            <label for="" class="text-sm font-medium">Pendidikan</label>
                        </div>
                    </div>

                    <div class="flex-1 ... flex flex-col items-center justify-center text-center">
                        <button class="rounded-full bg-gray-400 text-white  w-10 h-10">
                            4
                        </button>
                        <div>
                            <label for="" class="text-sm font-medium">Project and Achievment</label>
                        </div>
                    </div>

                    <div class="flex-1 ... flex flex-col items-center justify-center text-center">
                        <button class="rounded-full bg-gray-400 text-white  w-10 h-10">
                            5
                        </button>
                        <div>
                            <label for="" class="text-sm font-medium">Skills</label>
                        </div>
                    </div>

                    <div class="flex-1 ... flex flex-col items-center justify-center text-center">
                        <button class="rounded-full bg-gray-400 text-white  w-10 h-10">
                            6
                        </button>
                        <div>
                            <label for="" class="text-sm font-medium">Lainnya</label>
                        </div>
                    </div>


                    {{-- <div class="flex-1 ... flex flex-col items-center justify-center text-center">
                        <button class="mt-0 rounded-md bg-sky- pt-1 pr-1 pb-1 pl-1 border-solid border border-sky-800">
                            Generate
                        </button>
                    </div> --}}
                </div>

                {{-- grid left input data --}}
                <div class="bg-sky-50 mt-6 pr-6 pl-6 mb-6 rounded-md">
                    <div class="pt-5">
                        <h1 class="text-2xl font-medium">Masukkan informasi pribadi kamu</h1>
                    </div>

                    <div class="mt-4">
                        <label for="nama" class="mb-2 block">Nama Lengkap</label>
                        <input required type="text" name="input" id="nama" placeholder="Masukkan nama, e.g. Syauqi Frizman" class="w-full h-10 rounded pl-4">
                    </div>

                    <div class="mt-4">
                        <label for="lokasi" class="mb-2 block">Lokasi/Domisili</label>
                        <input type="text" name="input" id="lokasi" placeholder="Masukkan lokasi, e.g. Jakarta Barat, Indonesia" class="w-full h-10 rounded pl-4">
                    </div>

                    <div class="mt-4">
                        <label for="email" class="mb-2 block">Email</label>
                        <input required type="email" name="input" id="email" placeholder="Masukkan alamat email, e.g. syauqi@gmail.com" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" class="w-full h-10 rounded pl-4">
                    </div>

                    <div class="mt-4">
                        <label for="telpon" class="mb-2 block">Nomor Handphone (Mobile)</label>
                        <input required type="tel" name="input" id="telpon" placeholder="Masukkan nomor telepon, e.g. +62822612345" class="w-full h-10 rounded pl-4">
                    </div>

                    <div class="mt-4">
                        <label for="portofolio" class="mb-2 block">Portofolio/Website URL (opsional)</label>
                        <input type="url" name="input" id="portofolio" placeholder="Masukkan url portofolio/website, e.g. https://github.com/syauqi" class="w-full h-10 rounded pl-4">
                    </div>

                    <div class="mt-4">
                        <label required for="linkedin" class="mb-2 block">Linkedin Profile URL</label>
                        <input type="url" name="input" id="linkedin" placeholder="Masukkan url profile linkedin, e.g. https://linkedin.com/in/syauqi" class="w-full h-10 rounded pl-4">
                    </div>

                    <div class="mt-4">
                        <label required for="deskripsi" class="mb-2 block">Deskripsi singkat tentang dirimu</label>
                        <textarea rows="5" name="input" id="deskripsi" placeholder="Masukkan deskripsi singkat tentang dirimu, e.g. Saya Syauqi mahasiswa tingkat akhir program studi Computer Science peminatan Software Engineering dari Universitas Bina Nusantara. Memiliki pengalaman dalam proyek ... . Saya memiliki minat berkarir dalam bidang mobile application, dan web development. Saya memiliki kemampuan dalam menggunakan bahasa C++, Java." class="w-full h-30 rounded pl-4 pt-2 pb-2"></textarea>
                    </div>

                    <div class="mt-5 pb-5 flex justify-end items-end">
                        <button type="reset" class="bg-white rounded-md px-6 py-2 border border-sky-800 hover:bg-sky-50">Reset</button>
                        <button type="submit" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Simpan & Lanjutkan</button>
                    </div>

                </div>
            </div>

        </form>

        {{-- ini untuk view export pdf --}}
        <div>
            <div class="mt-5 pb-16 flex justify-end items-end">
                <button id="download-pdf" class="bg-sky-800 text-white rounded-md px-6 py-2 ml-4 border border-sky-800 hover:bg-sky-700">Download</button>
            </div>

            <div id="content" class="bg-white mt-5 pr-6 pl-6 mb-6 rounded-md border-solid border border-sky-50 h-screen">
                <h1 class="mt-5">Output:</h1>
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

</body>
</html>
