@extends('auth.template')
@section('mainadmin')
@include('auth.pages.include.contentHeader')
<div class="">
	<div class="row">
		
		<div class="col-md-8">
			<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">View Mata Pelajaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Mata Ujian</th>
                  <th>Jurusan</th>
                  <th></th>
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
                  	<a href="#" class="btn btn-info" " data-toggle="modal" data-target="#modal-mata-pelajaran{{$dat->id_mata_pelajaran}}">Edit</a>
                    <a href="#" class="btn btn-warning" " data-toggle="modal" data-target="#modal-delete-mata-pelajaran{{$dat->id_mata_pelajaran}}">Hapus</a>

                    
                  </td>
                </tr>
                <div class="modal fade" id="modal-delete-mata-pelajaran{{$dat->id_mata_pelajaran}}" style="display: none;">
                        <div class="modal-dialog ">
                          <div class="modal-content">
                            <form action="{{url('/home/mata/'.$dat->id_mata_pelajaran.'/ujian')}}" method="post">

                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Hapus Data </h4>
                            </div>
                            <div class="modal-body">
                                @csrf @method('delete')
                                <h3>Apakah Anda Ingin Menghapus data ini!</h3>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-warning">Hapus</button>
                            </div>
                          </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>



                      <div class="modal fade" id="modal-mata-pelajaran{{$dat->id_mata_pelajaran}}" style="display: none;">
                        <div class="modal-dialog ">
                          <div class="modal-content">
                            <form action="{{url('/home/mata/'.$dat->id_mata_pelajaran.'/ujian')}}" method="post">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Edit Data </h4>
                            </div>
                            <div class="modal-body">
                                @csrf @method('put')
                                    <label >Mata Pelajaran</label><br>
                                    <input type="text" value="{{$dat->mt_pelajaran}}" name="mt_pelajaran" class="form-control" placeholder="Enter Mata Pelajaran"><br>
                                    <label>Jurusan</label>
                                    <select name="jurusan" class="form-control" required>
                                      <option value="">--pilih--</option>
                                      <option value="IPA" @if($dat->jurusan == 'IPA') {{ 'selected' }} @endif>IPA</option>
                                      <option value="IPS" @if($dat->jurusan == 'IPS') {{ 'selected' }} @endif>IPS</option>
                                    </select>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                          </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
		<div class="col-md-4">
          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input Mata Pelajaran</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<div class="container-fluid">
            		<form action="{{url('/home/mata/ujian')}}" method="post">
                  @csrf
                <label >Mata Pelajaran</label>
                <input type="text" name="mt_pelajaran" class="form-control" placeholder="Enter Mata Pelajaran">
                <label>Jurusan</label>
                <select name="jurusan" class="form-control" required>
                  <option value="">--pilih--</option>
                  <option value="IPA">IPA</option>
                  <option value="IPS">IPS</option>
                </select>
                <br>
                <input type="submit" class="btn btn-primary" value="Submit">  
                </form>
            	</div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
             
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
        </div>
	</div>
</div>
@endsection