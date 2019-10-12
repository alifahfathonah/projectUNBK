@extends('auth.template')
@section('mainadmin')
@include('auth.pages.include.contentHeader')
<div class="">
	<div class="row">
		
		<div class="col-md-6">
			<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Input Semester</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<form method="post" action="{{url('/home/input')}}">
                @csrf
                 <label>Semester :</label>
                <input type="text" name="judul_semester" class="form-control" placeholder="Enter Semester" required>
                <span style="color:red"><i>* isi Format Semester 1</i></span><br>
                  <input type="submit" value="Submit" class="btn btn-primary" name="semester"> 
              </form>
              <br><br>
              <table id="example1" class="table table-bordered table-striped">
              	
                <thead>
                <tr>
                  <th>No</th>
                  <th>Semester</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @php($nosemester = 1)
                  @foreach($datasemester as $ds)
                  <tr>
                    <td>{{$nosemester++}}</td>
                    <td>{{$ds->judul_semester}}</td>
                    <td>
                     
                        <a href="#" class="btn btn-info" " data-toggle="modal" data-target="#modal-semester{{$ds->id_semester}}">Edit</a>
                        <a href="#" class="btn btn-danger" " data-toggle="modal" data-target="#modal-delete-semester{{$ds->id_semester}}">Hapus</a>

                       <div class="modal fade" id="modal-delete-semester{{$ds->id_semester}}" style="display: none;">
                        <div class="modal-dialog ">
                          <div class="modal-content">
                            <form action="{{url('/home/input/'.$ds->id_semester.'/delete/semester')}}" method="post">

                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Hapus Data Kelas {{$ds->judul_semester}}</h4>
                            </div>
                            <div class="modal-body">
                                @csrf @method('delete')
                                <h3>Apakah Anda Ingin Menghapus data ini!</h3>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                          </form>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>



                      <div class="modal fade" id="modal-semester{{$ds->id_semester}}" style="display: none;">
                        <div class="modal-dialog ">
                          <div class="modal-content">
                            <form action="{{url('/home/input/'.$ds->id_semester.'/update/semester')}}" method="post">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Edit Data Semester {{$ds->judul_semester}}</h4>
                            </div>
                            <div class="modal-body">
                                @csrf @method('put')
                                  <label >Semester :</label><br>
                                  <input type="text" name="judul_semester" class="form-control"  required value="{{$ds->judul_semester}}"> 
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
                      </form>
                    </td>
                  </tr>
                @endforeach
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
		<div class="col-md-6">
          <!-- DIRECT CHAT PRIMARY -->
          <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input Kelas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<div class="container-fluid">
            	   <form action="{{url('/home/input')}}" method="post">
                  @csrf
                    <label >Kelas :</label>
                    <input type="text" name="judul_kelas" class="form-control" placeholder="Enter Kelas Format XII" required maxlength="3">
                    <label>Jurusan</label>
                    <select name="jurusan" required class="form-control">
                      <option value="">--pilih--</option>
                      <option value="IPA">IPA</option>
                      <option value="IPS">IPS</option>
                    </select>
                     <label >No Kelas :</label>
                    <input type="number" name="no_kelas" class="form-control" placeholder="Enter No Kelas Format 1, 2, 3, 4, 5, 6, 7, 8, 9" required maxlength="1">
                    <span style="color:red"><i>* isi Kelas Format XII</i></span>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Submit" name="kelas"><br><br> 
                 </form>
            		 <table id="example3" class="table table-bordered table-striped">
	                <thead>
	                <tr>
	                  <th>No</th>
	                  <th>Kelas</th>
	                  <th></th>
	                </tr>
	                </thead>
                  @php($nokelas = 1)
                  @foreach($datakelas as $dk)
	                <tr>
	                  <td>{{$nokelas++}}</td>
	                  <td>{{$dk->judul_kelas.'_'.$dk->jurusan.'_'.$dk->no_kelas}}</td>
	                  <td>
                        <a href="#" class="btn btn-info" " data-toggle="modal" data-target="#modal-default{{$dk->id_kelas}}">Edit</a>
                        <a href="#" class="btn btn-danger" " data-toggle="modal" data-target="#modal-delete-kelas{{$dk->id_kelas}}">Hapus</a>

                       <div class="modal fade" id="modal-delete-kelas{{$dk->id_kelas}}" style="display: none;">
                        <div class="modal-dialog ">
                          <div class="modal-content">
                            <form action="{{url('/home/input/'.$dk->id_kelas.'/delete/kelas')}}" method="post">

                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Hapus Data Kelas {{$dk->judul_kelas}}</h4>
                            </div>
                            <div class="modal-body">
                                @csrf @method('delete')
                                <h3>Apakah Anda Ingin Menghapus data ini!</h3>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                          </form>

                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>




	                  </td>
	                </tr>
                                        <div class="modal fade" id="modal-default{{$dk->id_kelas}}" style="display: none;">
                        <div class="modal-dialog ">
                          <div class="modal-content">
                            <form action="{{url('/home/input/'.$dk->id_kelas.'/update/kelas')}}" method="post">

                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Edit Data Kelas {{$dk->judul_kelas}}</h4>
                            </div>
                            <div class="modal-body">
                                @csrf @method('put')
                                <label >Kelas :</label>
                                <input type="text" name="judul_kelas" class="form-control" placeholder="Enter Kelas Format XII" required maxlength="3" value="{{$dk->judul_kelas}}">
                                <label>Jurusan</label>
                                <select name="jurusan" required class="form-control">
                                  <option value="">--pilih--</option>
                                  <option value="IPA" @if($dk->jurusan == 'IPA') {{ 'selected' }} @endif>IPA</option>
                                  <option value="IPS" @if($dk->jurusan == 'IPS') {{ 'selected' }} @endif>IPS</option>
                                </select>
                                 <label >No Kelas :</label>
                                <input type="number" name="no_kelas" class="form-control" placeholder="Enter No Kelas Format 1, 2, 3, 4, 5, 6, 7, 8, 9" value="{{$dk->no_kelas}}" required maxlength="1">
                                <span style="color:red"><i>* isi Kelas Format XII</i></span>
                                <br>
                                 
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
              </table>
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