@php($mataujian = DB::table('mata_pelajaran_models')->get())
@php($paketujian = DB::table('ujian_models')->get())
@php($soal = DB::Table('master_soals')->get())
@php($siswa = DB::Table('data_siswa_models')->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')->where('periode_models.status', 1)->get())
<div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{ @count($mataujian) }}</h3>

          <p>Jumlah Mata Ujian</p>
        </div>
        <div class="icon">
          <i class="fa fa-file-o"></i>
        </div>
        <a href="{{ url('/home/mata/ujian') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{ @count($paketujian) }}</h3>

          <p>Jumlah Paket Soal</p>
        </div>
        <div class="icon">
          <i class="fa fa-file-o"></i>
        </div>
        <a href="{{ url('/home/soal') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{ @count($soal) }}</h3>

          <p>Jumlah Soal</p>
        </div>
        <div class="icon">
          <i class="fa fa-file-o"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>{{ @count($siswa) }}</h3>

          <p>Siswa</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ url('/home/daftar/peserta') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
  <!-- Main row -->