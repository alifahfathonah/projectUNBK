<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
	<script type="text/javascript">
		window.print();
	</script>
</head>
<body><br>
<div class="container-fluid">
<!-- <div class="row"> -->
		<div style="width: 100%; overflow: hidden;padding-left:30px"> 
		@foreach($cekdata as $data)
		<table style="width: 46%; float: left;  margin: 10px 10px 20px 10px;" border="1">
			<tr>
				<td>
					<div style="padding:10px">
						<div class="row">
				 <div class="col-md-2"><br>
				 	<img src="{{ asset('/img/4924de679121202.png') }}" style="width:60px">
				 </div>
				 <div class="col-md-8"><br>
				 	<center>
				 		<b>
				 			KARTU PERSERTA SIMULASI <br>
				 			UNBK SMA/MA {{ $data->judul_periode }}
				 		</b>
				 	</center>
				 </div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<table style="width:100%; margin-bottom: 30px;">
					<tr>
						<td>Nama Peserta </td>
						<td>:</td>
						<td>{{ $data->namadepan.' '.$data->namabelakang }}</td>
					</tr>
					<tr>
						<td>Kelas </td>
						<td>:</td>
						<td>{{ $data->judul_kelas.'-'.$data->no_kelas }}</td>
					</tr>
					<tr>
						<td>Program Studi </td>
						<td>:</td>
						<td>{{ $data->jurusan }}</td>
					</tr>
					<tr>
						<td><b>No Ujian</b></td>
						<td><b>:</b></td>
						<td><b>{{ $data->noujian }}</b></td>
					</tr>
					<tr>
						<td><b>Password</b></td>
						<td><b>:</b></td>
						<td><b>{{ $data->password }}</b></td>
					</tr>
				</table>
				</div>

					</div>
				</td>
			</tr>
		</table>
		<!-- <div  style="margin-bottom: 25px; float: left; margin-left: 20px; width: 40%">
			<div style="border:2px solid #000" class="container">
			<div class="row">
				 <div class="col-md-2"><br>
				 	<img src="https://www.kemdikbud.go.id/main/files/large/4924de679121202" style="width:60px">
				 </div>
				 <div class="col-md-8"><br>
				 	<center>
				 		<b>
				 			KARTU PERSERTA SIMULASI <br>
				 			UNBK SMA/MA {{ $data->judul_periode }}
				 		</b>
				 	</center>
				 </div>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<table style="width:100%">
					<tr>
						<td>Nama Peserta </td>
						<td>:</td>
						<td>{{ $data->namadepan.' '.$data->namabelakang }}</td>
					</tr>
					<tr>
						<td>Kelas </td>
						<td>:</td>
						<td>{{ $data->judul_kelas.'-'.$data->no_kelas }}</td>
					</tr>
					<tr>
						<td>Program Studi </td>
						<td>:</td>
						<td>{{ $data->jurusan }}</td>
					</tr>
					<tr>
						<td><b>No Ujian</b></td>
						<td><b>:</b></td>
						<td><b>{{ $data->noujian }}</b></td>
					</tr>
					<tr>
						<td><b>Password</b></td>
						<td><b>:</b></td>
						<td><b>{{ $data->password }}</b></td>
					</tr>
				</table>
				<br><br><br>
				</div>
				
			</div>
		  </div>
		</div> -->
		@endforeach
		<!-- </div> -->
	</div> 
</div>

</body>
</html>