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
            <h3 class="animated fadeInLeft" style="margin-top:10px;">Simpanan Pokok</h3>
            <p class="animated fadeInDown">
              Dashboard <span class="fa-angle-right fa"></span> Simpanan Pokok <span class="fa-angle-right fa"></span> Anggota
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-14" style="padding:20px;">
        <div class="col-md-12 padding-0">
          <div class="col-md-12 padding-0 animated fadeInRight">
            <div class="panel">
                <div class="panel-heading">
                  <h3>Data  Anggota</h3>
                </div>
                
                <div class="panel-body">
                  <div class="responsive-table">
                    <table id="" class="table table-striped table-bordered display" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th>Nama Lengkap</th>
                          <th>No Anggota</th>
                          <th>Sudah dibayar</th>
                          <th>Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($anggota as $key => $data)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$data->nama_lengkap}}</td>
                            <td>{{$data->no_anggota}}</td>
                            <td>
                                <span style="font-size: 100%" class="label label-<?php if($data->jumlah < 500000) : echo 'warning'; else: echo 'success'; endif; ?>"><?php $jumlah = $data->jumlah; $jumlah="Rp ". number_format($jumlah,0,',','.'); echo $jumlah ?></span>
                            </td>
                            <td>
                                <a href="{{route('detail_simpanan_anggota_pengawas',['no_anggota'=>$data->no_anggota])}}" class=" btn ripple-infinite btn-info" data-placement="top" title="Detail"><span class="fas fa-list"></span></a>
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

    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Tambah Pembayaran Simpanan Pokok</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="modalFormCreate" action="" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="Nama Unit Kerja">No Anggota</label>
                  <input type="text" class="form-control" id="cat_id" name="no_anggota" value="" readonly="readonly" required />
                </div>

                <div class="form-group">
                    <label for="Nama Unit Kerja">Nama Lengkap</label>
                    <input type="text" class="form-control" id="cat_nama" name="nama_lengkap" value="" readonly="readonly" required />
                </div>

                <div class="form-group">
                  <label for="tgl_dibayar">Tanggal Dibayarkan</label>
                  <input type="date" class="form-control" id="" name="tanggal" required>
                </div>

                <div class="form-group">
                    <label for="Nama Unit Kerja">Jumlah yang dibayarkan</label>
                    <input type="text" class="form-control mask-money" id="" name="jumlah" value="" required />
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


    <!-- start: right menu -->
    @include('pengawas._partials.right_menu')
    <!-- end: right menu -->

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
        $('#modalCreate').on('show.bs.modal', function (event) {
        event.preventDefault();
        var button     = $(event.relatedTarget)
        var no_anggota   = button.data('no_anggota')
        var nama_lengkap = button.data('nama_lengkap')
        var modal      = $(this)
        modal.find('.modal-body #cat_nama').val(nama_lengkap)
        modal.find('.modal-body #cat_id').val(no_anggota)});

        
    </script>

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
                    url: '/pengurus/simpanan_pokok_create',
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
                                window.location.href = "{{ route('simpanan_pokok_anggota') }}";
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
