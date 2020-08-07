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
            <h3 class="animated fadeInLeft" style="margin-top:10px;">Simpanan Hasil Usaha</h3>
            <p class="animated fadeInDown">
              Dashboard <span class="fa-angle-right fa"></span> Simpanan Sukarela <span class="fa-angle-right fa"></span> Anggota
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
                          <th>No Anggota</th>
                          <th>Nama Lengkap</th>
                          <th>SHU Anggota {{$tahun}}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($anggota as $key => $data)
                        <tr>
                            <td>{{$data->no_anggota}}</td>
                            <td>{{$data->nama_lengkap}}</td>
                            <td>
                              <span style="font-size: 100%" class="label label-success"><?php $jumlah = $data->shu_anggota; $jumlah="Rp ". number_format($jumlah,0,',','.'); echo $jumlah ?></span>
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
              <h5 class="modal-title" id="myModalLabel">Pengurangan SHU Anggota</h5>
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
                  <label for="Nama Unit Kerja"> Total SHU (Simpanan Sukarela)</label>
                  <input type="text" class="form-control" id="cat_sisa" name="sisa" value="" readonly="readonly" required />
                </div>

                <div class="form-group">
                  <input type="hidden" class="form-control" id="" name="tahun" value="{{$tahun}}" readonly="readonly" required />
                </div>

                <div class="form-group">
                  <label for="tgl_dibayar"> Jumlah Pengurangan</label>
                  <input type="text" class="form-control mask-money" id="" placeholder="Masukan Jumlah Pengurangan" name="pengurangan" required>
                </div>

                <div class="form-group">
                  <label for="tgl_dibayar">Pindahkan Ke</label>
                  <select name="simpanan" id="#" class="form-control">
                    <option value="" name="simpanan" disabled selected>Pilih Simpanan</option>
                    <option value="pokok" name="simpanan" >Simpanan Pokok</option>
                    <option value="wajib" name="simpanan" >Simpanan Wajib</option>
                    
                  </select>
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

    @foreach ($anggota as $key => $data)
      <div class="modal fade" id="modalDetail{{$key}}" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-labelledby="largeModal" aria-hidden="true">
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
                        </tr>
                        <tr>

                        </tr>
                        
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal"><span class="fa fa-times-circle"></span> Close</button>
                </div>
            </div>
        </div>
      </div>
    @endforeach
    


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
        var sisa        = button.data('sisa')
        var modal      = $(this)
        modal.find('.modal-body #cat_nama').val(nama_lengkap)
        modal.find('.modal-body #cat_id').val(no_anggota)
        modal.find('.modal-body #cat_sisa').val(sisa)});

        
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
                    url: '/pengurus/pengurangan_shu',
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
                                location.reload();
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
