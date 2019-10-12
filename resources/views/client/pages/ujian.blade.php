@extends('client.template')
@section('mainclient')
@include('client.pages.include.menuleft')
<form method="POST" action="{{ url('/mulai/ujian/'.base64_encode($id_ujian).'/siswa/'.base64_encode($id_siswa).'/kelas/'.base64_encode($id_kelas).'/nosoal/'.base64_encode($soal->no_soal) ) }}">
@csrf
<div class="container-fluid" style="margin-top: -35px">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card" style="border-radius: 0;min-height: 100vh;">
            <div class="card-header">
              <h3>SOAL NO : 
                <span class="btn btn-primary" style="border-radius: 0;">{{$soal->no_soal}}</span>
                <button type="button" class="w3-button w3-blue w3-border  w3-right w3-large"><span id="demo">Loading...</span> </button>
                <button type="button" class="w3-button w3-gray w3-border w3-right w3-large">TIME LEFT</button>
              </h3> 
            </div>

            <div class="card-body">
                Text Font : 
              <button type="button" onclick="myFunctionA()" class="btn btn-default">30%</button>
              <button type="button" onclick="myFunctionAA()" class="btn btn-default">70%</button>
              <button type="button" onclick="myFunctionAAA()" class="btn btn-default">85%</button>
              <button type="button" onclick="myFunctionAAAA()" class="btn btn-default">100%</button>
              <br><hr><br >
              <div class="container" style="border:3px solid #dfdfdf; border-radius: 2px;padding: 20px;" id="myP">

              <p>
                @if($soal->type == 0)
                {!!$soal->soal!!}
                @elseif($soal->type == 1)
                  @if($soal->jenis == 1)
                      <b style="color:red">Tekan "F5" untuk merefresh jika audio tidak bisa di putar <br>Audio hanya bisa di putar 3 kali</b>
                       <div class="row">
                         <div class="col-md-4">
                            <div class="alert alert-info">
                              <div class="row">
                                <div class="col-md-2">
                                  <button id="play" class="btn btn-default" onclick="playVid()" type="button"><i class="fa fa-play"></i></button>
                                  <button id="play1" class="btn btn-default" onclick="playVid1()" type="button" style="display:none"><i class="fa fa-play"></i></button>
                                  <button id="pause" class="btn btn-default" onclick="pauseVid()" type="button" style="display:none"><i class="fa fa-pause"></i></button>
                                </div>
                                <div class="col-md-3">
                                   <span style="margin-left:10px;margin-right:10px;" id="duration">00:00</span>
                                </div>
                                <div class="col-md-6">
                                  <div class="row">
                                    <div class="col-sl-2">
                                      <i class="fa fa-volume-down"></i>
                                    </div>
                                    <div class="col-sl-8">
                                      <input id="vol-control"  type="range" min="0" max="100" step="1" oninput="SetVolume(this.value)" style="float-right" onchange="SetVolume(this.value)"></input>
                                    </div>
                                    <div class="col-sl-2">
                                      <i class="fa fa-volume-up"></i>
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                         </div>
                       </div>
                        <audio controls id="audio" style="display: none">
                          <!-- https://www.w3schools.com/html/horse.mp3 -->
                            <source src="{{asset('/upload/soal/audio/'.$soal->soal)}}" type="audio/mpeg">
                            <source src="{{asset('/upload/soal/audio/'.$soal->soal)}}" type="audio/ogg">
                        </audio>
                      @elseif($soal->jenis == 2)
                        <video controls style="max-width: 450px; max-height: 450px;">
                           <source src="{{asset('/upload/soal/video/'.$soal->soal)}}" type="video/mp4">
                          <source src="{{asset('/upload/soal/video/'.$soal->soal)}}" type="video/ogg">
                        </video>
                      @elseif($soal->jenis == 3)
                        <img src="{{asset('/upload/soal/img/'.$soal->soal)}}" id="imgsoal" style="width:70%">
                       @endif
                       <br><br>
                       {!! $soal->keterangan !!}
                @elseif($soal->type == 2)
                  @if($soal->jenis == 1)
                       <b style="color:red">Tekan "F5" untuk merefresh jika audio tidak bisa di putar <br>Audio hanya bisa di putar 3 kali</b>
                       <div class="row">
                         <div class="col-md-4">
                            <div class="alert alert-info">
                              <div class="row">
                                <div class="col-md-2">
                                  <button id="play" class="btn btn-default" onclick="playVid()" type="button"><i class="fa fa-play"></i></button>
                                  <button id="play1" class="btn btn-default" onclick="playVid1()" type="button" style="display:none"><i class="fa fa-play"></i></button>
                                  <button id="pause" class="btn btn-default" onclick="pauseVid()" type="button" style="display:none"><i class="fa fa-pause"></i></button>
                                </div>
                                <div class="col-md-3">
                                   <span style="margin-left:10px;margin-right:10px;" id="duration">00:00</span>
                                </div>
                                <div class="col-md-6">
                                  <div class="row">
                                    <div class="col-sl-2">
                                      <i class="fa fa-volume-down"></i>
                                    </div>
                                    <div class="col-sl-8">
                                      <input id="vol-control"  type="range" min="0" max="100" step="1" oninput="SetVolume(this.value)" style="float-right" onchange="SetVolume(this.value)"></input>
                                    </div>
                                    <div class="col-sl-2">
                                      <i class="fa fa-volume-up"></i>
                                    </div>
                                  </div>
                              </div>
                            </div>
                         </div>
                       </div>
                        <audio controls id="audio" style="display: none">
                            <source src="{{asset('/upload/soal/audio/'.$soal->soal)}}" type="audio/mpeg">
                            <source src="{{asset('/upload/soal/audio/'.$soal->soal)}}" type="audio/ogg">
                        </audio>
                      @elseif($soal->jenis == 2)
                        <video controls style="max-width: 450px; max-height: 450px;">
                           <source src="{{asset('/upload/soal/video/'.$soal->soal)}}" type="video/mp4">
                          <source src="{{asset('/upload/soal/video/'.$soal->soal)}}" type="video/ogg">
                        </video>
                      @elseif($soal->jenis == 3)
                        <img src="{{asset('/upload/soal/img/'.$soal->soal)}}" id="imgsoal" style="width: 70%; ">
                      @endif
                      <br>
                      {!!$soal->keterangan!!}
                @endif
              </p>
              <p>
              @php($cekjawaban = DB::table('jawab_models')->where('id_ujian', $id_ujian)->where('id_siswa', $id_siswa)->where('no_soal', $soal->no_soal)->first())
              @if(@count($cekjawaban->jawaban) > 0)
              @method('put')
          <div style="margin-left: 10px;">
          <div class="">
            <input type="radio" class="radio-custom-a" id="a" name="jawaban" value="a" {{ $cekjawaban->jawaban == 'a' ? 'checked="checked"' : '' }}>
            <label class="radio-custom-label-a" for="a" >
              @if($soal->type == 0)
                 {{$soal->pil_a}}
              @elseif($soal->type == 1)
                 {{$soal->pil_a}}
              @elseif($soal->type == 2)
                  @if($soal->jenis == 0)
                      {{$soal->pil_a}}
                  @elseif($soal->jenis == 1)
                    <audio controls>
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_a)}}" type="audio/mpeg">
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_a)}}" type="audio/ogg">
                    </audio>
                  @elseif($soal->jenis == 2)
                    <video controls style="width: 100%; height: 150px;">
                       <source src="{{asset('/upload/jawaban/'.$soal->pil_a)}}" type="video/mp4">
                      <source src="{{asset('/upload/jawaban/'.$soal->pil_a)}}" type="video/ogg">
                    </video>
                  @elseif($soal->jenis == 3)
                    <img src="{{asset('/upload/jawaban/'.$soal->pil_a)}}" style="max-height: 80px" id="imgsoala">
                  @endif
              @endif
            </label>
          </div>
          <div class="">
            <input type="radio" class="radio-custom-b" id="b" name="jawaban" value="b" {{ $cekjawaban->jawaban == 'b' ? 'checked="checked"' : '' }}>
            <label class="radio-custom-label-b" for="b">
                @if($soal->type == 0)
                 {{$soal->pil_b}}
              @elseif($soal->type == 1)
                 {{$soal->pil_b}}
              @elseif($soal->type == 2)
                  @if($soal->jenis == 0)
                      {{$soal->pil_b}}
                  @elseif($soal->jenis == 1)
                    <audio controls>
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_b)}}" type="audio/mpeg">
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_b)}}" type="audio/ogg">
                    </audio>
                  @elseif($soal->jenis == 2)
                    <video controls style="width: 100%; height: 150px;">
                       <source src="{{asset('/upload/jawaban/'.$soal->pil_b)}}" type="video/mp4">
                      <source src="{{asset('/upload/jawaban/'.$soal->pil_b)}}" type="video/ogg">
                    </video>
                  @elseif($soal->jenis == 3)
                    <img src="{{asset('/upload/jawaban/'.$soal->pil_b)}}" style="max-height: 80px" id="imgsoalb">
                  @endif
              @endif 
            </label>
          </div> 
          <div class="">
            <input type="radio" class="radio-custom-c" id="c" name="jawaban" value="c" {{ $cekjawaban->jawaban == 'c' ? 'checked="checked"' : '' }} >
            <label class="radio-custom-label-c" for="c">
                @if($soal->type == 0)
                 {{$soal->pil_c}}
              @elseif($soal->type == 1)
                 {{$soal->pil_c}}
              @elseif($soal->type == 2)
                  @if($soal->jenis == 0)
                      {{$soal->pil_c}}
                  @elseif($soal->jenis == 1)
                    <audio controls>
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_c)}}" type="audio/mpeg">
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_c)}}" type="audio/ogg">
                    </audio>
                  @elseif($soal->jenis == 2)
                    <video controls style="width: 100%; height: 150px;">
                       <source src="{{asset('/upload/jawaban/'.$soal->pil_c)}}" type="video/mp4">
                      <source src="{{asset('/upload/jawaban/'.$soal->pil_c)}}" type="video/ogg">
                    </video>
                  @elseif($soal->jenis == 3)
                    <img src="{{asset('/upload/jawaban/'.$soal->pil_c)}}" style="max-height: 80px" id="imgsoalc">
                  @endif
              @endif  
            </label>
          </div>
          <div class="">
            <input type="radio" class="radio-custom-d" id="d" name="jawaban" value="d" {{ $cekjawaban->jawaban == 'd' ? 'checked="checked"' : '' }} >
            <label class="radio-custom-label-d" for="d">
              @if($soal->type == 0)
                 {{$soal->pil_d}}
              @elseif($soal->type == 1)
                 {{$soal->pil_d}}
              @elseif($soal->type == 2)
                  @if($soal->jenis == 0)
                      {{$soal->pil_d}}
                  @elseif($soal->jenis == 1)
                    <audio controls>
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_d)}}" type="audio/mpeg">
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_d)}}" type="audio/ogg">
                    </audio>
                  @elseif($soal->jenis == 2)
                    <video controls style="width: 100%; height: 150px;">
                       <source src="{{asset('/upload/jawaban/'.$soal->pil_d)}}" type="video/mp4">
                      <source src="{{asset('/upload/jawaban/'.$soal->pil_d)}}" type="video/ogg">
                    </video>
                  @elseif($soal->jenis == 3)
                    <img src="{{asset('/upload/jawaban/'.$soal->pil_d)}}" style="max-height: 80px" id="imgsoald">
                  @endif
              @endif    
            </label>
          </div> 
          <div class="">
            <input type="radio" class="radio-custom-e" id="e" name="jawaban" value="e" {{ $cekjawaban->jawaban == 'e' ? 'checked="checked"' : '' }}>
            <label class="radio-custom-label-e"  for="e">
              @if($soal->type == 0)
                 {{$soal->pil_e}}
              @elseif($soal->type == 1)
                 {{$soal->pil_e}}
              @elseif($soal->type == 2)
                  @if($soal->jenis == 0)
                      {{$soal->pil_e}}
                  @elseif($soal->jenis == 1)
                    <audio controls>
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_e)}}" type="audio/mpeg">
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_e)}}" type="audio/ogg">
                    </audio>
                  @elseif($soal->jenis == 2)
                    <video controls style="width: 100%; height: 150px;">
                       <source src="{{asset('/upload/jawaban/'.$soal->pil_e)}}" type="video/mp4">
                      <source src="{{asset('/upload/jawaban/'.$soal->pil_e)}}" type="video/ogg">
                    </video>
                  @elseif($soal->jenis == 3)
                    <img src="{{asset('/upload/jawaban/'.$soal->pil_e)}}" style="max-height: 80px" id="imgsoale">
                  @endif
              @endif    
            </label>
          </div>
          @else
          <div class="">
            <input type="radio" class="radio-custom-a" id="a" name="jawaban" value="a" >
            <label class="radio-custom-label-a" for="a" >
              @if($soal->type == 0)
                 {{$soal->pil_a}}
              @elseif($soal->type == 1)
                 {{$soal->pil_a}}
              @elseif($soal->type == 2)
                  @if($soal->jenis == 0)
                      {{$soal->pil_a}}
                  @elseif($soal->jenis == 1)
                    <audio controls>
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_a)}}" type="audio/mpeg">
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_a)}}" type="audio/ogg">
                    </audio>
                  @elseif($soal->jenis == 2)
                    <video controls style="width: 100%; height: 150px;">
                       <source src="{{asset('/upload/jawaban/'.$soal->pil_a)}}" type="video/mp4">
                      <source src="{{asset('/upload/jawaban/'.$soal->pil_a)}}" type="video/ogg">
                    </video>
                  @elseif($soal->jenis == 3)
                    <img src="{{asset('/upload/jawaban/'.$soal->pil_a)}}" style="max-height: 80px" id="imgsoala">
                  @endif
              @endif
            </label>
          </div>
          <div class="">
            <input type="radio" class="radio-custom-b" id="b" name="jawaban" value="b" >
            <label class="radio-custom-label-b" for="b">
              @if($soal->type == 0)
                 {{$soal->pil_b}}
              @elseif($soal->type == 1)
                 {{$soal->pil_b}}
              @elseif($soal->type == 2)
                  @if($soal->jenis == 0)
                      {{$soal->pil_b}}
                  @elseif($soal->jenis == 1)
                    <audio controls>
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_b)}}" type="audio/mpeg">
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_b)}}" type="audio/ogg">
                    </audio>
                  @elseif($soal->jenis == 2)
                    <video controls style="width: 100%; height: 150px;">
                       <source src="{{asset('/upload/jawaban/'.$soal->pil_b)}}" type="video/mp4">
                      <source src="{{asset('/upload/jawaban/'.$soal->pil_b)}}" type="video/ogg">
                    </video>
                  @elseif($soal->jenis == 3)
                    <img src="{{asset('/upload/jawaban/'.$soal->pil_b)}}" style="max-height: 80px" id="imgsoalb">
                  @endif
              @endif    
            </label>
          </div> 
          <div class="">
            <input type="radio" class="radio-custom-c" id="c" name="jawaban" value="c" >
            <label class="radio-custom-label-c" for="c">
              @if($soal->type == 0)
                 {{$soal->pil_c}}
              @elseif($soal->type == 1)
                 {{$soal->pil_c}}
              @elseif($soal->type == 2)
                  @if($soal->jenis == 0)
                      {{$soal->pil_c}}
                  @elseif($soal->jenis == 1)
                    <audio controls>
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_c)}}" type="audio/mpeg">
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_c)}}" type="audio/ogg">
                    </audio>
                  @elseif($soal->jenis == 2)
                    <video controls style="width: 100%; height: 150px;">
                       <source src="{{asset('/upload/jawaban/'.$soal->pil_c)}}" type="video/mp4">
                      <source src="{{asset('/upload/jawaban/'.$soal->pil_c)}}" type="video/ogg">
                    </video>
                  @elseif($soal->jenis == 3)
                    <img src="{{asset('/upload/jawaban/'.$soal->pil_c)}}" style="max-height: 80px" id="imgsoalc">
                  @endif
              @endif
            </label>
          </div>
          <div class="">
            <input type="radio" class="radio-custom-d" id="d" name="jawaban" value="d" >
            <label class="radio-custom-label-d" for="d">
              @if($soal->type == 0)
                 {{$soal->pil_d}}
              @elseif($soal->type == 1)
                 {{$soal->pil_d}}
              @elseif($soal->type == 2)
                  @if($soal->jenis == 0)
                      {{$soal->pil_d}}
                  @elseif($soal->jenis == 1)
                    <audio controls>
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_d)}}" type="audio/mpeg">
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_d)}}" type="audio/ogg">
                    </audio>
                  @elseif($soal->jenis == 2)
                    <video controls style="width: 100%; height: 150px;">
                       <source src="{{asset('/upload/jawaban/'.$soal->pil_d)}}" type="video/mp4">
                      <source src="{{asset('/upload/jawaban/'.$soal->pil_d)}}" type="video/ogg">
                    </video>
                  @elseif($soal->jenis == 3)
                    <img src="{{asset('/upload/jawaban/'.$soal->pil_d)}}" style="max-height: 80px" id="imgsoald">
                  @endif
              @endif    
            </label>
          </div> 
          <div class="">
            <input type="radio" class="radio-custom-e" id="e" name="jawaban" value="e" >
            <label class="radio-custom-label-e"  for="e">
                @if($soal->type == 0)
                 {{$soal->pil_e}}
              @elseif($soal->type == 1)
                 {{$soal->pil_e}}
              @elseif($soal->type == 2)
                  @if($soal->jenis == 0)
                      {{$soal->pil_e}}
                  @elseif($soal->jenis == 1)
                    <audio controls>
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_e)}}" type="audio/mpeg">
                        <source src="{{asset('/upload/jawaban/'.$soal->pil_e)}}" type="audio/ogg">
                    </audio>
                  @elseif($soal->jenis == 2)
                    <video controls style="width: 100%; height: 150px;">
                       <source src="{{asset('/upload/jawaban/'.$soal->pil_e)}}" type="video/mp4">
                      <source src="{{asset('/upload/jawaban/'.$soal->pil_e)}}" type="video/ogg">
                    </video>
                  @elseif($soal->jenis == 3)
                    <img src="{{asset('/upload/jawaban/'.$soal->pil_e)}}" style="max-height: 80px" id="imgsoale">
                  @endif
              @endif    
            </label>
          </div>
          @endif
          </div>
              </p>
      </div>
            </div>
        </div>
    </div>
