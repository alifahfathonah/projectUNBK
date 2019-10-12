<div id="myNav" class="overlay w3-card-4">

<header >
  <!-- <div class="w3-padding">
    <div class="row">
          <div class="col-md-12">
             <div >
                <h2 align="center">Daftar Soal</h2>
              </div> 
          </div>
  </div>
  </div> -->
  <a href="javascript:void(0)" class="w3-btn w3-block w3-red" onclick="closeNav()"><i class="fa fa-arrow-right"></i> Back</a>
</header>

  <div class="overlay-content" >
  <div class="container">
      <div class="row">
      <div class="col-md-12" >
        <br>
      <div class="container-fluid">
        <div class="row"  >
         
      @foreach($pilsoal as $pil)
        @php($cekbutton = DB::Table('jawab_models')->where('id_ujian', $id_ujian)->where('id_siswa', $id_siswa)->where('no_soal', $pil->no_soal)
      ->first())

      @if(@count($cekbutton) > 0)
        @if($cekbutton->kondisi == 'ragu-ragu')
          @if($pil->no_soal == $soal->no_soal)
          <div class="col-md-3" style="margin-top:15px;  padding-right: 5px;padding-left: 5px;">
          <a class="w3-button w3-red w3-border w3-border-red w3-round w3-padding-large" href="{{url('/mulai/ujian/'.base64_encode($id_ujian).'/siswa/'.base64_encode($id_siswa).'/kelas/'.base64_encode($id_kelas).'/nosoal/'.base64_encode($pil->no_soal))}}"><b>{{$pil->no_soal}}</b></a><span class="w3-badge badge-style  w3-white" ><b>{{ $cekbutton->jawaban }}</b></span>
          </div>
          @else
          <div class="col-md-3" style="margin-top:15px;  padding-right: 5px;padding-left: 5px;">
          <a class="w3-button w3-yellow w3-border w3-border-blue w3-round w3-padding-large" href="{{url('/mulai/ujian/'.base64_encode($id_ujian).'/siswa/'.base64_encode($id_siswa).'/kelas/'.base64_encode($id_kelas).'/nosoal/'.base64_encode($pil->no_soal))}}"><b>{{$pil->no_soal}}</b></a><span class="w3-badge  w3-white badge-style" ><b>{{ $cekbutton->jawaban }}</b></span>
          </div>
          @endif
        @else
        @if($pil->no_soal == $soal->no_soal)
        <div class="col-md-3" style="margin-top:15px;  padding-right: 5px;padding-left: 5px;">
        <a class="w3-button w3-red w3-border w3-border-red w3-round w3-padding-large" href="{{url('/mulai/ujian/'.base64_encode($id_ujian).'/siswa/'.base64_encode($id_siswa).'/kelas/'.base64_encode($id_kelas).'/nosoal/'.base64_encode($pil->no_soal))}}"><b>{{$pil->no_soal}}</b></a><span class="w3-badge badge-style  w3-white" ><b>{{ $cekbutton->jawaban }}</b></span>
        </div>
        @else
        <div class="col-md-3" style="margin-top:15px;  padding-right: 5px;padding-left: 5px;">
        <a class="w3-button w3-blue w3-border w3-border-yellow w3-round w3-padding-large" href="{{url('/mulai/ujian/'.base64_encode($id_ujian).'/siswa/'.base64_encode($id_siswa).'/kelas/'.base64_encode($id_kelas).'/nosoal/'.base64_encode($pil->no_soal))}}"><b>{{$pil->no_soal}}</b></a><span class="w3-badge badge-style  w3-white" ><b>{{ $cekbutton->jawaban }}</b></span>
        </div>
        @endif
        
        @endif
      @else
        @if($pil->no_soal == $soal->no_soal)
        <div class="col-md-3" style="margin-top:15px;  padding-right: 5px;padding-left: 5px;">
        <a class="w3-button w3-red w3-border w3-border-red w3-round w3-padding-large" href="{{url('/mulai/ujian/'.base64_encode($id_ujian).'/siswa/'.base64_encode($id_siswa).'/kelas/'.base64_encode($id_kelas).'/nosoal/'.base64_encode($pil->no_soal))}}"><b>{{$pil->no_soal}}</b></a>
        </div>
        @else
        <div class="col-md-3" style="margin-top:15px;  padding-right: 5px;padding-left: 5px;">
        <a class="w3-button w3-white w3-border w3-border-blue w3-round w3-padding-large" href="{{url('/mulai/ujian/'.base64_encode($id_ujian).'/siswa/'.base64_encode($id_siswa).'/kelas/'.base64_encode($id_kelas).'/nosoal/'.base64_encode($pil->no_soal))}}"><b>{{$pil->no_soal}}</b></a>
        </div>
        @endif

      @endif

        @endforeach

      </div>   
      </div>
      <br><br>
      </div>

    </div>
  </div>
  </div>
  <!-- <footer class="bawah">
     <a href="javascript:void(0)" class="w3-btn w3-block w3-red" onclick="closeNav()"><i class="fa fa-arrow-right"></i></a>
  </footer> -->
</div>