@extends('auth.template')
@section('mainadmin')
<div class="">
  <div class="row">
    
    <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Home Soal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Mata Pelajaran</th>
                  <th>Jurusan</th>
                  <th>Paket</th>
                  <th>Ujian</th>
                  <th>Waktu</th>
                  <th>Jumlah Soal</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @php($no= 1)
                @foreach($dataujian as $datu)
                @php($matpel = DB::Table('mata_pelajaran_models')->where('id_mata_pelajaran', $datu->id_mata_pelajaran)->first())
                <tr>
                  <td>{{$no++}}</td>
                  <td>
                    {{$matpel->mt_pelajaran}}
                  </td>
                  <td>{{ $matpel->jurusan }}</td>
                  <td><b>{{$datu->paket_ujian}}</b></td>
                  <td>{{date('d F Y', strtotime($datu->tgl_ujian))}}</td>

                  <td>{{$datu->alokasi_waktu}} Menit</td>
                  <td>
                    @php($cekjumlah = DB::Table('master_soals')->where('id_ujian', $datu->id_ujian)->get())
                    <b>{{@count($cekjumlah)}}</b>
                  </td>
                 
                  <td>
                      <a href="{{url('/home/'.base64_encode($datu->id_ujian).'/ujian/soal')}}" class="btn btn-danger">Soal</a>
                      <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modal-ujian{{$datu->id_ujian}}">Edit</a>
                      <a data-toggle="modal" data-target="#modal-delete-ujian{{$datu->id_ujian}}" type="submit" class="btn btn-warning">delete</a>
                  </td>
                </tr>
                   <div class="modal fade" id="modal-delete-ujian{{$datu->id_ujian}}" style="display: none;">
                        <div class="modal-dialog ">
                          <div class="modal-content">
                            <form action="{{url('/home/'.$datu->id_ujian.'/ujian')}}" method="post">

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
                              <button type="submit" class="btn btn-warning">Hapus</button>
                            </div>
                          </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>

                      <div class="modal fade" id="modal-ujian{{$datu->id_ujian}}" style="display: none;">
                        <div class="modal-dialog ">
                          <div class="modal-content">
                            <form action="{{url('/home/'.$datu->id_ujian.'/ujian')}}" method="post">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Edit Data </h4>
                            </div>
                            <div class="modal-body">
                                @csrf @method('put')
                                    <label>Mata Ujian</label>
                                    <select name="id_mata_pelajaran" class="form-control">
                                       @foreach($matapelajaran as $mat)
                                            <option value="{{$mat->id_mata_pelajaran}}" @if($mat->id_mata_pelajaran == $datu->id_mata_pelajaran) selected= 'selected' @endif>{{$mat->mt_pelajaran}}</option>
                                            @endforeach
                                    </select>
                                    
                                    <label>Tanggal Ujian</label>
                                    <input type="date" name="tgl_ujian" class="form-control" value="{{$datu->tgl_ujian}}">
                                    <label>Waktu Ujian</label>
                                    <input type="text" name="waktu_ujian" class="form-control" placeholder="Enter Jam Ujian Format H:m:s(07:30:00)" value="{{$datu->waktu_ujian}}">
                                    <label>Paket</label>
                                    <input type="text" name="paket_ujian" class="form-control" placeholder="Enter Paket Format (1, 2, 3) atau (A, B, C)" value="{{$datu->paket_ujian}}">
                                    <label>Alokasi Waktu</label>
                                    <select name="alokasi_waktu" class="form-control">
                                      <option value="40"  @if(40 == $datu->alokasi_waktu) selected= 'selected' @endif>40 Menit</option>
                                      <option value="60" @if(60 == $datu->alokasi_waktu) selected= 'selected' @endif>60 Menit</option>
                                      <option value="90" @if(90 == $datu->alokasi_waktu) selected= 'selected' @endif>90 Menit</option>
                                      <option value="120" @if(120 == $datu->alokasi_waktu) selected= 'selected' @endif>120 Menit</option>
                                      <option value="150" @if(150 == $datu->alokasi_waktu) selected= 'selected' @endif>150 Menit</option>
                                      <option value="180" @if(180 == $datu->alokasi_waktu) selected= 'selected' @endif>180 Menit</option>
                                    </select><br>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Update</button>
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
            <!-- /.box-body -->
          </div>
    </div>
  </div>
</div>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <label for="matpel">Mata Pelajaran</label>
        <select required name="matpel" id="matpel" class="form-control">
          <option value="">--Pilih Mata Pelajaran--</option>
          @foreach($matapelajaran as $matpel) 
          <option value="{{$matpel->id_mata_pelajaran}}">{{$matpel->mt_pelajaran}}</option>
          @endforeach
        </select>
        <label for="paket">Paket</label>
        <input type="text" name="paker" id="paker" class="form-control" placeholder="Enter Peket Format A, B, C, D, E ">
        <br><br>
        <table id="example3" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>Paket</th>
            <th>Jumlah soal</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>MATEMATIKA</td>
              <td>A</td>
              <td>7</td>
              <td>
                <a href="#" class="btn btn-primary">+ soal</a>
                <a href="#" class="btn btn-info">Edit</a>
                <a href="#" class="btn btn-danger">Delete</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
@endsection