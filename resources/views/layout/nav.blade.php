{{-- navbar --}}
<nav class="sticky top-0 w-screen p-5 bg-sky-50 backdrop-blur-lg bg-opacity-50 mx-auto">
    <div class="flex">
        <div class="left-nav flex mr-auto gap-2">
            <div>
                {{-- @auth
                <a href="{{ route('redirect.page', ['dashboard']) }}" class="nav-header">Home</a>
                @else
                    <a href="{{ route('redirect.page', ['home']) }}" class="nav-header">Home</a>
                @endauth --}}
                <ul>
                    <li>
                        {{-- <a href="{{ route('redirect.page', ['home']) }}" class="nav-header">Home</a> --}}
                        @auth
                            @if(Auth::user()->id)
                                <a href="{{ route('dashboard', ['username' => Auth::user()->username]) }}" class="nav-header">Dashboard</a>
                                <a href="{{ route('cvBuilderPage', ['username' => Auth::user()->username]) }}" class="nav-header">CV Builder</a>
                            @else
                                <span class="nav-header">Dashboard</span>
                                <span class="nav-header">CV Builder</span>
                            @endif
                            {{-- <a href="{{ route('cvBuilderPage') }}" class="nav-header">CV Builder</a>
                            <a href="{{ route('dashboard', ['user_id' => Auth::user()->user_id ]) }}" class="nav-header">Dashboard</a> --}}

                        @endauth

                    </li>
                </ul>
            </div>
            {{-- <div>
                <a href="{{ route('redirect.page', ['cv_builder']) }}" class="nav-header">CV Builder</a>
            </div> --}}
        </div>

        <div class="right-nav flex gap-2">
            {{-- @auth
                <div>
                    <a href="{{ route('redirect.page', ['profile']) }}" class="btn-ghost">Profile</a>
                </div>
                <div>
                    <a href="{{ route('redirect.page', ['logout']) }}" class="btn-solid">Logout</a>
                </div>
            @else
                <div>
                    <a href="{{ route('redirect.page', ['login']) }}" class="btn-ghost">Login</a>
                </div>
                <div>
                    <a href="{{ route('redirect.page', ['register']) }}" class="btn-solid">Register</a>
                </div>
            @endauth --}}
            <div>
                @auth
                    <a href="{{ route('updatePage') }}" class="btn-ghost">Profile</a>
                    <a href="{{ route('logout') }}" class="btn-solid">Logout</a>
                @else
                    <a href="{{ route('loginPage') }}" class="btn-ghost">Login</a>
                    <a href="{{ route('registerPage') }}" class="btn-solid">Register</a>
                @endauth
            </div>

        </div>
    </div>
</nav>
