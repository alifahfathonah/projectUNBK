@extends('client.template')
@section('mainclient')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><h2>{{ __('Konfirmasi data Peserta') }}</h2></div>

            <div class="card-body">
                <form method="POST" action="{{ url('/client/cektoken') }}">
                    @csrf
                   <label><b>Nis :</b></label>
                   <span class="form-control">{{$data->nis}}</span>
                   <label><b>Nama Peserta:</b></label>
                    <span class="form-control">{{$data->namadepan.' '.$data->namabelakang}}</span>
                   <label><b>Tempat/ Tanggal lahir :</b></label>
                   <span class="form-control">{{$data->tmp_lahir.' / '.date('d F Y', strtotime($data->tgl_lahir))}}</span><label><b>Kelas :</b></label>
                   <span class="form-control">
                     @php($ckls = DB::table('kelas_m_odels')->where('id_kelas', $data->id_kelas)->first())
                     {{$ckls->judul_kelas}}
                   </span>
                   <label><b>Ujian Sekarang:</b></label>
                   <span class="form-control">
                     @php($cus = DB::table('mata_pelajaran_models')->where('jurusan', $ckls->jurusan)->where('status_mata_pelajaran', 1)->first())
                     @php($cper = DB::table('periode_models')->where('id_periode', $data->id_periode)->first())
                     @if(@count($cus) > 0)
                     @php($cimat = DB::table('mata_pelajaran_models')->where('id_mata_pelajaran', $cus->id_mata_pelajaran)->first())
                     {!!$cimat->mt_pelajaran.' '.$cimat->jurusan.' <b> Kode :</b> '.date('Y')."_".$cimat->mt_pelajaran!!}
                     <input type="hidden" name="id_matpel" value="{{$cus->id_mata_pelajaran}}">
                     <input type="hidden" name="id_kelas" value="{{$data->id_kelas}}">
                     <input type="hidden" name="id_periode" value="{{$data->id_periode}}">
                     @else
                     tidak ada ujian Saat ini!
                     @endif
                   </span>
                   <label><b>Token :</b></label>
                   <input type="text" name="token" class="form-control" placeholder="Isikan Token" required {{ @count($cus) < 1 ? 'disabled' : '' }}><br><br>
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block" {{ @count($cus) < 1 ? 'disabled' : '' }}>
                                {{ __('Submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div><br><br><br>
@endsection