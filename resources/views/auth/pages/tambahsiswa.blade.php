@extends('auth.template')
@section('mainadmin')
<div class="">
	<div class="row">
		
		<div class="col-md-12">
			<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Kelas : {{$cek_kelas->judul_kelas}} Paket : <b>{{$cek_ujian->paket_ujian}}</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table  class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Ujian</th>
                  <th>NISN</th>
                  <th>NAMA</th>
                  <th>Tempat/ Tanggal Lahir</th>
                  <th>Pilih</th>
                </tr>
                </thead>
                <form action="{{url('/home/pilih/'.$cek_ujian->id_ujian.'/kelas/'.$cek_kelas->id_kelas)}}" method="post">
                @csrf
                <tbody>
                @php($no = 1)
                @foreach($cek_siswa as $data)
                @php($cekdata = DB::Table('pilih_ujian_models')->where('id_ujian', $cek_ujian->id_ujian)->where('id_kelas', $cek_kelas->id_kelas)->where('id_siswa', $data->id_siswa)->first())
                @if(@count($cekdata) < 1)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$data->noujian}}</td>
                  <td>{{$data->nis}}</td>
                  <td>{{$data->namadepan.' '.$data->namabelakang}}</td>
                  <td>{{$data->tmp_lahir.' / '.date('d F Y', strtotime($data->tgl_lahir))}}</td>
                  <td>
                  		<input type="checkbox" name="pilihsiswa[]" value="{{$data->id_siswa}}">
                  </td>
                </tr>
                @endif
 				@endforeach
                </tbody>
                <tr>
                	<td colspan="5"></td>
                	<td >
                		<input type="submit" value="Simpan" class="btn btn-primary">
                	</td>
                </tr>
                </form>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>
</div>
@endsection