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
                  <th>Periode</th>
                  <th>Token</th>
                  <th>Status</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                @if(@count($token) > 0)
                @php($no = 1)
                @foreach($token as $tkn)
                <tr>
                  <td>{{$no++}}</td>
                  <td>
                    @php($cektoken = DB::Table('periode_models')->where('id_periode', $tkn->id_periode)->first())
                    {{$cektoken->judul_periode}}
                  </td>
                 
                  <td>{{$tkn->token_ujian}}</td>
                  <td>
                    <form method="post" action="{{url('/home/'.$tkn->id_token.'/token')}}">
                      @csrf @method('put')
                    @if($tkn->status == 1)
                      <button type="submit" class="btn btn-success" value="0" name="btn"><i class="fa fa-power-off"></i></button>
                    @elseif($tkn->status == 0)
                      <button type="submit" class="btn btn-danger" value="1" name="btn"><i class="fa fa-power-off"></i></button>
                    @endif
                    </form>
                  </td>
                  <td>
                    <a href="#" class="btn btn-danger" " data-toggle="modal" data-target="#modal-delete-token{{$tkn->id_token}}"><i class="fa  fa-trash"></i></a>
                  </td>
                </tr>

                    <div class="modal fade" id="modal-delete-token{{$tkn->id_token}}" style="display: none;">
                        <div class="modal-dialog ">
                          <div class="modal-content">
                            <form action="{{url('/home/'.$tkn->id_token.'/token')}}" method="post">

                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                              <h4 class="modal-title">Hapus Data token </h4>
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
               @endforeach
               @else
               <tr>
                 <td colspan=""><center>Data Kosong</center></td>
               </tr>
               @endif
 
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
              <h3 class="box-title">Input Token Perkelas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<div class="container-fluid">
            		<form method="post" action="{{url('/home/input/token')}}">
                  @csrf
                  <label >periode</label>
                <select name="id_periode" class="form-control" required>
                  @if($periode != null)
                  <option value="{{$periode->id_periode}}">{{$periode->judul_periode}}</option>
                  @else
                  <option value="">Periode Kosong!</option>
                  @endif
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