<!DOCTYPE html>
<html lang="en">

@include('admin._partials.head')

<body id="mimin" class="dashboard">
  <!-- start: Header -->
  @include('pengawas._partials.navbar')
  <!-- end: Header -->

  <div class="container-fluid mimin-wrapper">
    <!-- start:Left Menu -->
    @include('pengawas._partials.sidebar')
    <!-- end: Left Menu -->


    <!-- start: content -->
    <div id="content">
      <<div class="panel box-shadow-none content-header">
        <div class="panel-body">
          <div class="col-md-12">
            <h3 class="animated fadeInLeft" style="margin-top:10px;">Data Anggota</h3>
            <p class="animated fadeInDown">
              Dashboard <span class="fa-angle-right fa"></span> Anggota <span class="fa-angle-right fa"></span> Anggota
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
                
                <div class="panel-body">
                  <div class="responsive-table">
                    <table id="" class="table table-striped table-bordered display" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No Anggota</th>
                          <th>Nama </th>
                          <th>Simpanan Pokok</th>
                          <th>Simpanan Wajib</th>
                          <th>Simpanan Sukarela</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($anggota as $key => $data)
                            <tr>
                              <td> {{$data->no_anggota}} </td>
                              <td> {{$data->nama_lengkap}} </td>
                              <td> <?php $jumlah = $data->simpanan_pokok; $jumlah="Rp ". number_format($jumlah,0,',','.'); echo $jumlah ?> </td>
                              <td> <?php $jumlah = $data->simpanan_wajib; $jumlah="Rp ". number_format($jumlah,0,',','.'); echo $jumlah ?> </td>
                              <td> <?php $jumlah = $data->simpanan_sukarela; $jumlah="Rp ". number_format($jumlah,0,',','.'); echo $jumlah ?> </td>
                              
                            </tr>
                        @endforeach
                      
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
    @include('pengawas._partials.right_menu')
    <!-- end: right menu -->

  </div>

  <!-- start: Mobile -->
  @include('pengawas._partials.mobile')
  <!-- end: Mobile -->

  <!-- start: Javascript -->
  @include('pengawas._partials.js')
  <!-- end: Javascript -->
</body>

</html>
