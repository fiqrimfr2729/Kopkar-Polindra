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
            <h3 class="animated fadeInLeft" style="margin-top:10px;">Simpanan Wajib</h3>
            <p class="animated fadeInDown">
              Dashboard <span class="fa-angle-right fa"></span> Simpanan Wajib <span class="fa-angle-right fa"></span> Angsuran
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-14" style="padding:20px;">
        <div class="col-md-12 padding-0">
          <div class="col-md-12 padding-0 animated fadeInRight">
            <div class="panel">
                <div class="panel-heading">
                  <h3>Rekap Pembayaran</h3>
                </div>

                <div class="form-group" style="margin-top:10px; margin-left:10px;">
                  <a data-target="#modalDetail" data-toggle="modal" class="btn btn-raised btn-info"><i class="fas fa-list"></i> Rincian </a>
                </div>
                
                <div class="panel-body">
                  <div class="responsive-table">
                    <table id="" class="table table-striped table-bordered display" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th>Bulan </th>
                          <th>Tahun</th>
                          <th>Jumlah</th>
                          <th>Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($simpanan as $key => $data)
                        <tr>
                            <td>{{++$key}}</td>
                            <td><?php
                                setlocale(LC_TIME, 'id_ID');
                                $monthNum = $data->month;
                                $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
                                echo $monthName; // Output: May
                               ?></td>
                            <td>{{$data->year}}</td>
                            <td><?php $jumlah = $data->jumlah; $jumlah="Rp ". number_format($jumlah,0,',','.'); echo $jumlah ?></td>
                            <td>
                              <a href={{route('rincian_angsuran_wajib_pengawas', ['month'=>$data->month,'year'=>$data->year])}} class=" btn ripple-infinite btn-info" data-placement="top" title="Detail"><span class="fas fa-list"></span></a>
                              
                            </td>
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

    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="myModalLabel">Rincian Simpanan Wajib</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <table class="table table-striped table-bordered table-hover no-footer">
                      <tr>
                          <th>Total Simpanan Pokok</th>
                          <td id=""><?php $jumlah = $total; $jumlah="Rp ". number_format($jumlah,0,',','.'); echo $jumlah ?></td>
                      </tr>
                      
                  </table>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-info" data-dismiss="modal"><span class="fa fa-times-circle"></span> Close</button>
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
