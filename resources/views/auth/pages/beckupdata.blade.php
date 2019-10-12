@extends('auth.template')
@section('mainadmin')
<div class="">
	<div class="row">
   <div class="col-md-6">
     <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Beckup Ujian</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
       <a class="btn btn-success" href="{{ url('/home/export/ujian') }}"><i class="fa fa-download"></i> CSV</a>
     </div>
     <!-- /.box-body -->
   </div>
 </div>
 <div class="col-md-6">
  <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title">Beckup Paket</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <a class="btn btn-success" href="{{ url('/home/export/paket/all') }}"><i class="fa fa-download"></i> CSV</a>
    </div>
    <!-- /.box-body -->
  </div>
</div>
<div class="col-md-6">
 <div class="box box-info">
  <div class="box-header">
    <h3 class="box-title">Beckup Soal</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <a class="btn btn-success" href="{{ url('/home/export/soal/all') }}"><i class="fa fa-download"></i> CSV</a>
  </div>
  <!-- /.box-body -->
</div>
</div>

<div class="col-md-6">
 <div class="box box-info">
  <div class="box-header">
    <h3 class="box-title">Beckup Siswa</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <a class="btn btn-success" href="{{ url('/home/export/siswa/beckup') }}"><i class="fa fa-download"></i> CSV</a>
  </div>
  <!-- /.box-body -->
</div>
</div>

</div>
</div>
@endsection