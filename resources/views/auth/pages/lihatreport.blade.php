@extends('auth.template')
@section('mainadmin')
<div class="">
	<div class="row">
		
		<div class="col-md-12">
			<div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Report Test</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Ujian</th>
                  <th>Nama</th>
                  <th>Nilai</th>
                  <th>Jawaban</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>213131321</td>
                  <td>Example Name</td>
                  <td>
                  	80
                  </td>
                  <td>A, B, <span style="color:red">C</span> , D, E </td>
                  <td>
                  	<button class="btn btn-primary">Cetak</button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                   <td>213131321</td>
                  <td>Example Name</td>
                  <td>
                  	80
                  </td>
                  <td>A, B, <span style="color:red">C</span> , D, E </td>
                  <td>
                  	<button class="btn btn-primary">Cetak</button>
                  </td>
                  
                </tr>
               
 
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
		</div>
	</div>
</div>
@endsection