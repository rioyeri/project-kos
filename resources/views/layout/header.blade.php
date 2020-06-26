<header class="header black-bg">
  <div class="sidebar-toggle-box">
    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
  </div>
  <!--logo start-->
  <a href="{{ route('getHome') }}" class="logo"><b>GREEN<span>HOUSE</span></b></a>
  <!--logo end-->
  <div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
      <!-- settings start -->
      <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle">
          <i class="fa fa-gear"> Setting</i>
        </a>
        <ul class="dropdown-menu extended tasks-bar">
          <li>
            <a href="{{ route('greenhouse.index') }}"><i class="fa fa-gears"> Pengaturan Landing Page Greenhouse</i></a>
          </li>
          <li>
            <a href="{{ route('galeri.index') }}"><i class="fa fa-picture-o"> Pengaturan Gambar Gallery</i></a>
          </li>
          <li>
            <a href="{{ route('editUser', ['id' => session('id_user')]) }}"><i class="fa fa-user"> Edit Akun</i></a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="top-menu">
    <ul class="nav pull-right top-menu">
      <li><a class="logout" href="{{ route('logout') }}">Logout</a></li>
    </ul>
  </div>
</header>
