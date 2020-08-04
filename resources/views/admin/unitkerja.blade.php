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
            <h3 class="animated fadeInLeft" style="margin-top:10px;">Data Unit Kerja</h3>
            <p class="animated fadeInDown">
              Dashboard <span class="fa-angle-right fa"></span> Anggota <span class="fa-angle-right fa"></span> Unit Kerja
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-14" style="padding:20px;">
        <div class="col-md-12 padding-0">
          <div class="col-md-12 padding-0 animated fadeInRight">
            <div class="panel">
                <div class="panel-heading">
                  <h3>Data Unit Kerja</h3>
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
                          <th>Nama Unit Kerja</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($unitKerja as $key => $data)
                            <tr>
                              <td> {{++$key}}</td>
                              <td> {{$data->nama_unit_kerja}} </td>
                              <td>
                                <button type="button" data-target="#modalUpdate" data-id_unit_kerja="{{$data->id_unit_kerja}}" data-toggle="modal" class=" btn  ripple-infinite btn-primary" data-placement="top" title="Ubah"><span class="fas fa-edit"></span></button>
                                <button type="button" data-target="#modalDelete" data-id_unit_kerja="{{$data->id_unit_kerja}}" data-toggle="modal" class=" btn  ripple-infinite btn-danger" data-placement="top" title="Hapus"><span class="fas fa-trash"></span></button> 
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


    <!-- start: right menu -->
    @include('admin._partials.right_menu')
    <!-- end: right menu -->
  </div>


  <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Edit Data Unit Kerja</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="modalFormUpdate" action="" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="Nama Unit Kerja">Nama Unit Kerja</label>
              <span id="pesan" class="error"></span></p>
              <input type="hidden" name="id_unit_kerja" id="cat_id">
              <input type="text" class="form-control" id="nama_unit_kerja" name="nama_unit_kerja" value="" required />
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

  <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Hapus Data Unit Kerja</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="modalFormDelete" method="POST">
            {{ csrf_field() }}
          <input type="hidden" name="id_unit_kerja" id="cat_id">
            <p><center>Apa anda yakin akan menghapus data ini ?</center></p>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hapus</button>
          <button id="btnDelete" class="btn btn-danger">Hapus</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Tambah Data Unit Kerja</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="modalFormCreate" action="" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="Nama Unit Kerja">Nama Unit Kerja</label>
              <span id="pesan" class="error"></span></p>
              <input type="text" class="form-control" id="nama_unit_kerja" name="nama_unit_kerja" value="" required />
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

  <!-- start: Mobile -->
  @include('admin._partials.mobile')
  <!-- end: Mobile -->

  <!-- start: Javascript -->
  @include('admin._partials.js')
  <!-- end: Javascript -->

  <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>

  <script type="text/javascript">
    var formCreate = $('#modalFormCreate');
        formCreate.submit(function (e) {
            console.log("test");
            e.preventDefault();
            $.ajax({
                url: '/unit_kerja_create',
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
                            window.location.href = "{{ route('unit_kerja') }}";
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

<script type="text/javascript">
  var formUpdate = $('#modalFormUpdate');
      formUpdate.submit(function (e) {
          e.preventDefault();

          $.ajax({
              url: '/unit_kerja_update',
              type: formUpdate.attr('method'),
              data: formUpdate.serialize(),
              dataType: "json",
              success: function( res ){
                console.log(res)
                if( res.error == 0 ){
                  $('#modalUpdate').modal('hide');
                  swal(
                    'Success',
                    res.message,
                        'success'
                    ).then(OK => {
                      if(OK){
                          window.location.href = "{{ route('unit_kerja') }}";
                      }
                    });
                }else{
                    $('#modalUpdate').modal('hide');
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


  
  <script type="text/javascript">
      $('#modalDelete').on('show.bs.modal', function (event) {
      event.preventDefault();
      var button     = $(event.relatedTarget)
      var id_unit_kerja   = button.data('id_unit_kerja')
      var modal      = $(this)
      modal.find('.modal-body #cat_id').val(id_unit_kerja)
    });

    $('#modalUpdate').on('show.bs.modal', function (event) {
      event.preventDefault();
      var button     = $(event.relatedTarget)
      var id_unit_kerja   = button.data('id_unit_kerja')
      var modal      = $(this)
      modal.find('.modal-body #cat_id').val(id_unit_kerja)
    });

    var formDelete = $('#modalFormDelete');
        formDelete.submit(function (e) {
            e.preventDefault();

            $.ajax({
                url: '/unit_kerja_delete',
                type: formDelete.attr('method'),
                data: formDelete.serialize(),
                dataType: "json",
                success: function( res ){
                  console.log(res)
                  if( res.error == 0 ){
                    
                    $('#modalDelete').modal('hide');
                    swal(
                      'Success',
                      res.message,
                          'Berhasil'
                      ).then(OK => {
                        if(OK){
                            window.location.href = "{{ route('unit_kerja') }}";
                        }
                      });
                  }else{
                      $('#modalDelete').modal('hide');
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
