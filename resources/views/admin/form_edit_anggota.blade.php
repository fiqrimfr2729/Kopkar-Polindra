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
      <div class="panel box-shadow-none content-header">
        <div class="panel-body">
          <div class="col-md-12">
            <h3 class="animated fadeInLeft">Form Anggota</h3>
            <p class="animated fadeInDown">
              Dashboard <span class="fa-angle-right fa"></span> Anggota <span class="fa-angle-right fa"></span> Edit Data Anggota
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-12 top-20 padding-0">
        <div class="col-md-12">
          <div class="col-md-12 panel">
            <div class="panel-heading">
              <h4>Edit Data Anggota</h4>
            </div>
            <div class="col-md-12 panel-body" style="padding-bottom:30px;">
              <div class="col-md-12">
                <form class="cmxform" id="formEditAnggota" method="post" action="">
                  {{ csrf_field() }}
                  <input type="hidden" name="no_anggota" value="{{$anggota[0]->no_anggota}}" id="cat_id">
                  <div class="col-md-6">
                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" class="form-text" id="validate_firstname" value="{{$anggota[0]->nama_lengkap}}" name="nama_lengkap" required="">
                      <span class="bar"></span>
                      <label>Nama Lengkap</label>
                    </div>

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      <input type="text" class="form-text " value="{{$anggota[0]->nama_inisial}}" id="validate_firstname" name="nama_inisial" required>
                      <span class="bar"></span>
                      <label>Nama Inisial</label>
                      
                    </div>

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      <input type="text" class="form-text" value="{{$anggota[0]->email}}" id="validate_email" name="email" required>
                      <span class="bar"></span>
                      <label>Email</label>
                    </div>

                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        Unit Kerja
                        <select name="id_unit_kerja" id="#" class="form-control">
                          <option value="" name="id_unit_kerja" disabled selected>Pilih unit kerja</option>
                          @foreach ($unit as $key => $data)
                            <option value="{{$data->id_unit_kerja}}" name="id_unit_kerja" @if ($anggota[0]->id_unit_kerja == $data->id_unit_kerja) {{"selected"}} @endif> {{$data->nama_unit_kerja}}</option>
                          @endforeach
                          
                        </select>
                      </div>

                      <div class="form-group form-animate-text" style="margin-top:40px !important;">
                        Jabatan
                        <select name="role" id="#" class="form-control">
                          <option value="" name="id_unit_kerja" disabled selected>Pilih jabatan</option>
                          <option value="1" name="id_unit_kerja" @if ($anggota[0]->role == "1") {{"selected"}} @endif>Anggota</option>
                          <option value="2" name="id_unit_kerja" @if ($anggota[0]->role == "2") {{"selected"}} @endif>Pengurus</option>
                          <option value="3" name="id_unit_kerja" @if ($anggota[0]->role == "3") {{"selected"}} @endif>Pengawas</option>
                          
                        </select>
                      </div>

                  </div>

                  

                  <div class="col-md-6">
                    <div class="form-group form-animate-text" style="margin-top:40px !important;">
                      <input type="text" class="form-text mask-phone" id="" value="{{$anggota[0]->no_hp}}" name="no_hp" required>
                      <span class="bar"></span>
                      <label>Nomor Hp</label>
                  </div>

                    <div class="form-group form-animate-text" style="margin-top:40px !important; margin-bottom:20px">
                      <input type="text" class="form-text" id="" value="{{$anggota[0]->alamat}}" name="alamat" required>
                      <span class="bar"></span>
                      <label>Alamat</label>
                    </div>

                    <div class="form-group form-animate-text">
                        Tanggal Lahir
                      <input type="date" class="form-text" value="{{$anggota[0]->tgl_lahir}}" id="" name="tgl_lahir" required>
                      <span class="bar"></span>
                    </div>

                    <div class="form-group form-animate-text">
                        Tanggal Bergabung
                      <input type="date" class="form-text" value="{{$anggota[0]->tgl_gabung}}" id="" name="tgl_gabung" required>
                      <span class="bar"></span>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <input class="submit btn btn-danger" type="submit" value="Submit">
                  </div>
                </form>
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

  <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>

  <!-- start: Javascript -->
  @include('admin._partials.js')
  <!-- end: Javascript -->

  

  <script type="text/javascript">
    var formCreate = $('#formEditAnggota');
        formCreate.submit(function (e) {
            console.log("test");
            e.preventDefault();
            $.ajax({
                url: '/anggota_update',
                type: formCreate.attr('method'),
                data: formCreate.serialize(),
                dataType: "json",
                success: function( res ){
                  console.log(res)
                  if( res.error == 0 ){
                    swal(
                      'Success',
                      res.message,
                          'success'
                      ).then(OK => {
                        if(OK){
                            window.location.href = "{{ route('anggota') }}";
                        }
                      });
                  }else{
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