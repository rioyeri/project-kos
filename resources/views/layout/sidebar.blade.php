<aside>
  <div id="sidebar" class="nav-dropdown ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      {{-- <p class="centered"><a href="profile.html"><img src="{{ asset('img/Y baru logo2.png')}}" class="img-circle" width="80"></a></p> --}}
      <h5 class="centered">Menu</h5>
      <li class="mt">
        <a class="@yield('dash')" href="{{ route('getHome') }}">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
          </a>
      </li>
      <li class="sub">
        <a href="/lihatkamar" class="@yield('kamar')">
          <i class="fa fa-home"></i>
          <span>Kamar</span>
          </a>
      </li>
      <li class="sub">
        <a href="/lihatpenghuni" class="@yield('penghuni')">
          <i class="fa fa-users"></i>
          <span>Penghuni</span>
          </a>
      </li>
      <li class="sub">
        <a href="/mapping/lihat" class="@yield('mapping')">
          <i class="fa fa-map-marker"></i>
          <span>Mapping Kamar-Penghuni</span>
          </a>
      </li>
      <li class="sub">
          <a href="/lihatpembayaran" class="@yield('pembayaran')">
            <i class="fa fa-usd"></i>
            <span>Pembayaran</span>
          </a>
      </li>
      <li class="sub">
        <a href="/lihatjaminankunci" class="@yield('jaminankunci')">
          <i class="fa fa-key"></i>
          <span>Jaminan Kunci</span>
        </a>
      </li>
      <li class="sub">
          <a href="/lihatpengeluaran" class="@yield('pengeluaran')">
            <i class="fa fa-upload"></i>
            <span>Pengeluaran</span>
          </a>
      </li>
      <li class="sub">
        <a href="/lihatpemasukan" class="@yield('pemasukan')">
          <i class="fa fa-download"></i>
          <span>Pemasukan</span>
        </a>
      </li>
      <li class="sub">
        <a href="/laporankeuangan" class="@yield('keuangan')">
          <i class="fa fa-book"></i>
          <span>Laporan Keuangan</span>
        </a>
      </li>
    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
