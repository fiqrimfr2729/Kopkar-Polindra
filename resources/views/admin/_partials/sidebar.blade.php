<div id="left-menu">
    <div class="sub-left-menu scroll">
      <ul class="nav nav-list">
        <li class="time">
            <img src="/img/koperasi.png" style="margin-left:auto;margin-right:auto;display:block;width:100px; margin-bottom:20px; margin-top:50px;">
            <p class="animated fadeInRight">Sat, October 1st 2029</p>
        </li>
  
      <li class="<?php if($menu == 'dashboard'){echo 'active';}?> ripple">
          <a href="{{ route('dashboard_admin') }}"><span class="fa-home fa"></span> Dashboard </a>
        </li>
  
        <li class="<?php if($menu == 'anggota'){echo 'active';}?> ripple">
            <a class="tree-toggle nav-header"><span class="fas fa-users"></span> Anggota 
              <span class="fa-angle-right fa right-arrow text-right"></span>
            </a>
            <ul class="nav nav-list tree">
                <li><a href="{{ route('admin_anggota') }}">Anggota</a></li>
                <li><a href="{{ route('pengurus') }}">Pengurus</a></li>
                <li><a href="{{route('pengawas')}}">Pengawas</a></li>
                <li><a href="{{ route('unit_kerja') }}">Unit Kerja</a></li>
            </ul>
        </li>

        <li class="ripple">
          <a href="{{ route('logout_admin') }}"><span class="fa fa-power-off"></span> Logout</a>
        </li>
  
      </ul>
    </div>
  </div>
  