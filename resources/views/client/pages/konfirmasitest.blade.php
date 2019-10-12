@extends('client.template')
@section('mainclient')
<div class="container">
  <form method="POST" action="{{ url('/ujian/'.base64_encode($cek_ujian->id_ujian).'/matpel/'.$id_matpel.'/siswa/'.$id_siswa.'/kelas/'.base64_encode($cek_biodata->id_kelas)) }}">
  <div class="row ">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header"><h2>{{ __('Konfirmasi Test') }}</h2></div>
        <div class="card-body">
          
            @csrf
            <label><b>Nama Test :</b></label>
            <span class="form-control">SIMULASI UNBK {{$cek_periode->judul_periode}}</span>
            <label><b>Status Tes :</b></label>
            @if($cek_status->status_mata_pelajaran == 1)
            <marquee style="color:red" class="form-control">Ujian Bisa Dilakukan</marquee>
            @elseif($cek_status->status_mata_pelajaran == 0)
            <marquee style="color:red" class="form-control">Ujian Belum Bisa Dilakukan</marquee>
            @endif
            <label><b>Sub Tes :</b></label>
            <span class="form-control">{{$cek_matpel->mt_pelajaran}}</span>
            <label><b>Tanggal test :</b></label>
            <span class="form-control">{{date('d/m/Y', strtotime($cek_ujian->tgl_ujian))}}</span>
            <label><b>Waktu Test :</b></label>
            <span class="form-control">{{ $cek_ujian->waktu_ujian }}</span>
            <label><b>Alokasi Waktu test</b></label>
            <span class="form-control">{{$cek_ujian->alokasi_waktu}} Menit</span>
        </div>
      </div>
      <br><br>
    </div>
    <div class="col-md-4">
      <div class="alert alert-warning">
        Tombol mulai hanya akan active jika apabila waktu sekarang sudah melewati waktu mulai test. Tekan tombol F5 untuk merefresh halaman
      </div>
      <div class="form-group row mb-0">
        <div class="col-md-12">
          <button   class="btn btn-danger btn-block"  @if($cek_status->status_mata_pelajaran == 0) {{ 'disabled type=button' }} @else  {{ 'type=submit' }}@endif>
            {{ __('Mulai') }}
          </button>
        </div>
      </div>
    </div>
  </div>
  </form>
</div>
@endsection