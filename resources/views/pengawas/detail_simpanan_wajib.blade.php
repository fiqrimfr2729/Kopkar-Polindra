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
            <h3 class="animated fadeInLeft" style="margin-top:10px;">Data Simpanan Wajib</h3>
            <p class="animated fadeInDown">
              Dashboard <span class="fa-angle-right fa"></span> Simpanan Wajib <span class="fa-angle-right fa"></span> Data Simpanan Wajib
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-14" style="padding:20px;">
        <div class="col-md-12 padding-0">
          <div class="col-md-12 padding-0 animated fadeInRight">
            <div class="panel">
                <div class="panel-heading">
                <h3>{{$anggota->nama_lengkap}} ({{$anggota->no_anggota}}) </h3>
                  
                </div>

                
                
                <div class="panel-body">
                  <div class="responsive-table">
                    <table id="" class="table table-striped table-bordered display" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th>Tanggal Dibayarkan</th>
                          <th>Jumlah</th>
                          <th width="30%">Keterangan </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($simpanan as $key => $data)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$data->tanggal}}</td>
                            <td><?php $jumlah = $data->jumlah; $jumlah="Rp ". number_format($jumlah,0,',','.'); echo $jumlah ?></td>
                            <td>@if ($data->ket == "") {{ "-" }} @else {{ $data->ket }} @endif
                            </td>
                            <td>
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
    @include('pengurus._partials.right_menu')
    <!-- end: right menu -->

  </div>

  <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Tambah Pembayaran Simpanan Wajib</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="modalFormCreate" action="" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="Nama Unit Kerja">No Anggota</label>
            <input type="text" class="form-control" id="cat_id" name="no_anggota" value="{{$anggota->no_anggota}}" readonly="readonly" required />
            </div>

            <div class="form-group">
                <label for="tgl_dibayar">Tanggal Dibayarkan</label>
              <input type="date" class="form-control" id="" name="tanggal" required>
            </div>

            <div class="form-group">
                <label for="Nama Unit Kerja">Jumlah yang dibayarkan</label>
                <input type="text" class="form-control mask-money" id="" name="jumlah" value="" required />
            </div>

            <div class="form-group">
                <label for="Keterangan">Keterangan</label>
                <input type="text" class="form-control" id="" name="keterangan" value=" " />
            </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Submit</button>
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
        <input type="hidden" name="id_simpanan_pokok" id="cat_id">
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
                            <th>Simpanan Wajib 2020</th>
                            <td id=""><?php $jumlah = $detail['jumlah_tahun_ini']; $jumlah="Rp ". number_format($jumlah,0,',','.'); echo $jumlah ?></td>
                        </tr>
                        <tr>
                            <th>Simpanan Wajib Tahun Lalu</th>
                            <td id=""><?php $jumlah = $detail['jumlah']-$detail['jumlah_tahun_ini']; $jumlah="Rp ". number_format($jumlah,0,',','.'); echo $jumlah ?> </td>
                        </tr>
                        <tr>
                            <th>Total Simpanan Wajib</th>
                            <td id=""> <?php $jumlah = $detail['jumlah']; $jumlah="Rp ". number_format($jumlah,0,',','.'); echo $jumlah ?></td>
                        </tr>
                        <tr>
                            <th>Jumlah Angsuran Tahun Ini</th>
                            <td id="">{{$detail['jumlah_angsuran'].' Kali'}}</td>
                        </tr>
                        
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal"><span class="fa fa-times-circle"></span> Close</button>
                </div>
            </div>
        </div>
    </div>

  <!-- start: Mobile -->
  @include('pengawas._partials.mobile')
  <!-- end: Mobile -->

  <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>

  <!-- start: Javascript -->
  @include('pengawas._partials.js')
  <!-- end: Javascript -->

  <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="/js/plugins/jquery.datatables.min.js"></script>
  <script src="/js/plugins/datatables.bootstrap.min.js"></script>
  <script src="/js/plugins/jquery.mask.min.js"></script>

  <script type="text/javascript">
    $('.mask-date').mask('00/00/0000');
    $('.mask-time').mask('00:00:00');
    $('.mask-date_time').mask('00/00/0000 00:00:00');
    $('.mask-cep').mask('00000-000');
    $('.mask-phone').mask('0000-0000-00000');
    $('.mask-phone_with_ddd').mask('(00) 0000-0000');
    $('.mask-number').mask('0000000000');
    $('.mask-cpf').mask('000.000.000-00', {
        reverse: true
      });
      $('.mask-money').mask('000.000.000.000.000', {
        reverse: true
      });
      $('.mask-money2').mask("#.##0,00", {
        reverse: true
      });
  </script>

  <script type="text/javascript">
        var formCreate = $('#modalFormCreate');
            formCreate.submit(function (e) {
                console.log("test");
                e.preventDefault();
                $.ajax({
                    url: '/pengurus/simpanan_wajib_create',
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
                                window.location.reload(true);
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
  $('#modalDelete').on('show.bs.modal', function (event) {
  event.preventDefault();
  var button     = $(event.relatedTarget)
  var id_simpanan   = button.data('id_simpanan')
  var modal      = $(this)
  modal.find('.modal-body #cat_id').val(id_simpanan)
});

var formDelete = $('#modalFormDelete');
    formDelete.submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: '/pengurus/simpanan_wajib_delete',
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
                      'success'
                  ).then(OK => {
                    if(OK){
                        window.location.reload(true);
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
