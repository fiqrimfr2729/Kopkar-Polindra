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
            <h3 class="animated fadeInLeft" style="margin-top:10px;">Data Pengurus</h3>
            <p class="animated fadeInDown">
              Dashboard <span class="fa-angle-right fa"></span> Anggota <span class="fa-angle-right fa"></span> Pengurus
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-14" style="padding:20px;">
        <div class="col-md-12 padding-0">
          <div class="col-md-12 padding-0 animated fadeInRight">
            <div class="panel">
                <div class="panel-heading">
                  <h3>Data Pengurus</h3>
                </div>
                <div class="form-group" style="margin-top:10px; margin-left:10px;">
                  <a data-target="#modalCreate" data-toggle="modal" class="btn btn-raised btn-success"><i class="fas fa-plus"></i> Tambah data</a>
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
                        @foreach ($pengurus as $key => $data)
                            <tr>
                              <td> {{++$key}} </td>
                              <td> {{$data->nama_lengkap}} </td>
                              <td> {{$data->no_anggota}} </td>
                              <td> {{$data->tgl_gabung}} </td>
                              <td> {{$data->no_hp}} </td>
                              <td> 
                                <a data-target="#modalFormDetail" data-toggle="modal" class=" btn ripple-infinite btn-info" data-placement="top" title="Detail"><span class="fas fa-list"></span></a>
                                <a href="{{route('form_edit_anggota', ['no_anggota'=>$data->no_anggota])}}" class=" btn  ripple-infinite btn-primary" data-placement="top" title="Ubah"><span class="fas fa-edit"></span></a>
                                <a data-target="#modalResetPWD" data-toggle="modal" class=" btn  ripple-infinite btn-info" data-placement="top" title="Reset Password"><span class="fas fa-sync"></span></a>
                                <a data-target="#modalHapusSiswa" data-toggle="modal" class=" btn  ripple-infinite btn-danger" data-placement="top" title="Hapus"><span class="fas fa-trash"></span></a>
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

    <div class="modal fade" id="modalCreate" role="dialog" aria-labelledby="mediumModalLabel" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Tambah Data Pengurus</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="modalFormCreate" action="" method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="Nama Anggota">Pilih Anggota</label>
                <span id="pesan" class="error"></span></p>

                <select id="selectAnggota" name="no_anggota" class="select2-A js-states" style="width: 300px;">
                  <option> </option>
                  @foreach ($anggota as $key => $data)
                    <option name="no_anggota" value="{{$data->no_anggota}}">({{$data->no_anggota}}) {{$data->nama_lengkap}}</option>
                  @endforeach
                  
                </select>
              </div>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Masukan</button>
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
  
  <script type="text/javascript">
    $(".select2-A").select2({
        placeholder: "Pilih anggota",
        allowClear: true,
        tags: true
      });

      $(".select2-B").select2({
        tags: true
      });

  </script>

<script type="text/javascript">
  var formCreate = $('#modalFormCreate');
      formCreate.submit(function (e) {
          console.log("test");
          e.preventDefault();
          $.ajax({
              url: '/pengurus_add',
              type: formCreate.attr('method'),
              data: formCreate.serialize(),
              dataType: "json",
              success: function( res ){
                console.log(res)
                if( res.error == 0 ){
                  $('#modalCreate').modal('hide');
                  swal(
                    'Success',
                    res.message,
                        'success'
                    ).then(OK => {
                      if(OK){
                          window.location.href = "{{ route('pengurus') }}";
                      }
                    });
                }else{
                    $('#modalCreate').modal('hide');
                    swal(
                      'Fail',
                      res.message,
                      'error'
                    )
                  }
                }
            })
        });
</script>
</body>

</html>
