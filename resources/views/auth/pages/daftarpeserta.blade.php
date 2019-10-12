@extends('auth.template')
@section('mainadmin')
<div class="">
	<div class="row">
		
		<div class="col-md-12">
			<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">View data peserta </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="">
    		<form action="{{url('/home/daftar/peserta')}}" method="get">
          <div class="col-md-5">
            Periode :
            <select name="periode" class="form-control">
              @foreach($cekboxperiode as $cbp)
              <option value="{{$cbp->id_periode}}" @if($cbp->id_periode == $cekperiode) selected="selected" @endif>{{$cbp->judul_periode}}</option>
              @endforeach
            </select>  
          </div>
          <div class="col-md-5">
            Kelas :
            <select name="kelas" class="form-control">
              @foreach($cekboxkelas as $cbk)
              <option value="{{$cbk->id_kelas}}" @if($cbk->id_kelas == $cekkelas) selected="selected" @endif>{{$cbk->judul_kelas.'-'.$cbk->jurusan.'-'.$cbk->no_kelas}}</option>
              @endforeach
            </select>  
          </div>
          <div class="col-md-2"><br>
            <input type="submit" value="Submit" class="btn btn-primary">
          </div>
        </form>
    		</div><br><br><br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Ujian</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Tempat/Tanggal Lahir</th>
                  <th>Kelas</th>
                </tr>
                </thead>
                <tbody>
                @php($no=1)
                @foreach($data as $dat)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$dat->noujian}}</td>
                  <td>{{$dat->nis}}</td>
                  <td>{{$dat->namadepan.' '.$dat->namabelakang}}</td>
                  <td>{{$dat->tmp_lahir.' / '.$dat->tgl_lahir}}
                  <td>
                    @php($kel = DB::Table('kelas_m_odels')->where('id_kelas',$dat->id_kelas)->first())
                    {{$kel->judul_kelas.'-'.$kel->jurusan.'-'.$kel->no_kelas}}
                  </td>
                </tr>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>
</div>
@endsection