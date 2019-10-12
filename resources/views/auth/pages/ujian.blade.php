@extends('auth.template')
@section('mainadmin')
<div class="">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Input Ujian</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<div class="container-fluid">
            		<form method="post" action="{{url('/home/ujian')}}">
            			@csrf
			    		<label>Mata Ujian</label>
			    		<select name="id_mata_pelajaran" class="form-control select2" style="width: 100%;">
			    			 @foreach($matapelajaran as $mat)
				              <option value="{{$mat->id_mata_pelajaran}}" >{!!$mat->mt_pelajaran.' - '.$mat->jurusan!!}</option>
				              @endforeach
			    		</select>
			    		<label>Tanggal Ujian</label>
			    		<div class="input-group date">
		                  <div class="input-group-addon">
		                    <i class="fa fa-calendar"></i>
		                  </div>
		                  <input type="date" name="tgl_ujian" class="form-control pull-right">
		                </div>
			    		
			    		<label>Waktu Ujian</label>
			    		<div class="input-group date">
		                  <div class="input-group-addon">
		                    <i class="fa fa-clock-o"></i>
		                  </div>
		                  <input type="text" name="waktu_ujian" class="form-control pull-right" placeholder="Enter Jam Ujian Format H:m:s(07:30:00)">
		                </div>
			    		
			    		<label>Paket</label>
			    		<input type="text" name="paket_ujian" class="form-control" placeholder="Enter Paket Format (1, 2, 3) atau (A, B, C)">
			    		<label>Alokasi Waktu</label>
			    		<select name="alokasi_waktu" class="form-control">
			    			<option value="40">40 Menit</option>
			    			<option value="60">60 Menit</option>
			    			<option value="90">90 Menit</option>
			    			<option value="120">120 Menit</option>
			    			<option value="150">150 Menit</option>
			    			<option value="180">180 Menit</option>
			    		</select><br>
			    		<input type="submit" class="btn btn-primary" value="Submit"><br>
            		</form>
            	</div>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>
</div>
@endsection