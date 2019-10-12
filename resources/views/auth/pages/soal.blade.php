@extends('auth.template')
@section('mainadmin')
<div class="">
	<div class="row">
		
		<div class="col-md-12">
			<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Soal Ujian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-text">
                <i class="fa fa-plus"></i> Soal Text
              </button>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-media">
                <i class="fa fa-plus"></i> Soal Media
              </button>
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-full-media">
                <i class="fa fa-plus"></i> Soal Full Media
              </button>
            <br><br>
             <div style="overflow-x:scroll;">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No Soal</th>
                  <th>Soal</th>
                  <th>A</th>
                  <th>B</th>
                  <th>C</th>
                  <th>D</th>
                  <th>E</th>
                  <th>Jawaban</th>
                  <th>Skor</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $dat)
                <tr>
                  <td>{{$dat->no_soal}}</td>
                  <td>
                    @if($dat->jenis == 0)
                      {{str_limit($dat->soal, $limit = 100, $end = '...')}}
                    @elseif($dat->jenis == 1)
                      <audio controls>
                          <source src="/upload/soal/audio/{{$dat->soal}}" type="audio/mpeg">
                          <source src="/upload/soal/audio/{{$dat->soal}}" type="audio/ogg">
                      </audio>
                    @elseif($dat->jenis == 2)
                      <video controls style="width: 100%; height: 150px;">
                         <source src="/upload/soal/video/{{$dat->soal}}" type="video/mp4">
                        <source src="/upload/soal/video/{{$dat->soal}}" type="video/ogg">
                      </video>
                    @elseif($dat->jenis == 3)
                      <img src="/upload/soal/img/{{$dat->soal}}" style="width: 100%; height: 150px">
                    @endif
                  </td>
                  <td>
                    @if($dat->jenis == 0)
                      {{str_limit($dat->pil_a, $limit = 100, $end = '...')}}
                    @else
                      @if($dat->type == 1)
                      {{str_limit($dat->pil_a, $limit = 100, $end = '...')}}
                      @else
                         @if($dat->jenis == 0)
                            {{$dat->pil_a}}
                        @elseif($dat->jenis == 1)
                          <audio controls>
                              <source src="/upload/jawaban/{{$dat->pil_a}}" type="audio/mpeg">
                              <source src="/upload/jawaban/{{$dat->pil_a}}" type="audio/ogg">
                          </audio>
                        @elseif($dat->jenis == 2)
                          <video controls style="width: 100%; height: 150px;">
                             <source src="/upload/jawaban/{{$dat->pil_a}}" type="video/mp4">
                            <source src="/upload/jawaban/{{$dat->pil_a}}" type="video/ogg">
                          </video>
                        @elseif($dat->jenis == 3)
                          <img src="/upload/jawaban/{{$dat->pil_a}}" style="width: 100%; height: 150px">
                        @endif
                      @endif
                    @endif
                  </td>
                  <td>
                     @if($dat->jenis == 0)
                      {{str_limit($dat->pil_b, $limit = 100, $end = '...')}}
                    @else
                       @if($dat->type == 1)
                      {{str_limit($dat->pil_b, $limit = 100, $end = '...')}}
                      @else
                        @if($dat->jenis == 0)
                            {{$dat->pil_b}}
                        @elseif($dat->jenis == 1)
                          <audio controls>
                              <source src="/upload/jawaban/{{$dat->pil_b}}" type="audio/mpeg">
                              <source src="/upload/jawaban/{{$dat->pil_b}}" type="audio/ogg">
                          </audio>
                        @elseif($dat->jenis == 2)
                          <video controls style="width: 100%; height: 150px;">
                             <source src="/upload/jawaban/{{$dat->pil_b}}" type="video/mp4">
                            <source src="/upload/jawaban/{{$dat->pil_b}}" type="video/ogg">
                          </video>
                        @elseif($dat->jenis == 3)
                          <img src="/upload/jawaban/{{$dat->pil_b}}" style="width: 100%; height: 150px">
                        @endif
                      @endif
                    @endif
                  </td>
                  <td>
                     @if($dat->jenis == 0)
                      {{str_limit($dat->pil_c, $limit = 100, $end = '...')}}
                    @else
                       @if($dat->type == 1)
                      {{str_limit($dat->pil_c, $limit = 100, $end = '...')}}
                      @else
                        @if($dat->jenis == 0)
                            {{$dat->pil_c}}
                        @elseif($dat->jenis == 1)
                          <audio controls>
                              <source src="/upload/jawaban/{{$dat->pil_c}}" type="audio/mpeg">
                              <source src="/upload/jawaban/{{$dat->pil_c}}" type="audio/ogg">
                          </audio>
                        @elseif($dat->jenis == 2)
                          <video controls style="width: 100%; height: 150px;">
                             <source src="/upload/jawaban/{{$dat->pil_c}}" type="video/mp4">
                            <source src="/upload/jawaban/{{$dat->pil_c}}" type="video/ogg">
                          </video>
                        @elseif($dat->jenis == 3)
                          <img src="/upload/jawaban/{{$dat->pil_c}}" style="width: 100%; height: 150px">
                        @endif
                      @endif
                    @endif
                  </td>
                  <td>
                     @if($dat->jenis == 0)
                      {{str_limit($dat->pil_d, $limit = 100, $end = '...')}}
                    @else
                      @if($dat->type == 1)
                      {{str_limit($dat->pil_d, $limit = 100, $end = '...')}}
                      @else
                        @if($dat->jenis == 0)
                            {{$dat->pil_d}}
                        @elseif($dat->jenis == 1)
                          <audio controls>
                              <source src="/upload/jawaban/{{$dat->pil_d}}" type="audio/mpeg">
                              <source src="/upload/jawaban/{{$dat->pil_d}}" type="audio/ogg">
                          </audio>
                        @elseif($dat->jenis == 2)
                          <video controls style="width: 100%; height: 150px;">
                             <source src="/upload/jawaban/{{$dat->pil_d}}" type="video/mp4">
                            <source src="/upload/jawaban/{{$dat->pil_d}}" type="video/ogg">
                          </video>
                        @elseif($dat->jenis == 3)
                          <img src="/upload/jawaban/{{$dat->pil_d}}" style="width: 100%; height: 150px">
                        @endif
                      @endif
                    @endif
                  </td>
                  <td>
                     @if($dat->jenis == 0)
                      {{str_limit($dat->pil_e, $limit = 100, $end = '...')}}
                    @else
                       @if($dat->type == 1)
                      {{str_limit($dat->pil_e, $limit = 100, $end = '...')}}
                      @else
                        @if($dat->jenis == 0)
                            {{$dat->pil_e}}
                        @elseif($dat->jenis == 1)
                          <audio controls>
                              <source src="/upload/jawaban/{{$dat->pil_e}}" type="audio/mpeg">
                              <source src="/upload/jawaban/{{$dat->pil_e}}" type="audio/ogg">
                          </audio>
                        @elseif($dat->jenis == 2)
                          <video controls style="width: 100%; height: 150px;">
                             <source src="/upload/jawaban/{{$dat->pil_e}}" type="video/mp4">
                            <source src="/upload/jawaban/{{$dat->pil_e}}" type="video/ogg">
                          </video>
                        @elseif($dat->jenis == 3)
                          <img src="/upload/jawaban/{{$dat->pil_e}}" style="width: 100%; height: 150px">
                        @endif
                      @endif
                    @endif
                  </td>
                  <td><span class="btn btn-primary">{{$dat->jawaban}}</span></td>
                  <td><span class="btn btn-danger">{{$dat->skor}}</span></td>
                  <td>
                      <button data-toggle="modal" data-target="#modal-delete-soal{{$dat->id_soal}}" type="button" class="btn btn-danger">delete</button>
                  </td>
                </tr>
                 <div class="modal fade" id="modal-delete-soal{{$dat->id_soal}}" style="display: none;">
                        <div class="modal-dialog ">
                          <div class="modal-content">
                            <form action="{{url('/home/'.$dat->id_soal.'/soal')}}" method="post">

                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Hapus Data </h4>
                            </div>
                            <div class="modal-body">
                                @csrf @method('delete')
                                <h3>Apakah Anda Ingin Menghapus data ini!</h3>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                          </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                @endforeach
                </tfoot>
              </table>
             </div>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-text" style="display: none;">
  <div class="modal-dialog modal-lg ">
