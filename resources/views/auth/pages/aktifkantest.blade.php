@extends('auth.template')
@section('mainadmin')
<div class="">
  <div class="row">
    
    <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Aktifkan Soal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
              <table id="example1" class="table table-bordered table-striped">
               <thead>
                <tr>
                  <th>No</th>
                  <th>Mata Ujian</th>
                  <th>Jurusan</th>
                  <th>Jumlah Paket</th>
                  <th>Action</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                @php($no=1)
                @foreach($data as $dat)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$dat->mt_pelajaran}}</td>
                  <td>{{$dat->jurusan}}</td>
                  <td>
                    @php($cekpaket = DB::table('ujian_models')->where('id_mata_pelajaran', $dat->id_mata_pelajaran)->get())
                    {{ @count($cekpaket) }}
                  </td>
                  <td>
                    <form method="post" action="{{url('/home/'.$dat->id_mata_pelajaran.'/ujian/aktifkan')}}">
                    <input type="hidden" name="jurusan" value="{{ $dat->jurusan }}">
                      @csrf @method('put')
                    @if($dat->status_mata_pelajaran == 1)
                      <button type="submit" class="btn btn-success" value="0" name="btn"><i class="fa fa-power-off"></i></button>
                    @elseif($dat->status_mata_pelajaran == 0)
                      <button type="submit" class="btn btn-danger" value="1" name="btn"><i class="fa fa-power-off"></i></button>
                    @endif
                    </form>
                  </td>
                  <td>
                    @if($dat->status_mata_pelajaran == 1)
                      <b>Active</b>
                    @elseif($dat->status_mata_pelajaran == 0)
                     <b>Non Active</b>
                    @endif
                  </td>
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