<!DOCTYPE html>
<html lang="en">

@include('admin._partials.head')

<body id="mimin" class="dashboard">
  <!-- start: Header -->
  @include('pengurus._partials.navbar')
  <!-- end: Header -->

  <div class="container-fluid mimin-wrapper">
    <!-- start:Left Menu -->
    @include('pengurus._partials.sidebar')
    <!-- end: Left Menu -->


    <!-- start: content -->
    <div id="content">
      <<div class="panel box-shadow-none content-header">
        <div class="panel-body">
          <div class="col-md-12">
            <h3 class="animated fadeInLeft" style="margin-top:10px;">Simpanan Hasil Usaha</h3>
            <p class="animated fadeInDown">
              Dashboard <span class="fa-angle-right fa"></span> Simpanan Hasil Usaha <span class="fa-angle-right fa"></span> SHU Anggota
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-14" style="padding:20px;">
        <div class="col-md-12 padding-0">
          <div class="col-md-12 padding-0 animated fadeInRight">
            <div class="panel">
                <div class="panel-heading">
                  <h3>Data SHU Anggota</h3>
                </div>
                <div class="form-group" style="margin-top:10px; margin-left:10px;">
                  <a data-target="#modalCreate" data-toggle="modal" class="btn btn-raised btn-success"><i class="fas fa-plus"></i> Hitung SHU Anggota</a>
                  <a data-target="#modalDetail" data-toggle="modal" class="btn btn-raised btn-info"><i class="fas fa-list"></i> Rincian </a>
                </div>
                <div class="panel-body">
                  <div class="responsive-table">
                    <table id="" class="table table-striped table-bordered display" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th>Tahun</th>
                          <th>Jumlah SHU Anggota</th>
                          <th>Aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($simpanan as $key => $data)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$data->tahun}}</td>
                            <td>
                                <span style="font-size: 100%" class="label label-success"><?php $jumlah = $data->shu_anggota; $jumlah="Rp ". number_format($jumlah,0,',','.'); echo $jumlah ?></span>
                            </td>
                            <td>
                              <a href="{{route('rincian_penerimaan_shu',['tahun'=>$data->tahun])}}" class=" btn ripple-infinite btn-info" data-placement="top" title="Detail"><span class="fas fa-list"></span></a>
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
              <h5 class="modal-title" id="myModalLabel">Tambah Pembayaran Simpanan Sukarela</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="modalFormCreate" action="" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                  <label for="">Total Simpanan Seluruhnya</label>
                  <input type="text" class="form-control" id="total_simpanan" name="total_simpanan" value="" readonly="readonly" required />
                </div>

                <div class="form-group">
                  <label for="">Tahun</label>
                  <select name="tahun" id="tahun" class="form-control">
                    <option value="" name="tahun" disabled selected>Pilih Tahun</option>
                    @foreach($tahun as $key => $data)
                      <option value="{{$data}}" name="tahun" >{{$data}}</option>
                    @endforeach
                    
                    
                  </select>
                </div>

                <div class="form-group">
                  <label for="Nama Unit Kerja"> Jumlah Hasil Usaha Anggota </label>
                  <input type="text" class="form-control mask-money" id="" name="shu_anggota" value="" required />
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
    @include('pengurus._partials.right_menu')
    <!-- end: right menu -->

  </div>

  <!-- start: Mobile -->
  @include('pengurus._partials.mobile')
  <!-- end: Mobile -->

  
  <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>

 <!-- start: Javascript -->
 @include('pengurus._partials.js')
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
                    url: '/pengurus/hitung_shu',
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
                                window.location.href = "{{ route('shu_anggota') }}";
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

<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
      // Kita sembunyikan dulu untuk loadingnya

      $("#tahun").change(function(){ // Ketika user mengganti atau memilih data provinsi
         // Sembunyikan dulu combobox kota nya
          // Tampilkan loadingnya

          $.ajax({
              type: "GET", // Method pengiriman data bisa dengan GET atau POST
              url: "/pengurus/total_simpanan", // Isi dengan url/path file php yang dituju
              data: {tahun : $("#tahun").val()}, // data yang akan dikirim ke file yang dituju
              dataType: "json",
              beforeSend: function(e) {
                  if(e && e.overrideMimeType) {
                          e.overrideMimeType("application/json;charset=UTF-8");
                  }
              },
              success: function(response){ // Ketika proses pengiriman berhasil
                 // Sembunyikan loadingnya

                  // set isi dari combobox kota
                  // lalu munculkan kembali combobox kotanya
                  document.getElementById('total_simpanan').value =  response.jumlah;
              },
              error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                  alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
              }
          });
      });
  });
</script>


</body>

</html>
