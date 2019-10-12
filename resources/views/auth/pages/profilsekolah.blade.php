@extends('auth.template')
@section('mainadmin')
<div class="">
	<div class="row">
		<div class="col-md-6">
			<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Data Sekolah</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="">
            @if(@count($data) > 0)
            <form action="{{url('/home/update/data/sekolah')}}" method="post">
            	@method('put')
                <input type="hidden" name="dataid" value="{{ $data->id }}">
            @else
    		<form action="{{url('/home/save/data')}}" method="post">
    		@endif
    		@csrf
         	<label>Nama Sekolah :</label>
         	<input type="text" placeholder="Enter Nama Sekolah" required name="namasekolah" class="form-control" value="{{ (@count($data) > 0) ? $data->namasekolah : '' }}">
         	<label>Tingkat :</label>
         	<input type="text" required name="tingkat" placeholder="Enter Tingkat Format SMA/MA" class="form-control" value="{{ (@count($data) > 0) ? $data->tingkat : '' }}">
         	<label>Provinsi :</label>
         	<input type="text" required name="provinsi" placeholder="Enter Provinsi" class="form-control" value="{{ (@count($data) > 0) ? $data->provinsi : '' }}">
         	<label>Kota/Kabupaten :</label>
         	<input type="text" required name="kotaorkab" placeholder="Enter kota atau kabupaten" class="form-control" value="{{ (@count($data) > 0) ? $data->kotaorkab : '' }}">
         	<label>NPSN :</label>
         	<input type="text" required name="npsn" value="{{ (@count($data) > 0) ? $data->npsn : '' }}" placeholder="Enter NPSN" class="form-control">
         	<br>
         	<input type="submit" class="btn btn-success" value="{{ (@count($data) > 0) ? 'update' : 'simpan' }}" name="{{ (@count($data) > 0) ? 'update' : 'simpan' }}">
        	</form>
    		</div>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
		<div class="col-md-6">
			<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Update Accunt</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="">
            <form action="{{url('home/update/accunt')}}" method="post">
            @method('put')
    		@csrf
         	<label>Name :</label>
         	<input type="text" placeholder="Enter Name" required name="name" class="form-control" value="{{ auth()->user()->name }}">
         	<label>Email</label>
         	<input type="email" required name="email" placeholder="Enter email" class="form-control" value="{{ auth()->user()->email }}">
         	<label>Password :</label>
         	<input type="password" name="password"  class="form-control" placeholder="Enter Password">
         	<br>
         	<input type="submit" class="btn btn-success" value="Update">
        	</form>
    		</div>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>
</div>
@endsection