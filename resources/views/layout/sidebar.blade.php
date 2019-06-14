<aside>
  <div id="sidebar" class="nav-dropdown ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      {{-- <p class="centered"><a href="profile.html"><img src="{{ asset('img/Y baru logo2.png')}}" class="img-circle" width="80"></a></p> --}}
      <h5 class="centered">Menu</h5>
      <li class="mt">
        <a class="@yield('dash')" href="/home">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
          </a>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" class="@yield('kamar')">
          <i class="fa fa-home"></i>
          <span>Kamar</span>
          </a>
        <ul class="sub">
          <li><a href="/tambahkamar">Tambah Kamar</a></li>
          <li><a href="/lihatkamar">Daftar Kamar</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" class="@yield('penghuni')">
          <i class="fa fa-users"></i>
          <span>Penghuni</span>
          </a>
        <ul class="sub">
          <li><a href="/tambahpenghuni">Tambah Penghuni</a></li>
          <li><a href="/lihatpenghuni">Daftar Penghuni</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="/mapping/tambah" class="@yield('mapping')">
          <i class="fa fa-map-marker"></i>
          <span>Mapping Kamar-Penghuni</span>
          </a>
      </li>
      <li class="sub-menu">
          <a href="javascript:;" class="@yield('pembayaran')">
            <i class="fa fa-usd"></i>
            <span>Pembayaran</span>
            </a>
          <ul class="sub">
            <li><a href="/tambahpembayaran">Tambah Data Pembayaran</a></li>
            <li><a href="/lihatpembayaran">Daftar Data Pembayaran</a></li>
            <li><a href="/laporanpembayaran">Laporan Pembayaran</a></li>
          </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" class="@yield('jaminankunci')">
          <i class="fa fa-key"></i>
          <span>Jaminan Kunci</span>
          </a>
        <ul class="sub">
          <li><a href="/tambahjaminankunci">Tambah Data Jaminan Kunci</a></li>
          <li><a href="/lihatjaminankunci">Daftar Data Jaminan Kunci</a></li>
        </ul>
      </li>
      <li class="sub-menu">
          <a href="javascript:;" class="@yield('pengeluaran')">
            <i class="fa fa-upload"></i>
            <span>Pengeluaran</span>
            </a>
          <ul class="sub">
            <li><a href="/tambahpengeluaran">Tambah Data Pengeluaran</a></li>
            <li><a href="/lihatpengeluaran">Daftar Data Pengeluaran</a></li>
          </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" class="@yield('pemasukan')">
          <i class="fa fa-download"></i>
          <span>Pemasukan</span>
          </a>
        <ul class="sub">
          <li><a href="/tambahpemasukan">Tambah Data Pemasukan</a></li>
          <li><a href="/lihatpemasukan">Daftar Data Pemasukan</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="/laporankeuangan" class="@yield('keuangan')">
          <i class="fa fa-book"></i>
          <span>Laporan Keuangan</span>
        </a>
      </li>
    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
