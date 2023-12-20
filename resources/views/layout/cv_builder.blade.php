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

            @yield('cv_form')

        </div>

        {{-- ini untuk view export pdf --}}
        <div class="container-right">

        </div>

    </div>

@endsection
