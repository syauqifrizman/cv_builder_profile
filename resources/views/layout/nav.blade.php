{{-- navbar --}}
<nav class="sticky top-0 w-screen p-5 bg-sky-50 backdrop-blur-lg bg-opacity-50 mx-auto">
    <div class="flex">
        <div class="left-nav flex mr-auto gap-2">
            <div>
                <a href="{{ route('redirect.page', ['home']) }}" class="nav-header">Home</a>
            </div>
            <div>
                <a href="{{ route('redirect.page', ['cv_builder']) }}" class="nav-header">CV Builder</a>
            </div>
        </div>

        <div class="right-nav flex gap-2">
            <div>
                <a href="{{ route('redirect.page', ['login']) }}" class="btn-ghost">Login</a>
            </div>
            <div>
                <a href="{{ route('redirect.page', ['register']) }}" class="btn-solid">Register</a>
            </div>
        </div>
    </div>
</nav>
