<header class="navbar sticky-top flex-md-nowrap p-0" style="background-color:#4b3d17">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/" style="background-color:#4b3d17; color:white">Evaluasi SAKIP</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="w-100 rounded-0 border-0">
        <div class="nav justify-content-end">
            <div class="dropdown">
                <button class="btn dropdown-toggle rounded-0 mx-3" style="color:white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span data-feather="user" class="align-text-bottom"></span> {{ auth()->user()->name }}
                </button>
                <ul class="dropdown-menu rounded-0">
                    @if((auth()->user()->role=="BPS Provinsi") || (auth()->user()->role=="BPS Kab/Kota") || (auth()->user()->role=="Unit Kerja Pusat"))
                        <li>
                            <a href="/profil" class="dropdown-item border-bottom border-dark" role="button">
                                Profil
                            </a>
                        </li>
                    @endif
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item" onclick="return confirm('Yakin akan keluar?')">
                                Logout <span data-feather="log-out" class="align-text-bottom"></span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
  </header>