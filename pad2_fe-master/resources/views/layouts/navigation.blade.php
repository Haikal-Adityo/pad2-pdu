<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Logo -->
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" height="30">

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Organization Link -->
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#" style="color: rgba(41, 38, 65, 0.50); margin-left: 15px;">Organization</a>
                </li>

                <!-- Dynamic Company Links -->
                @foreach ($companies as $company)
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: var(--Monochrome-100, #292641); font-weight: 500;">{{ $company->company_name }}</a>
                </li>
                @endforeach

                <!-- Well Name Dropdown -->
                <li class="nav-item">
                    <a class="nav-link" href="#" style="margin-left: 32px;">Well Name</a>
                </li>
                <div class="dropdown">
                    <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @if ($wells->isNotEmpty())
                            {{ $wells->first()->well_name }}
                        @else
                            Select Well
                        @endif
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach ($wells as $well)
                        <li><a class="dropdown-item" href="#">{{ $well->well_name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <!-- Sensor Dropdown (Example Dropdown) -->
                <li class="nav-item">
                    <a class="nav-link" href="#" style="margin-left: 32px;">Sensor</a>
                </li>
                <div class="dropdown">
                    <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Select Sensor
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <!-- Add sensor options here if needed -->
                        <li><a class="dropdown-item" href="#">Sensor Option 1</a></li>
                        <li><a class="dropdown-item" href="#">Sensor Option 2</a></li>
                        <li><a class="dropdown-item" href="#">Sensor Option 3</a></li>
                    </ul>
                </div>

                <!-- Additional Static Links (Example) -->
                <li class="nav-item">
                    <a class="nav-link" href="#" style="margin-left: 32px; color: rgba(41, 38, 65, 0.50);">Rig Activity</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Rig Tripping Out</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="margin-left: 32px; color: rgba(41, 38, 65, 0.50);">Date</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="currentDateTime"></a>
                </li>
            </ul>
        </div>

        <!-- User Dropdown (Authentication Dropdown) -->
        <div class="collapse navbar-collapse me-5" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!-- Profile Link (Example) -->
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                        
                        <!-- Logout Link -->
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