<ul class="nav nav-tabs" style="background: #fff">
  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
  <li><a data-toggle="tab" href="#menu1">Import</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
       <form action="{{url('/home/'.$id1.'/soal')}}" method="post">
      @csrf
      <input type="hidden" name="type" value="0">
      <input type="hidden" name="jenis" value="0">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Input Soal Text</h4>
      </div>
      <div class="modal-body">
          <div class="col-md-12">
            <label>No Soal</label>
            <input type="number" name="nosoal" class="form-control" required value="{{$ceknosoal }}">
          </div>
          <div class="col-md-12">
            <label>Soal</label>
             <textarea class="ckeditor" id="ckeditor" placeholder="Enter Soal" required name="soal"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          </div>
            <div class="col-md-12">
            <label>Pilihan A</label>
            <textarea class="form-control" name="pil_a" placeholder="Enter Pilihan A" required></textarea>
          </div>
          <div class="col-md-12">
            <label>Pilihan B</label>
            <textarea class="form-control" name="pil_b" placeholder="Enter Pilihan B" required></textarea>
          </div>
          <div class="col-md-12">
            <label>Pilihan C</label>
            <textarea class="form-control" name="pil_c" placeholder="Enter Pilihan C" required></textarea>
          </div>
          <div class="col-md-12">
            <label>Pilihan D</label>
            <textarea class="form-control" name="pil_d" placeholder="Enter Pilihan D" required></textarea>
          </div>
          <div class="col-md-12">
            <label>Pilihan E</label>
            <textarea class="form-control" name="pil_e" placeholder="Enter Pilihan E" required></textarea>
          </div>
          <div class="col-md-12">
            <label>Skor </label>
            @if($cekskor->nilai >= 100)
            <input type="text" class="form-control" name="skor" disabled placeholder="Skor telah 100">
            @else
            <input type="text" class="form-control" name="skor" placeholder=" skor yang tersisa adalah {{ 100 - $cekskor->nilai }}">
            @endif
          </div>
          <div class="col-md-12">
            <label>Semester</label>
              <select  class="form-control" name="semester" required>
                <option value="">---pilih semester pelajaran---</option>
                @foreach($semester as $smt)
                <option value="{{$smt->id_semester}}">{{$smt->judul_semester}}</option>
                @endforeach
              </select>
            </div>
          <div class="col-md-12">
            <label>Tingkat</label>
              <select  class="form-control" name="tingkat" required>
                <option value="">--pilih--</option>
                <option value="mudah">Mudah</option>
                <option value="sedang">Sedang</option>
                <option value="sulit">Sulit</option>
              </select>
            </div>
          <div class="col-md-12">
            <label>Jawaban</label>
              <select  class="form-control" name="jawaban" required>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
                <option value="e">E</option>
              </select><br><br><br>
            </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        @if($cekskor->nilai >= 100)
        <button type="submit" class="btn btn-primary" disabled>Save changes</button>
        @else
        <button type="submit" class="btn btn-primary">Save changes</button>
        @endif
      </div>
    </div>
    </form>
  </div>
  <div id="menu1" class="tab-pane fade">
        <form action="{{url('/home/import/'.$id1.'/soal')}}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="type" value="0">
      <input type="hidden" name="jenis" value="0">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Import Soal Text</h4>
      </div>
      <div class="modal-body">
        <label>Import data</label>
        <input type="file" name="file" class="form-control">
        <span style="color:red"><i>* Import data menggunakan Format Exel(CSV)</i></span><br>
        Download Example Terbaru <a href="{{ url('/home/export/'.$id1.'/soal') }}">disini <i class="fa  fa-download"></i></a><br>
        <p>Untuk Mendapatkan Id Semester bisa di lihat di kolom di bawah ini</p>
        <table class="table table-bordered table-striped">
          <tr>
            <th>Id Semester</th>
            <th>Semester</th>
          </tr>
          @foreach($semester as $smt)
          <tr>
            <td>{{ $smt->id_semester }}</td>
            <td>{{ $smt->judul_semester }}</td>
          </tr>
          @endforeach
        </table>
        <br>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        @if($cekskor->nilai >= 100)
        <button type="submit" class="btn btn-primary" disabled>Save changes</button>
        @else
        <button type="submit" class="btn btn-primary">Save changes</button>
        @endif
      </div>
    </div>
    </form>
  </div>
  
