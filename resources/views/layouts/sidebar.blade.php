<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background-color:#B4923D">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a style="color:dark" class="nav-link" aria-current="page" href="/dashboard">
            <span style="color:rgb(39, 36, 36)" data-feather="home" class="align-text-bottom"></span> Dashboard
          </a>
        </li>
        @if(auth()->user()->role=="Koordinator")
          <li class="nav-item">
            <a style="color:dark" class="nav-link" aria-current="page" href="/permindok">
              <span style="color:rgb(39, 36, 36)" data-feather="clipboard" class="align-text-bottom"></span> Permintaan Dokumen
            </a>
          </li>
          <li class="nav-item">
            <a style="color:dark" class="nav-link" aria-current="page" href="/repository/bukuLHE">
              <span style="color:rgb(39, 36, 36)" data-feather="book" class="align-text-bottom"></span> Repository
            </a>
          </li>
          <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#pengaturanTim-collapse" aria-expanded="true">
              &nbsp<span data-feather="users" class="align-text-bottom"></span>&nbsp Pengaturan Tim
            </button>
            <div class="collapse" id="pengaturanTim-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                <li class="bg-body-tertiary"><a href="/timDalnisKT" class="nav-link {{ Request::is('timDalnisKT*') ? 'active' : ''}} link-body-emphasis d-inline-flex text-decoration-none rounded">Pembagian Tim</a></li>
                <li class="bg-body-tertiary"><a href="/daftarTim" class="nav-link {{ Request::is('daftarTim*') ? 'active' : ''}} link-body-emphasis d-inline-flex text-decoration-none rounded">Daftar Tim</a></li>
              </ul>
            </div>
          </li>
          <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#pengaturanUser-collapse" aria-expanded="true">
              &nbsp<span data-feather="user" class="align-text-bottom"></span>&nbsp Pengaturan User
            </button>
            <div class="collapse" id="pengaturanUser-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                <li class="bg-body-tertiary"><a href="/unitKerja" class="nav-link {{ Request::is('unitKerja*') ? 'active' : ''}} link-body-emphasis d-inline-flex text-decoration-none rounded">Unit Kerja</a></li>
                <li class="bg-body-tertiary"><a href="/pegawai" class="nav-link {{ Request::is('pegawai*') ? 'active' : ''}} link-body-emphasis d-inline-flex text-decoration-none rounded">Pegawai</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a style="color:dark" class="nav-link" aria-current="page" href="/dokumenTL">
              <span style="color:rgb(39, 36, 36)" data-feather="file" class="align-text-bottom"></span> Tindak Lanjut
            </a>
          </li>
          <li class="mb-1">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#pengaturanKriteria-collapse" aria-expanded="true">
              &nbsp<span data-feather="file-text" class="align-text-bottom"></span>&nbsp Pengaturan Kriteria
            </button>
            <div class="collapse" id="pengaturanKriteria-collapse">
              <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                <li class="bg-body-tertiary"><a href="/komponenLKE" class="nav-link {{ Request::is('komponenLKE*') ? 'active' : ''}} link-body-emphasis d-inline-flex text-decoration-none rounded">LKE</a></li>
                <li class="bg-body-tertiary"><a href="/kke" class="nav-link {{ Request::is('kke*') ? 'active' : ''}} link-body-emphasis d-inline-flex text-decoration-none rounded">KKE</a></li>
                <li class="bg-body-tertiary"><a href="/ikuUnitKerja" class="nav-link {{ Request::is('ikuUnitKerja*') ? 'active' : ''}} link-body-emphasis d-inline-flex text-decoration-none rounded">IKU</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a style="color:dark" class="nav-link" aria-current="page" href="/database">
              <span style="color:rgb(39, 36, 36)" data-feather="database" class="align-text-bottom"></span> Database
            </a>
          </li>
        @endif
        @if((auth()->user()->role=="BPS Provinsi") || (auth()->user()->role=="BPS Kab/Kota") || (auth()->user()->role=="Unit Kerja Pusat"))
          <li class="nav-item">
            <a style="color:dark" class="nav-link" aria-current="page" href="/permindokUnitKerja">
              <span style="color:rgb(39, 36, 36)" data-feather="clipboard" class="align-text-bottom"></span> Permintaan Dokumen
            </a>
          </li>
          <li class="nav-item">
            <a style="color:dark" class="nav-link" aria-current="page" href="/tindakLanjut">
              <span style="color:rgb(39, 36, 36)" data-feather="file" class="align-text-bottom"></span> Tindak Lanjut
            </a>
          </li>
          <li class="nav-item">
            <a style="color:dark" class="nav-link" aria-current="page" href="/LHESatker">
              <span style="color:rgb(39, 36, 36)" data-feather="folder" class="align-text-bottom"></span> Laporan Hasil Evaluasi
            </a>
          </li>
        @endif
        @if((auth()->user()->role=="Anggota Tim") || (auth()->user()->role=="Ketua Tim") || (auth()->user()->role=="Pengendali Teknis"))
        <li class="nav-item">
          <a style="color:dark" class="nav-link" aria-current="page" href="/permindokPenilai">
            <span style="color:rgb(39, 36, 36)" data-feather="clipboard" class="align-text-bottom"></span> Permintaan Dokumen
          </a>
        </li>
        <li class="mb-1">
          <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#pengaturanKriteria-collapse" aria-expanded="true">
            &nbsp<span data-feather="file-text" class="align-text-bottom"></span>&nbsp Evaluasi
          </button>
          <div class="collapse" id="pengaturanKriteria-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
              @if(auth()->user()->role=="Anggota Tim")
                <li class="bg-body-tertiary"><a href="/evaluasiKKE" class="nav-link {{ Request::is('evaluasiKKE*') ? 'active' : ''}} link-body-emphasis d-inline-flex text-decoration-none rounded">KKE</a></li>
              @endif
              <li class="bg-body-tertiary"><a href="/evaluasiLKE" class="nav-link {{ Request::is('evaluasiLKE*','komponenLKE*') ? 'active' : ''}} link-body-emphasis d-inline-flex text-decoration-none rounded">LKE</a></li>
              <li class="bg-body-tertiary"><a href="/evaluasi_LKETL" class="nav-link {{ Request::is('evaluasi_LKETL*') ? 'active' : ''}} link-body-emphasis d-inline-flex text-decoration-none rounded">LKE TL</a></li>
              @if((auth()->user()->role=="Ketua Tim") || (auth()->user()->role=="Pengendali Teknis"))
                <li class="bg-body-tertiary"><a href="/evaluasiPanelisasi" class="nav-link {{ Request::is('evaluasiPanelisasi*') ? 'active' : ''}} link-body-emphasis d-inline-flex text-decoration-none rounded">Panelisasi</a></li>
              @endif
            </ul>
          </div>
        </li>
        <li class="nav-item">
            <a style="color:dark" class="nav-link" aria-current="page" href="/lhe/feedbackLHE">
              <span style="color:rgb(39, 36, 36)" data-feather="folder" class="align-text-bottom"></span> Laporan Hasil Evaluasi
            </a>
          </li>
        @endif
        @if(auth()->user()->role!="Koordinator")
          <li class="nav-item">
            <a style="color:dark" class="nav-link" aria-current="page" href="/lihatRepository/bukuLHE">
              <span style="color:rgb(39, 36, 36)" data-feather="book" class="align-text-bottom"></span> Repository
            </a>
          </li>
        @endif
      </ul>
    </div>
</nav>