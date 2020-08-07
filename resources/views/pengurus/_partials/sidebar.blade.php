<div id="left-menu">
    <div class="sub-left-menu scroll">
      <ul class="nav nav-list">
        <li class="time">
            <img src="/img/koperasi.png" style="margin-left:auto;margin-right:auto;display:block;width:100px; margin-bottom:20px; margin-top:50px;">
            <p class="animated fadeInRight">Sat, October 1st 2029</p>
        </li>
  
        <li class="<?php if($menu == 'dashboard'){echo 'active';}?> ripple">
          <a href="{{route('dashboard_pengurus')}}"><span class="fa-home fa"></span> Dashboard </a>
        </li>

      <li class="<?php if($menu == 'anggota'){echo 'active';}?> ripple">
          <a href="{{route('anggota')}}"><span class="fas fa-users"></span> Anggota </a>
      </li>

      <li class="<?php if($menu == 'simpanan_pokok'){echo 'active';}?> ripple">
        <a class="tree-toggle nav-header"><span class="fas fa-wallet"></span> Simpanan Pokok 
          <span class="fa-angle-right fa right-arrow text-right"></span>
        </a>
        <ul class="nav nav-list tree">
          <li><a href="{{route('simpanan_pokok_anggota')}}">Anggota</a></li>
          <li><a href="{{route('angsuran_simpanan_pokok')}}">Data Angsuran</a></li>
        </ul>
      </li>

      <li class="<?php if($menu == 'simpanan_wajib'){echo 'active';}?> ripple">
        <a class="tree-toggle nav-header"><span class="fas fa-wallet"></span> Simpanan Wajib 
          <span class="fa-angle-right fa right-arrow text-right"></span>
        </a>
        <ul class="nav nav-list tree">
          <li><a href="{{route('simpanan_wajib_anggota')}}">Anggota</a></li>
          <li><a href="{{route('angsuran_simpanan_wajib')}}">Data Angsuran</a></li>
        </ul>
      </li>

      <li class="<?php if($menu == 'simpanan_sukarela'){echo 'active';}?> ripple">
        <a class="tree-toggle nav-header"><span class="fas fa-wallet"></span> Simpanan Sukarela 
          <span class="fa-angle-right fa right-arrow text-right"></span>
        </a>
        <ul class="nav nav-list tree">
          <li><a href="{{route('simpanan_sukarela_anggota')}}">Anggota</a></li>
          <li><a href="">Data Angsuran</a></li>
        </ul>
      </li>

      <li class="<?php if($menu == 'shu_anggota'){echo 'active';}?> ripple">
        <a href="{{route('shu_anggota')}}"><span class="fas fa-wallet"></span> Simpanan Hasil Usaha </a>
      </li>
        


        <li class="ripple">
          <a href="{{route('logout_pengurus')}}"><span class="fa fa-power-off"></span> Logout</a>
        </li>
  
      </ul>
    </div>
  </div>
  