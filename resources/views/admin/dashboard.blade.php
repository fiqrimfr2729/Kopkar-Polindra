<!DOCTYPE html>
<html lang="en">

@include('admin._partials.head')

<body id="mimin" class="dashboard">
  <!-- start: Header -->
  @include('admin._partials.navbar')
  <!-- end: Header -->

  <div class="container-fluid mimin-wrapper">
    <!-- start:Left Menu -->
    @include('admin._partials.sidebar')
    <!-- end: Left Menu -->


    <!-- start: content -->
    <div id="content">
      <div class="panel">
        <div class="panel-body">
          <div class="col-md-6 col-sm-12">
            <h2 class="animated fadeInLeft">Selamat Datang Admin</h2>
          </div>
        </div>
      </div>

      <div class="col-md-14" style="padding:20px;">
        <div class="col-md-12 padding-0">
          <div class="col-md-12 padding-0 animated fadeInRight">
            <div class="col-md-4">
              <div class="panel box-v1">
                <div class="panel-heading bg-white border-none">
                  <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                    <h3 class="text-left">Pengawas</h3>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                    <h4>
                      <i class="fa fa-book-reader fa-3x"></i>
                    </h4>
                  </div>
                </div>
                <div class="panel-body text-center">
                  <h1>{{$pengawas}}</h1>
                  <p>Data Pengawas</p>
                  <hr />
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel box-v1">
                <div class="panel-heading bg-white border-none">
                  <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                    <h3 class="text-left">Pengurus</h3>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                    <h4>
                      <span class="fas fa-chalkboard-teacher fa-3x"></span>
                    </h4>
                  </div>
                </div>
                <div class="panel-body text-center">
                  <h1>{{$pengurus}}</h1>
                  <p>Data Pengurus</p>
                  <hr />
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel box-v1">
                <div class="panel-heading bg-white border-none">
                  <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                    <h3 class="text-left">Anggota</h3>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                    <h4>
                      <span class="fas fa-users fa-3x icons icon text-right"></span>
                    </h4>
                  </div>
                </div>
                <div class="panel-body text-center">
                  <h1>{{$anggota}}</h1>
                  <p>Data Anggota</p>
                  <hr />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end: content -->


    <!-- start: right menu -->
    @include('admin._partials.right_menu')
    <!-- end: right menu -->

  </div>

  <!-- start: Mobile -->
  @include('admin._partials.mobile')
  <!-- end: Mobile -->

  <!-- start: Javascript -->
  @include('admin._partials.js')
  <!-- end: Javascript -->
</body>

</html>
