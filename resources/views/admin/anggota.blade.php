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
                <div class="form-group" style="margin-top:10px; margin-left:10px;">
                  <a href="{{ route('form_anggota') }}" class="btn btn-raised btn-success"><i class="fas fa-plus"></i> Tambah data</a>
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
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($anggota as $key => $data)
                            <tr>
                              <td> {{++$key}} </td>
                              <td> {{$data->nama_lengkap}} </td>
                              <td> {{$data->no_anggota}} </td>
                              <td> {{$data->tgl_gabung}} </td>
                              <td> {{$data->no_hp}} </td>
                              <td> 
                                <a data-target="#modalFormDetail" data-toggle="modal" class=" btn ripple-infinite btn-info" data-placement="top" title="Detail"><span class="fas fa-list"></span></a>
                                <a href="{{route('form_edit_anggota', ['no_anggota'=>$data->no_anggota])}}" class=" btn  ripple-infinite btn-primary" data-placement="top" title="Ubah"><span class="fas fa-edit"></span></a>
                                <a data-target="#modalReset" data-toggle="modal" data-no_anggota="{{$data->no_anggota}}" class=" btn  ripple-infinite btn-info" data-placement="top" title="Reset Password"><span class="fas fa-sync"></span></a>
                                <a data-target="#modalHapus" data-toggle="modal" class=" btn  ripple-infinite btn-danger" data-placement="top" title="Hapus"><span class="fas fa-trash"></span></a>
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
    <!-- end: content -->

    <div class="modal fade" id="modalReset" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Reset password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="modalFormReset" method="POST">
              {{ csrf_field() }}
            <input type="hidden" name="no_anggota" id="cat_id">
              <p><center>Apa anda yakin akan mereset password ?</center></p>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button id="btnDelete" class="btn btn-danger">Reset</button>
          </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Hapus Data Unit Kerja</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="modalFormHapus" method="POST">
              {{ csrf_field() }}
            <input type="hidden" name="no_anggota" id="cat_id">
              <p><center>Apa anda yakin akan menghapus data ini ?</center></p>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button id="btnDelete" class="btn btn-danger">Hapus</button>
          </form>
          </div>
        </div>
      </div>
    </div>

    


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
