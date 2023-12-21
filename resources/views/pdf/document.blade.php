@php
    use Carbon\Carbon;
@endphp

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <title>Generate Document PDF</title>
</head>
<body class="m-3">
    {{-- personal --}}
    <div class="">
        <div class="">
            <h1 class="font-bold text-3xl">{{ $document->personal->fullname }}</h1>
        </div>
        <div class="">
            {{ $document->personal->email }} | {{ $document->personal->phone_number }} | {{ $document->personal->linkedin_url }} | {{ $document->personal->portofolio_url }}
        </div>
        <div class="text-gray-500">
            {{ $document->personal->domicile }}, Indonesia
        </div>
        <div class="">
            {{ $document->personal->description }}
        </div>
    </div>

    {{-- experience --}}
    <div class="mt-2">
        <div>
            <h1 class="text-xl font-bold">Experience</h1>
        </div>
        @foreach ($document->experience as $experience)
            <div class="flex flex-row">
                <div class="basis-3/4">
                    {{ $experience->company_name }} / {{ $experience->company_description }}
                </div>
                <div class="basis-1/4">
                    {{ $experience->company_location }}
                </div>
            </div>
            <div class="flex flex-row">
                <div class="basis-3/4">
                    {{ $experience->position }}
                </div>
                <div class="basis-1/4">
                    {{ Carbon::parse($experience->start_date)->format('F Y') }} - {{ Carbon::parse($experience->end_date)->format('F Y') }}
                </div>
            </div>
            @foreach ($experience->experienceDescription as $detail)
                <div class="mb-2 flex items-center">
                    <div class="w-2 h-2 bg-black rounded-full mx-2"></div>
                    <div>
                        {{ $detail->description }}
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>

    {{-- project --}}
    <div class="mt-2">
        <div>
            <h1 class="text-xl font-bold">Project & Achievement</h1>
        </div>
        @foreach ($document->project as $project)
            <div class="flex flex-row">
                <div class="basis-3/4">
                    <a href="{{ $project->project_url }}" class="text-blue-600 underline">
                        {{ $project->project_name }}
                    </a>
                </div>
                <div class="basis-1/4">
                    {{ $project->end_date }}
                </div>
            </div>

            @foreach ($project->projectDetail as $detail)
                <div class="mb-2 flex items-center">
                    <div class="w-2 h-2 bg-black rounded-full mx-2"></div>
                    <div>
                        {{ $detail->description }}
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>

    {{-- education --}}
    <div class="mt-2">
        <div>
            <h1 class="text-xl font-bold">Education Level</h1>
        </div>
        @foreach ($document->education as $education)
            <div class="flex flex-row">
                <div class="basis-3/4 inline-flex">
                    {{ $education->education_name }}
                    <div class="text-gray-500">
                        - {{ $education->education_location }}
                    </div>
                </div>
                <div class="basis-1/4">
                    {{ Carbon::parse($education->start_date)->format('F Y') }} - {{ Carbon::parse($education->end_date)->format('F Y') }}
                </div>
            </div>

            <div>
                <div>
                    {{ $education->education_level }} in {{ $education->education_major }}, {{ $education->current_score }}/{{ $education->max_score }}
                </div>
                <div class="mt-3">
                    <h1 class="font-bold">Related Coursework</h1>
                    <div class="italic">
                        {{ $education->related_coursework }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- skill other --}}
    <div class="mt-2">
        <div>
            <h1 class="text-xl font-bold">Skills & Others</h1>
        </div>
        @foreach ($document->skillOther as $skillOther)
            <div class="flex">
                <div class="font-bold">
                    {{ $skillOther->title }}
                </div>
                <div class="">
                    : {{ $skillOther->description }}
                </div>
            </div>
        @endforeach
    </div>


    {{-- <div>
        @foreach ($document->skillOther as $skillOther)
        <p>{{ $skillOther->title }}</p>
        <p>: {{ $skillOther->description }}</p>
        @endforeach
    </div> --}}
</body>
</html>
