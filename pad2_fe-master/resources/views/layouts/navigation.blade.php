<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" height="30">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="#"
                        style="color: rgba(41, 38, 65, 0.50); margin-left: 15px;">Organization</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"
                        style="color: var(--Monochrome-100, #292641); font-weight: 500;">Pertamina</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="margin-left: 32px;">Well Name </a>
                </li>
                <div class="dropdown">
                    <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        IJN 9-1
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="margin-left: 32px;">Rig Name </a>
                </li>
                <div class="dropdown">
                    <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        EPI-9
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="margin-left: 32px; color: rgba(41, 38, 65, 0.50);">Rig
                        Activity</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Rig
                        Tripping Out</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" style="margin-left: 32px; color: rgba(41, 38, 65, 0.50);">Date</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="currentDateTime"></a>
                </li>
            </ul>
        </div>
        <div class="collapse navbar-collapse me-5" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!-- <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li> -->
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