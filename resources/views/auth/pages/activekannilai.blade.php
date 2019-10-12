@extends('auth.template')
@section('mainadmin')
<div class="">
  <div class="row">
    
    <div class="col-md-6">
      <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Aktifkan Nilai</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             
              <table id="example1" class="table table-bordered table-striped">
               <thead>
                <tr>
                  <th>No</th>
                  <th>Action</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                	<td>1</td>
                	<td>
                		@if(@count($data) > 0)
	                		<form method="post" action="{{ url('/home/aktifkan/nilai') }}">
		                      @csrf @method('put')
		                    @if($data->kondisinilai == 1)
		                      <button type="submit" class="btn btn-success" value="0" name="kondisi"><i class="fa fa-power-off"></i></button>
		                    @elseif($data->kondisinilai == 0)
		                      <button type="submit" class="btn btn-danger" value="1" name="kondisi"><i class="fa fa-power-off"></i></button>
		                    @endif
		                    </form>
		                @else
		                	<form method="post" action="{{ url('/home/aktifkan/nilai') }}">
		                		@csrf
		                		 <button type="submit" class="btn btn-danger"><i class="fa fa-power-off"></i></button>
		                	</form>
		                @endif
                	</td>
                	<td>
                		@if(@count($data) > 0)
		                    @if($data->kondisinilai == 1)
		                      <b>Active</b>
		                    @elseif($data->kondisinilai == 0)
		                      <b>Non Active</b>
		                    @endif
		                    </form>
		                @else
		                	<b>Non Active</b>
		                @endif
                	</td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </div>
  </div>
</div>
@endsection