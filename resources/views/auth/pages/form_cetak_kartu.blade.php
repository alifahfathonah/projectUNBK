@extends('auth.template')
@section('mainadmin')
<div class="">
	<div class="row">
		<div class="col-md-6">
			<div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Cetak Kartu ujian </h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
         <div class="">
          <form action="{{url('/home/cetak/kartu/peserta')}}" method="get">
            <div class="col-md-12">
              Periode :
              <select name="id_periode" class="form-control" required>
                <option value="">--pilih--</option>
                @foreach($cekboxperiode as $cbp)
                <option value="{{$cbp->id_periode}}"suhu peak>{{$cbp->judul_periode}}</option>
                @endforeach
              </select>  
            </div>
            <div class="col-md-12">
              Kelas :
              <select name="id_kelas" class="form-control" required>
                <option value="">--pilih--</option>
                @foreach($cekboxkelas as $cbk)
                <option value="{{$cbk->id_kelas}}" >{{$cbk->judul_kelas.'-'.$cbk->jurusan.'-'.$cbk->no_kelas}}</option>
                @endforeach
              </select>  
            </div>
            <div class="col-md-12"><br>
              <input type="submit" name="csv" value="CSV" class="btn btn-success">
              <input type="submit" value="Submit" name="pdf" class="btn btn-primary">
            </div>
          </form>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>
</div>
@endsection