</div>
</div>
<br><br><br>

<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-bottom">

  <div class="col-md-2">
    @if($soal->no_soal != 1)
    <button class="btn w3-gray" name="kembali" value="kembali" type="submit"><i class="fa fa-arrow-left"> SOAL SEBELUMNYA</i></button>
    @endif
  </div>
  <div class="col-md-8">
    <div  style=" width: 150px; margin:auto; background:yellow;border-radius: 5px;font-size: 14px;padding: 2px;">
      @if(@count($cekjawaban->jawaban) > 0)
    <input type="checkbox"  id="ragu" style="margin-top: 10px;margin-left: 15px;" name="ragu" {{ $cekjawaban->kondisi == 'ragu-ragu' ? 'checked="checked"' : '' }}>
    @else
    <input type="checkbox"  id="ragu" name="ragu" style="margin-top: 10px;margin-left: 15px;">
    @endif
    <label  for="ragu">RAGU - RAGU</label>
  </div>
  </div>
   <div class="col-md-2">
    @if($lastno->no_soal == $soal->no_soal)
    <input  type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary w3-right" value="Selesai">
    @else
    <button class="btn btn-primary">SOAL BERIKUTNYA <i class="fa fa-arrow-right"></i></button>
    @endif
  </div>
</nav>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Test</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3">
            <i class="fa fa-warning" style="margin-top:20px;margin-left: 15px;font-size:52px;"></i>
          </div>
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-12">
                Apakah anda yakin ingin mengakhiri ujian ini? <br>
                Setelah ke mata uji berikutnya anda tidak bisa kembali me mata uji sebelumnya.
              </div>
              <div class="col-md-12" style="margin-top: 12px;">
                <div class="row">

                  <div class="col-md-2 ">
                  <input type="checkbox"  id="customCheck" name="setuju" onchange="document.getElementById('sendNewSms').disabled = !this.checked;" style="margin-top:20px;margin-left: 15px;">
                  </div>
                  <div class="col-md-10">
                    <center>
                      Centang, Kemudian tekan tombol selesai. <br>
                    anda tidak akan bisa kembali ke soal jika sudah menekan tombol selesai
                    </center>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer1">
        <div class="row">
          <div class="col-md-6">
             <button type="submit" id="sendNewSms" name="selesai" value="selesai" class="btn btn-success btn-block" disabled>Selesai</button>
        </div>
          <div class="col-md-6">
            <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
        </div>
        </div>
      </div>

    </div>
  </div>
</div>
</form>

<form id="waktu-habis" action="{{ url('/selesai/ujian/'.base64_encode($id_ujian).'/siswa/'.base64_encode($id_siswa).'/kelas/'.base64_encode($id_kelas)) }}" method="POST" style="display: none;">
    @csrf
</form>
<div class="icon-bar">
  <span href="#" class="facebook " onclick="openNav()"><i class="fa fa-angle-double-left "></i> DAFTAR <br> SOAL</span>
</div>
@include('client.pages.include.script')
@endsection