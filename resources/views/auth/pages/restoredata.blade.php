@extends('auth.template')
@section('mainadmin')
<div class="">
	<div class="row">
		
		
			<div class="col-md-6">
			<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Restore Ujian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="{{ url('/home/import/ujian') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label>Upload :</label>
              <input type="file" class="form-control" name="file"><br>
              
             <button class="btn btn-success">CSV</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
			<div class="col-md-6">
			<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Restore Paket</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <form action="{{ url('/home/import/restore/paket') }}" method="post" enctype="multipart/form-data">
                @csrf
             
               <label>Upload :</label>
              <input type="file" class="form-control" name="file"><br>
             
             <button class="btn btn-success">CSV</button>
           </form>
            </div>
            <!-- /.box-body -->
          </div>
		</div>

			<div class="col-md-6">
			<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Restore Soal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <form action="{{ url('/home/import/restore/siswa') }}" method="post" enctype="multipart/form-data">
                @csrf
               <label>Upload :</label>
              <input type="file" class="form-control" name="file"><br>
              
             <button class="btn btn-success">CSV</button>
           </form>
            </div>
            <!-- /.box-body -->
          </div>
		</div>

      <div class="col-md-6">
      <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Restore Siswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <form action="{{ url('/home/import/restore/siswa') }}" method="post" enctype="multipart/form-data">
                @csrf
               <label>Upload :</label>
              <input type="file" class="form-control" name="file"><br>
              
             <button class="btn btn-success">CSV</button>
           </form>
            </div>
            <!-- /.box-body -->
          </div>
    </div>

	</div>
</div>
@endsection