@extends('layout.master')

@section('content')
    <div>
        <h1>Resume Template</h1>
    </div>
    <div>
        <h1>My CV</h1>
        <h1>Profile</h1>
        <div>
            <a href="{{ route('redirect.page', ['profile']) }}" class="nav-header">View Profile</a>
        </div>
    </div>
@endsection
