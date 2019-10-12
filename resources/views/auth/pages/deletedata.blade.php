@extends('auth.template')
@section('mainadmin')
<div class="">
	<div class="row">
		
			<div class="col-md-6">
			<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Delete Ujian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="{{ url('/home/delete/ujian/data') }}" method="post">
              @csrf @method('delete')
              <label>Periode :</label>
              <select class="form-control select2" required name="id_periode">
                <option value="">--pilih--</option>
                @foreach($ujian as $uji)
                <option value="{{ $uji->id_ujian }}">
                  @php($matpel = DB::table('mata_pelajaran_models')->where('id_mata_pelajaran', $uji->id_mata_pelajaran)->first())
                  {!! $matpel->mt_pelajaran.' Jurusan '.$matpel->jurusan.' Paket  '.$uji->paket_ujian !!}
                </option>
                @endforeach
              </select><br><br>
              <button class="btn btn-danger">delete</button>
            </form>
            </div>
            <!-- /.box-body -->
          </div>
		</div>

			<div class="col-md-6">
			<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Delete Siswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="{{ url('/home/delete/siswa/data') }}" method="post">
              @csrf @method('delete')
              <label>Periode :</label>
              <select class="form-control select2" required name="id_periode">
                <option value="">--pilih--</option>
                @foreach($periode as $per)
                <option value="{{ $per->id_periode }}">{{ $per->judul_periode }}</option>
                @endforeach
              </select><br><br>
              <button class="btn btn-danger">delete</button>
            </form>
            </div>
            <!-- /.box-body -->
          </div>
		</div>

	</div>
</div>
@endsection