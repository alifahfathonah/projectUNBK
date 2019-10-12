@extends('client.template')
@section('mainclient')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header"><h2>{{ __('Konfirmasi Tes') }}</h2></div>

            <div class="card-body">
              @if($kondisi->kondisinilai == 1)
                <table class="table table-bordered">
                  <tr>
                    <th><center>Benar</center></th>
                    <td>{{ @count($benar) }}</td>
                  </tr>
                  <tr>
                    <th><center>Salah</center></th>
                    <td>{{ @count($salah) }}</td>
                  </tr>
                  <tr>
                    <th><center>Kosong</center></th>
                    <td>{{ $kosong }}</td>
                  </tr>
                  <tr>
                    <th><center>Nilai</center></th>
                    <th>
                      @php($ttl=0)
                      @foreach($benar as $bnr)
                      @php($ttl += $bnr->skor_jawab)
                      @endforeach
                      {{ $ttl }}
                    </th>
                  </tr>
                </table>
                @endif
                <form method="POST" action="{{ url('/selesai/ujian/'.$id_uji.'/siswa/'.$id_sis.'/kelas/'.$id_kel) }}">
                    @csrf
                   	<p>
                   		Terimakasih telah berpartisipasi dalam test ini. <br>
                      Silahkan Klik Tombol LOGOUT untuk mengakhiri test
                   	</p>
                   	
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block" id="sendNewSms">
                                {{ __('LOGOUT') }}
                            </button>
                             
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection