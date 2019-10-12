<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
	<tr>
		<td>No</td>
		<td>Nama Peserta</td>
		<td>Kelas</td>
		<td>Program Studi</td>
		<td>No Ujian</td>
		<td>Password</td>
	</tr>
	@php($no=1)
	@foreach($cekdata as $data)
	<tr>
		<td>{{ $no++ }}</td>
		<td>{{ $data->namadepan.' '.$data->namabelakang }}</td>
		<td>{{ $data->judul_kelas}}</td>
		<td>{{ $data->jurusan }}</td>
		<td><b>'{{ $data->noujian }}</b></td>
		<td><b>{{ $data->password }}</b></td>
	</tr>
	@endforeach
</table>
</body>
</html>