@extends('auth.template')
@section('mainadmin')
<div class="">
	<div class="row">
		    <div class="col-md-4">
      <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Report Test Perjurusan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <h4><center>ANALISIS REKAPITULASI NILAI <br>
SIMULASI UJIAN BERBASIS KOMPUTER </center></h4>
            <form method="GET" action="{{ url('/home/cetak') }}">
              <label>Tahun ajaran :</label>
            <select class="form-control" name="periode" required>
              <option value="">--pilih--</option>
              @foreach($periode as $per)
              <option value="{{ $per->judul_periode }}">{{ $per->judul_periode }}</option>
              @endforeach
            </select>
            <label>Jurusan :</label>
            <select class="form-control" name="jurusan" required>
              <option value="">--pilih--</option>
              <option value="IPA">IPA</option>
              <option value="IPS">IPS</option>
            </select>
            <br>
            <input type="submit" class="btn btn-success" name="csv" value="CSV">
            <input type="submit" class="btn btn-primary" name="pdf" value="Cetak">
            </form>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
    <div class="col-md-4">
      <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Report Test Semester</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <h4><center>ANALISIS REKAPITULASI NILAI SEMESTER<br>
SIMULASI UJIAN BERBASIS KOMPUTER </center></h4>
            <form method="GET" action="{{ url('/home/cetak/semester') }}">
              <label>Tahun ajaran :</label>
            <select class="form-control" name="periode" required>
              <option value="">--pilih--</option>
              @foreach($periode as $per)
              <option value="{{ $per->judul_periode }}">{{ $per->judul_periode }}</option>
              @endforeach
            </select>
            <label>Jurusan :</label>
            <select class="form-control" name="jurusan" id="jurusan" required>
              <option value="">--pilih--</option>
              <option value="IPA">IPA</option>
              <option value="IPS">IPS</option>
            </select>
            <label>Mata Ujian :</label>
            <select class="form-control" name="mataujian" id="pilih" required>
              <option value="">--pilih--</option>
            </select>
            <br>
            <input type="submit" class="btn btn-success" name="csv" value="CSV">
            <input type="submit" class="btn btn-primary" name="pdf" value="Cetak">
            </form>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
    <div class="col-md-4">
      <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Report Test</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
            </div>
            <!-- /.box-body -->
          </div>
    </div>
	</div>
</div>
<script type="text/javascript">
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $(document).ready(function() {
   $('#jurusan').change(function() {
     var jurusan = $(this).val();
     $.ajax({
            type: 'POST', 
          url: '{{ url("/home/pilih/mataujian") }}', 
         data: 'jurusan=' + jurusan, 
         success: function(response) { 
              $('#pilih').html(response);
            }
       });
    });
  });
</script>
@endsection