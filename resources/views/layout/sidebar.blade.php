<aside>
  <div id="sidebar" class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      <p class="centered"><a href="profile.html"><img src="{{ asset('img/Y baru logo2.png')}}" class="img-circle" width="80"></a></p>
      <h5 class="centered">GreenHouse</h5>
      <li class="mt">
        <a class="@yield('dash')" href="/home">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
          </a>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" class="@yield('kamar')">
          <i class="fa fa-desktop"></i>
          <span>Kamar</span>
          </a>
        <ul class="sub">
          <li><a href="/tambahkamar">Tambah Kamar</a></li>
          <li><a href="/lihatkamar">Lihat Kamar</a></li>
        </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" class="@yield('penghuni')">
          <i class="fa fa-book"></i>
          <span>Penghuni</span>
          </a>
        <ul class="sub">
          <li><a href="/tambahpenghuni">Tambah Penghuni</a></li>
          <li><a href="/lihatpenghuni">Lihat Penghuni</a></li>
        </ul>
      </li>
      <li class="sub-menu">
          <a href="javascript:;" class="@yield('pembayaran')">
            <i class="fa fa-book"></i>
            <span>Pembayaran</span>
            </a>
          <ul class="sub">
            <li><a href="/tambahpembayaran">Tambah Data Pembayaran</a></li>
            <li><a href="/lihatpembayaran">Lihat Data Pembayaran</a></li>
            <li><a href="/laporanpembayaran">Lihat Laporan Pembayaran</a></li>
          </ul>
      </li>
      <li class="sub-menu">
        <a href="javascript:;" class="@yield('jaminankunci')">
          <i class="fa fa-key"></i>
          <span>Jaminan Kunci</span>
          </a>
        <ul class="sub">
          <li><a href="/tambahjaminankunci">Tambah Data Jaminan Kunci</a></li>
          <li><a href="/lihatjaminankunci">Lihat Data Jaminan Kunci</a></li>
        </ul>
      </li>
      <li class="sub-menu">
          <a href="javascript:;" class="@yield('pinjaman')">
            <i class="fa fa-book"></i>
            <span>Pinjaman</span>
            </a>
          <ul class="sub">
            <li><a href="/tambahpinjaman">Tambah Data Pinjaman</a></li>
            <li><a href="/lihatpinjaman">Lihat Data Pinjaman</a></li>
          </ul>
      </li>
    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
