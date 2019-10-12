@extends('auth.template')
@section('mainadmin')
<div class="">
	<div class="row">
		
		<div class="col-md-12">
			<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">View Siswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                <i class="fa fa-plus"></i> Siswa
              </button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-importdatatsiswa">
                <i class="fa fa-plus"></i> Import siswa
              </button><br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Periode</th>
                  <th>No Ujian</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Tempat/Tanggal Lahir</th>
                  <th>Akun</th>
                  <th>Kelas</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @php($no=1)
                @foreach($data as $dat)
                <tr>
                  <td>{{$no++}}</td>
                  <td>
                    @php($per = DB::Table('periode_models')->where('id_periode', $dat->id_periode)->first())
                    {{$per->judul_periode}}
                  </td>
                  <td>{{$dat->noujian}}</td>
                  <td>{{$dat->nis}}</td>
                  <td>{{$dat->namadepan. ' ' . $dat->namabelakang}}</td>
                  <td>{{$dat->tmp_lahir. ' / ' .date('d-F-Y', strtotime($dat->tgl_lahir))}}</td>
                  <td>
                    @php($ca = DB::table('users')->where('id_siswa', $dat->id_siswa)->first())
                    @if(@count($ca) > 0)
                    <span><i class="fa fa-check"></i>Akun Siap!</span>
                    @else
                     <form  action="{{url('/home/'.$dat->id_siswa.'/akun')}}" method="post">
                      @csrf
                       <button type="submit" name="" class="btn btn-info"><i class="fa  fa-lock"></i></button><br>
                       <br>
                     </form>
                     @endif
                  </td>
                  <td>
                    @php($kel = DB::Table('kelas_m_odels')->where('id_kelas', $dat->id_kelas)->first())
                    {{$kel->judul_kelas.'-'.$kel->jurusan.'-'.$kel->no_kelas}}
                  </td>
                  <td>
                    <a href="#" class="btn btn-info" " data-toggle="modal" data-target="#modal-input-siswa{{$dat->id_siswa}}"><i class="fa fa-edit"></i></a>
                    <a href="#" class="btn btn-danger" " data-toggle="modal" data-target="#modal-delete-input-siswa{{$dat->id_siswa}}"><i class="fa  fa-trash"></i></a>

                    
                  </td>
                </tr>
                  <div class="modal fade" id="modal-delete-input-siswa{{$dat->id_siswa}}" style="display: none;">
                        <div class="modal-dialog ">
                          <div class="modal-content">
                            <form action="{{url('/home/input/'.$dat->id_siswa.'/siswa')}}" method="post">

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


                <div class="modal fade" id="modal-input-siswa{{$dat->id_siswa}}" style="display: none;">
                      <div class="modal-dialog">
                        <form action="{{url('/home/input/'.$dat->id_siswa.'/siswa')}}" method="post">
                          @csrf @method('put')
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Edit data Siswa Ujian</h4>
                          </div>
                          <div class="modal-body">
                           <div class="col-md-12">
                          <div class="container-fluid">
                            <div class="col-md-12">
                            <label >No Ujian</label>
                            <input type="text" name="noujian" class="form-control" value="{{$dat->noujian}}">
                            </div>
                            <div class="col-md-12">
                            <label >NIS</label>
                            <input type="text" name="nis" class="form-control" placeholder="Enter Nis" value="{{$dat->nis}}">
                            </div>
                            <div class="col-md-6">
                            <label >Nama depan:</label>
                            <input type="text" name="namadepan" class="form-control" value="{{$dat->namadepan}}">
                            </div>
                            <div class="col-md-6">
                            <label >Nama belakang</label>
                            <input type="text" name="namabelakang" class="form-control" value="{{$dat->namabelakang}}">
                            </div>
                            <div class="col-md-6">
                            <label >Tempat</label>
                            <input type="text" name="tmp_lahir" class="form-control" value="{{$dat->tmp_lahir}}">
                            </div>
                            <div class="col-md-6">
                            <label >Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control"value="{{$dat->tgl_lahir}}">
                            </div>
                            <div class="col-md-12">
                            <label >Kelas</label>
                            <select name="id_kelas" class="form-control">
                              @foreach($kelas as $kel)
                              <option value="{{$kel->id_kelas}}" @if($kel->id_kelas == $dat->id_kelas) selected="selected" @endif>{{ $kel->judul_kelas.'-'.$kel->jurusan.'-'.$kel->no_kelas}}</option>
                              @endforeach
                            </select>
                            </div>
                            <span style="color:red"><i>* isi data dengan Benar</i></span>
                            <br><br>
                          </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update  </button>
                          </div>
                        </div>
                      </form>
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
<div class="modal fade" id="modal-default" style="display: none;">
  <div class="modal-dialog">
    <form action="{{url('/home/input/siswa')}}" method="post">
      @csrf
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Input data Siswa Ujian</h4>
      </div>
      <div class="modal-body">
       <div class="col-md-12">
    	<div class="container-fluid">
    		<div class="col-md-12">
    		<label >Periode</label>
    		<select name="id_periode" class="form-control">
          @foreach($periode as $per)
    			<option value="{{$per->id_periode}}" @if($per->status == 0) disabled @endif>{{$per->judul_periode}}</option>
    		  @endforeach
        </select>
    		</div>
    		<div class="col-md-12">
    		<label >No Ujian</label>
    		<input type="text" name="noujian" class="form-control" placeholder="Enter No Ujian">
    		</div>
    		<div class="col-md-12">
    		<label >NIS</label>
    		<input type="text" name="nis" class="form-control" placeholder="Enter Nis">
    		</div>
    		<div class="col-md-6">
    		<label >Nama depan:</label>
    		<input type="text" name="namadepan" class="form-control" placeholder="Enter Nama depan">
    		</div>
        <div class="col-md-6">
        <label >Nama belakang</label>
        <input type="text" name="namabelakang" class="form-control" placeholder="Enter Nama belakang">
        </div>
    		<div class="col-md-6">
    		<label >Tempat</label>
    		<input type="text" name="tmp_lahir" class="form-control" placeholder="Enter Tempat Lahir">
    		</div>
    		<div class="col-md-6">
    		<label >Tanggal Lahir</label>
    		<input type="date" name="tgl_lahir" class="form-control" placeholder="Enter Priode Format 2019/2020">
    		</div>
    		<div class="col-md-12">
    		<label >Kelas</label>
    		<select name="id_kelas" class="form-control" required>
          <option value="">--pilih--</option>
          @foreach($kelas as $kel)
    			<option value="{{$kel->id_kelas}}">{{ $kel->judul_kelas.'-'.$kel->jurusan.'-'.$kel->no_kelas}}</option>
          @endforeach
    		</select>
    		</div>
    		<span style="color:red"><i>* isi data dengan Benar</i></span>
    		<br><br>
    	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-importdatatsiswa" style="display: none;">
  <div class="modal-dialog">
  <form method="post" action="{{ url('/home/import/siswa') }}" enctype="multipart/form-data">
    @csrf
       <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Import data Siswa</h4>
      </div>
      <div class="modal-body">
       <div class="col-md-12">
          <label>Kelas :</label>
          <select name="kelas" required class="form-control">
            <option value="">---pilih---</option>
          @foreach($kelas as $kel)
          <option value="{{$kel->id_kelas}}">{{ $kel->judul_kelas.'-'.$kel->jurusan.'-'.$kel->no_kelas}}</option>
          @endforeach
          </select>
          <label>Inport data</label>
        <input type="file" name="file" class="form-control">
        <span style="color:red"><i>* Import data menggunakan Format Exel(CSV)</i></span><br>
        Download Example Terbaru <a href="{{ url('/home/export/siswa') }}">disini <i class="fa  fa-download"></i></a><br><br>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection