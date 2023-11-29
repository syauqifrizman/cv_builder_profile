@extends('layout.master')

@section('content')
<div class="h-screen">

    <div class="grid justify-items-end mr-10">
        <h1>Profile</h1>
        <div>
            <a href="{{ route('redirect.page', ['profile']) }}" class="nav-header">View Profile</a>
        </div>
    </div>
    <div>
        <h1>Resume Template</h1>
        <div class="grid grid-cols-4 bg-neutral-200 gap-4">
            <div>1</div>
            <div>2</div>
            <div>3</div>
            <div>4</div>
            <div>5</div>
            {{-- ini ntar di foreach juga sesuai dengan yg ada di database--}}

        </div>
    </div>
    <div>
        <h1>My CV</h1>
        <div class="grid grid-cols-4 bg-neutral-200 gap-4">

        </div>

        <div class="flex flex-row">
            @foreach ($docs as $doc)
            <div class="flex items-end basis-1/6 m-5 h-48 border-2 border-sky-200">
                <a href="{{ route('detail', ['username' => $doc->user->username, 'document_id' => $doc->id]) }}" class="w-full">
                    <div class="p-2 bg-sky-200">
                        <div class="font-semibold">
                            {{ $doc->title }}
                        </div>
                        <div class="text-sm text-gray-600">
                            Created: {{$doc->created_time}}
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