</div>

    <!-- /.modal-content -->
  
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-media" style="display: none;">
  <div class="modal-dialog modal-lg ">
    <form action="{{url('/home/'.$id1.'/soal')}}" method="post"  enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="type" value="1">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Input Soal Media</h4>
      </div>
      <div class="modal-body">
          <div class="col-md-12">
            <label>No Soal</label>
            <input type="number" name="nosoal" class="form-control" required value="{{$ceknosoal }}">
          </div>
          <div class="col-md-12">
            <label>Jenis Soal :</label>
            <select name="jenis" class="form-control" required>
              <option value="">---pilih jenis soal---</option>
              <option value="1">Audio</option>
              <option value="2">Video</option>
              <option value="3">Image</option>
            </select>
          </div>
          <div class="col-md-12">
            <label>Soal</label>
            <input type="file" name="soal" class="form-control" required>
          </div>
          <div class="col-md-12">
            <label>Keterangan</label>
            <textarea class="ckeditor" id="ckeditor" placeholder="Enter Keterangan" required name="keterangan"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          </div>
          <div class="col-md-12">
            <label>Pilihan A</label>
            <textarea class="form-control" name="pil_a" placeholder="Enter Pilihan A" required></textarea>
          </div>
          <div class="col-md-12">
            <label>Pilihan B</label>
            <textarea class="form-control" name="pil_b" placeholder="Enter Pilihan B" required></textarea>
          </div>
          <div class="col-md-12">
            <label>Pilihan C</label>
            <textarea class="form-control" name="pil_c" placeholder="Enter Pilihan C" required></textarea>
          </div>
          <div class="col-md-12">
            <label>Pilihan D</label>
            <textarea class="form-control" name="pil_d" placeholder="Enter Pilihan D" required></textarea>
          </div>
          <div class="col-md-12">
            <label>Pilihan E</label>
            <textarea class="form-control" name="pil_e" placeholder="Enter Pilihan E"></textarea>
          </div>
          <div class="col-md-12">
            <label>Skor </label>
            @if($cekskor->nilai >= 100)
            <input type="text" class="form-control" name="skor" disabled placeholder="Skor telah 100">
            @else
            <input type="text" class="form-control" name="skor" placeholder=" skor yang tersisa adalah {{ 100 - $cekskor->nilai }}">
            @endif
          </div>
          <div class="col-md-12">
            <label>Semester</label>
              <select  class="form-control" name="semester" required>
                <option value="">---pilih semester pelajaran---</option>
                @foreach($semester as $smt)
                <option value="{{$smt->id_semester}}">{{$smt->judul_semester}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-12">
            <label>Tingkat</label>
              <select  class="form-control" name="tingkat" required>
                <option value="">--pilih--</option>
                <option value="mudah">Mudah</option>
                <option value="sedang">Sedang</option>
                <option value="sulit">Sulit</option>
              </select>
            </div>
          <div class="col-md-12">
            <label>Jawaban</label>
              <select  class="form-control" name="jawaban" required>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
                <option value="e">E</option>
              </select><br><br><br>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        @if($cekskor->nilai >= 100)
        <button type="submit" class="btn btn-primary" disabled>Save changes</button>
        @else
        <button type="submit" class="btn btn-primary">Save changes</button>
        @endif
      </div>
    </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-full-media" style="display: none;">
  <div class="modal-dialog modal-lg ">
    <form action="{{url('/home/'.$id1.'/soal')}}" method="post"  enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="type" value="2">
    <div class="modal-content">
      <div class="modal-header ">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Input Soal Full Media</h4>
      </div>
      <div class="modal-body">
          <div class="col-md-12">
            <label>No Soal</label>
            <input type="number" name="nosoal" class="form-control" required value="{{$ceknosoal }}">
          </div>
           <div class="col-md-12">
            <label>Jenis Soal :</label>
            <select name="jenis" class="form-control" required>
              <option value="">---pilih jenis soal---</option>
              <option value="1">Audio</option>
              <option value="2">Video</option>
              <option value="3">Image</option>
            </select>
          </div>
          <div class="col-md-12">
            <label>Soal</label>
            <input type="file" name="soal" class="form-control" required>
          </div>
          <div class="col-md-12">
            <label>Keterangan</label>
             <textarea class="ckeditor" id="ckeditor" placeholder="Enter Keterangan" required name="keterangan"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          </div>
         <div class="col-md-12">
            <label>Pilihan A</label>
            <input type="file" name="pil_a" class="form-control" required>
          </div>
          <div class="col-md-12">
            <label>Pilihan B</label>
            <input type="file" name="pil_b" class="form-control" required>
          </div>
          <div class="col-md-12">
            <label>Pilihan C</label>
            <input type="file" name="pil_c" class="form-control" required>
          </div>
          <div class="col-md-12">
            <label>Pilihan D</label>
            <input type="file" name="pil_d" class="form-control" required>
          </div>
          <div class="col-md-12">
            <label>Pilihan E</label>
            <input type="file" name="pil_e" class="form-control" required>
          </div>
          <div class="col-md-12">
            <label>Skor </label>
            @if($cekskor->nilai >= 100)
            <input type="text" class="form-control" name="skor" disabled placeholder="Skor telah 100">
            @else
            <input type="text" class="form-control" name="skor" placeholder=" skor yang tersisa adalah {{ 100 - $cekskor->nilai }}">
            @endif
          </div>
          <div class="col-md-12">
            <label>Semester</label>
              <select  class="form-control" name="semester" required>
                <option value="">---pilih semester pelajaran---</option>
                @foreach($semester as $smt)
                <option value="{{$smt->id_semester}}">{{$smt->judul_semester}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-12">
            <label>Tingkat</label>
              <select  class="form-control" name="tingkat" required>
                <option value="">--pilih--</option>
                <option value="mudah">Mudah</option>
                <option value="sedang">Sedang</option>
                <option value="sulit">Sulit</option>
              </select>
            </div>
          <div class="col-md-12">
            <label>Jawaban</label>
              <select  class="form-control" name="jawaban" required>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
                <option value="e">E</option>
              </select><br><br><br>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        @if($cekskor->nilai >= 100)
        <button type="submit" class="btn btn-primary" disabled>Save changes</button>
        @else
        <button type="submit" class="btn btn-primary">Save changes</button>
        @endif
      </div>
    </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-importdatatsiswa" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Import Soal/h4>
      </div>
      <div class="modal-body">
       <div class="col-md-12">
       		<label>Inport data</label>
    		<input type="file" name="file" class="form-control">
    		<span style="color:red"><i>* Import data menggunakan Format Exel(CSV)</i></span><br>
    		panduanya click <a href="#">disini <i class="fa  fa-external-link"></i></a><br><br>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection