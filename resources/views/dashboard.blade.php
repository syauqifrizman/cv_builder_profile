@extends('layout.master')

@section('content')
    <div>
        <h1>Resume Template</h1>
        <div class="grid grid-cols-4 bg-neutral-200 gap-4">
            <div>1</div>
            <div>2</div>
            <div>3</div>
            <div>4</div>
            <div>5</div>
            {{-- ini ntar di foreach --}}
        </div>
    </div>
    <div>
        <h1>My CV</h1>
        <div class="grid grid-cols-4 bg-neutral-200 gap-4">
            <div>1</div>
            <div>2</div>
            <div>3</div>
            <div>4</div>
            <div>5</div>
            {{-- ini ntar di foreach juga sesuai dengan yg ada di database--}}
        </div>
        <h1>Profile</h1>
        <div>
            <a href="{{ route('redirect.page', ['profile']) }}" class="nav-header">View Profile</a>
        </div>
    </div>
@endsection
