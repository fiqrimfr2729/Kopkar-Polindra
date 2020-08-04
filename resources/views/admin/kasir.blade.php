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
      <<div class="panel box-shadow-none content-header">
        <div class="panel-body">
          <div class="col-md-12">
            <h3 class="animated fadeInLeft" style="margin-top:10px;">Data Kasir</h3>
            <p class="animated fadeInDown">
              Point of Sales <span class="fa-angle-right fa"></span> Kasir <span class="fa-angle-right fa"></span> Data Kasir
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-14" style="padding:20px;">
        <div class="col-md-12 padding-0">
          <div class="col-md-12 padding-0 animated fadeInRight">
            <div class="panel">
                <div class="panel-heading">
                  <h3>Data Anggota</h3>
                </div>
                <div class="form-group" style="margin-top:10px; margin-left:10px;">
                  <a href="" class="btn btn-raised btn-success"><i class="fas fa-plus"></i> Tambah data</a>
                </div>
                <div class="panel-body">
                  <div class="responsive-table">
                    <table id="" class="table table-striped table-bordered display" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th>Nama </th>
                          <th>No Anggota</th>
                          <th>Tanggal Gabung</th>
                          <th>No HP</th>
                          <th>action</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                      </tbody>
                    </table>
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
