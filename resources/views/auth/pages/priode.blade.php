@extends('auth.template')
@section('mainadmin')
@include('auth.pages.include.contentHeader')
<div class="">
	<div class="row">
		
		<div class="col-md-8">
			<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">View Periode</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Periode</th>
                  <th>Status</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @php($no=1)
                @foreach($data as $dat)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$dat->judul_periode}}
                  </td>
                  <td>
                    @if($dat->status == 0)
                  	<i style="color: red">Non Active</i>
                    @elseif($dat->status == 1)
                    Active
                    @endif
                  </td>
                  <td>
                  	<a href="#" class="btn btn-info" " data-toggle="modal" data-target="#modal-periode{{$dat->id_periode}}">Edit</a>
                    <a href="#" class="btn btn-warning" " data-toggle="modal" data-target="#modal-delete-periode{{$dat->id_periode}}">Delete</a>

                </tr>
                
                    <div class="modal fade" id="modal-delete-periode{{$dat->id_periode}}" style="display: none;">
                        <div class="modal-dialog ">
                          <div class="modal-content">
                            <form action="{{url('/home/'.$dat->id_periode.'/periode')}}" method="post">

                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Hapus Data Periode {{$dat->judul_semesterjudul_periode}}</h4>
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



                      <div class="modal fade" id="modal-periode{{$dat->id_periode}}" style="display: none;">
                        <div class="modal-dialog ">
                          <div class="modal-content">
                            <form action="{{url('/home/'.$dat->id_periode.'/periode')}}" method="post">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Edit Data Periode {{$dat->judul_periode}}</h4>
                            </div>
                            <div class="modal-body">
                                @csrf @method('put')
                                  <label >Periode</label><br>
                                  <input type="text" name="judul_periode" class="form-control" placeholder="Enter Priode Format 2019/2020" required value="{{$dat->judul_periode}}"><br>
                                  <span style="color:red"><i>* isi periode dengan format YYYY/YYYY(Tahun ajaran)</i></span>
                                  <br>
                                  <input type="submit" class="btn btn-primary" value="Submit"> 
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
                  </td>
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
              <h3 class="box-title">Input Periode</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<div class="container-fluid">
            		<form action="{{url('/home/periode')}}" method="post">
                  @csrf
                  <label >Periode</label>
                  <input type="text" name="judul_periode" class="form-control" placeholder="Enter Priode Format 2019/2020">
                  <span style="color:red"><i>* isi periode dengan format YYYY/YYYY(Tahun ajaran)</i></span>
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