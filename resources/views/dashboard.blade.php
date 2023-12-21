@extends('layout.master')

@section('content')
<div class="m-4">

    <div>
        <div class="text-2xl font-bold text-center p-5">
            <h1>Template Document</h1>
        </div>

        <div class="grid gap-4 overflow-x-auto">
            <div class="flex">
                @foreach ($publicDocs as $doc)
                    <div class="flex items-end basis-1/6 m-5 h-48 border-2 border-sky-200 rounded-md">
                        <a href="{{ route('detail_personal', ['username' => $doc->user->username, 'document' => $doc->id, 'type' => "read"]) }}" class="w-full">
                            <div class="p-2 bg-sky-200">
                                <div class="font-semibold">
                                    {{ $doc->title }}
                                </div>
                                <div class="text-sm text-gray-600">
                                    Created: {{ $doc->created_time }}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <div>
        <div class="bg-sky-50 rounded-md mt-5">
            {{-- <div class="grid grid-cols-3 p-5">
                <div id="titleMyDocument">
                    <h1 class="text-2xl font-bold">My Document</h1>
                </div>
                <div id="searchDocument" class="text-right">
                    <form action="{{ route('dashboard', ['username' => Auth::user()->username]) }}" method="GET">
                        <input type="text" name="search" placeholder="Search by document name" value="{{ $searchName }}">
                        <button type="submit">Search</button>
                    </form>
                </div>
                <div id="sortedBy" class="text-right">
                    <h1>Sort By: </h1>
                    <form action="{{ route('dashboard', ['username' => Auth::user()->username]) }}" method="GET">
                        <select id="sortDropdown" name="sortBy" onchange="this.form.submit()">
                            <option value="default" {{ request('sortBy') == 'default' ? 'selected' : '' }}>Default</option>
                            <option value="time" {{ request('sortBy') == 'time' ? 'selected' : '' }}>Created Time</option>
                            <option value="titlea_z" {{ request('sortBy') == 'titlea_z' ? 'selected' : '' }}>Title A to Z</option>
                            <option value="titlez_a" {{ request('sortBy') == 'titlez_a' ? 'selected' : '' }}>Title Z to A</option>
                        </select>
                    </form>
                </div>
            </div> --}}

            <div class="grid grid-cols-3 p-5">
                <div id="titleMyDocument">
                    <h1 class="text-2xl font-bold">My Document</h1>
                </div>

                <div id="searchDocument" class="flex items-center">
                    <form action="{{ route('dashboard', ['username' => Auth::user()->username]) }}" method="GET" class="flex">
                        <input type="text" name="search" placeholder="Search by document name" value="{{ $searchName }}" class="p-2 border border-gray-300 rounded-l-md focus:outline-none focus:ring focus:border-sky-500">
                        <button type="submit" class="p-2 bg-sky-800 text-white rounded-r-md hover:bg-sky-700 focus:outline-none focus:ring focus:border-sky-500 transition duration-150">Search</button>
                    </form>
                </div>

                <div id="sortedBy" class="flex items-center">
                    <h1 class="mr-2">Sort By:</h1>
                    <form action="{{ route('dashboard', ['username' => Auth::user()->username]) }}" method="GET">
                        <select id="sortDropdown" name="sortBy" onchange="this.form.submit()" class="p-2 border border-sky-500 rounded-md focus:outline-none focus:ring focus:border-sky-500">
                            <option value="default" {{ request('sortBy') == 'default' ? 'selected' : '' }}>Default</option>
                            <option value="time" {{ request('sortBy') == 'time' ? 'selected' : '' }}>Created Time</option>
                            <option value="titlea_z" {{ request('sortBy') == 'titlea_z' ? 'selected' : '' }}>Title A to Z</option>
                            <option value="titlez_a" {{ request('sortBy') == 'titlez_a' ? 'selected' : '' }}>Title Z to A</option>
                        </select>
                    </form>
                </div>
            </div>


            <script>
                function applySort() {
                    // Get the selected value from the dropdown
                    var selectedValue = document.getElementById('sortDropdown').value;
                    // Redirect to the selected route
                    window.location.href = selectedValue;
                }
            </script>

            <div class="grid grid-cols-4 gap-4">
                @foreach ($docs as $doc)
                <div class="flex items-end m-5 h-48 border-2 border-sky-200 rounded-md">
                    <div class="flex flex-col w-full rounded-md">
                        <div class="">
                            <a href="{{ route('detail_personal', ['username' => $doc->user->username, 'document' => $doc->id, 'type' => "update"]) }}" class="w-full flex-grow">
                                <div class="p-2 bg-sky-200 h-full">
                                    <div class="font-semibold">
                                        {{ $doc->title }}
                                    </div>
                                    <div class="text-sm text-gray-600">
                                        Created: {{ $doc->created_time }}
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="">
                            <button onclick="window.location.href='{{ route('generate_pdf', ['username' => $doc->user->username, 'document' => $doc->id]) }}'" class="w-full bg-sky-800 text-white">Download</button>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
