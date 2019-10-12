<!DOCTYPE html>
<html>
<head>
	<title>laporan TIGA</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
	  <script src="{{ asset('/js/jquery.min.js') }}"></script>
	  <script src="{{ asset('/js/popper.min.js') }}"></script>
	  <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
	  <script type="text/javascript">
		window.print();
	</script>
</head>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<!-- <img src="http://smamuhipo.sch.id/wp-content/uploads/2019/01/9.png" style="width: 100%"> -->
		</div>
		<div class="col-md-6">
			<h2 align="center">ANALISIS REKAPITULASI NILAI <BR> SIMULASI UJIAN BERBASIS KOMPUTER <BR> TAHUN AJARAN 2018/2019</h2>
		</div>
</div>

		<p align="right"><span style="color: #fff;padding: 2px; background: blue">SIMULASI UNBK-2019(SMA/MA)</span></p>
		<hr>
	<div class="row">
		<div class="col-md-4">
			<table>
			<tr>
				<td>Provinsi</td>
				<td>:</td>
				<td>{{ $profilsekolah->provinsi }}</td>
			</tr>
			<tr>
				<td>KOTA / KAB</td>
				<td>:</td>
				<td>{{ $profilsekolah->kotaorkab }}</td>
			</tr>
		</table>
		</div>
		<div class="col-md-4">
			<table >
			<tr>
				<td>PROGRAM STUDI</td>
				<td>:</td>
				<td><span style=" background: blue; color: #fff">{{ $rejurusan }}</span></td>
			</tr>
			<tr>
				<td>KELAS</td>
				<td>:</td>
				<td><span style=" margin:2px; background: blue; color: #fff">XII</span></td>
			</tr>
		</table>
		</div>
		<div class="col-md-4">
			<table >
			<tr>
				<td>SEKOLAH</td>
				<td>:</td>
				<td>{{ $profilsekolah->namasekolah }}</td>
			</tr>
			<tr>
				<td>NPSN</td>
				<td>:</td>
				<td>{{ $profilsekolah->npsn }}</td>
			</tr>
		</table>
		</div>
	</div>
</div>
<br>
<div class="container-fluid">
<table class="table table-bordered" style="text-align: center">
	<tr style="background: blue; color: #fff">
		<th rowspan="2"><br><br>NO</th>
		<th rowspan="2"><br>NOMOR <br> PESERTA</th>
		<th rowspan="2"><br>NAMA SISWA</th>
		<th colspan="12">{{ $remataujian }}</th>
	</tr>
	<tr style="background: blue; color: #fff">
		<th >SMT 1</th>
		<th >T/BT</th>
		<th >SMT 2</th>
		<th >T/BT</th>
		<th >SMT 3</th>
		<th >T/BT</th>
		<th >SMT 4</th>
		<th >T/BT</th>
		<th >SMT 5</th>
		<th >T/BT</th>
		<th >SMT 6</th>
		<th >T/BT</th>
	</tr>
	@php($no=1)
	@foreach($cekkelas as $kls)
		@php($ceksiswa = DB::table('data_siswa_models')->where('id_kelas', $kls->id_kelas)->where('id_periode', $cekperiode->id_periode)
		->orderByDesc('noujian')
		->get())

		@foreach($ceksiswa as $siswa)
		@php(
		$dataS1 = DB::table('jawab_models')
		->join('master_soals', 'jawab_models.id_soal', '=', 'master_soals.id_soal')
		->join('data_siswa_models', 'jawab_models.id_siswa', '=', 'data_siswa_models.id_siswa')
		->join('ujian_models', 'jawab_models.id_ujian', '=', 'ujian_models.id_ujian')
		->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
		->join('semester_models', 'master_soals.id_semester', '=', 'semester_models.id_semester')
		->join('mata_pelajaran_models', 'ujian_models.id_mata_pelajaran', '=', 'mata_pelajaran_models.id_mata_pelajaran')
		->where('jawab_models.id_siswa', $siswa->id_siswa)
		->where('semester_models.judul_semester', 'Semester 1')
		->where('mata_pelajaran_models.mt_pelajaran',$remataujian)
		->where('mata_pelajaran_models.jurusan', $rejurusan)
		//->select(DB::raw('SUM(jawab_models.skor) as skor'))
		->get()
		)

		@php(
		$dataS2 = DB::table('jawab_models')
		->join('master_soals', 'jawab_models.id_soal', '=', 'master_soals.id_soal')
		->join('data_siswa_models', 'jawab_models.id_siswa', '=', 'data_siswa_models.id_siswa')
		->join('ujian_models', 'jawab_models.id_ujian', '=', 'ujian_models.id_ujian')
		->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
		->join('semester_models', 'master_soals.id_semester', '=', 'semester_models.id_semester')
		->join('mata_pelajaran_models', 'ujian_models.id_mata_pelajaran', '=', 'mata_pelajaran_models.id_mata_pelajaran')
		->where('jawab_models.id_siswa', $siswa->id_siswa)
		->where('semester_models.judul_semester', 'Semester 2')
		->where('mata_pelajaran_models.mt_pelajaran',$remataujian)
		->where('mata_pelajaran_models.jurusan', $rejurusan)
		->get()
		)

		@php(
		$dataS3 = DB::table('jawab_models')
		->join('master_soals', 'jawab_models.id_soal', '=', 'master_soals.id_soal')
		->join('data_siswa_models', 'jawab_models.id_siswa', '=', 'data_siswa_models.id_siswa')
		->join('ujian_models', 'jawab_models.id_ujian', '=', 'ujian_models.id_ujian')
		->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
		->join('semester_models', 'master_soals.id_semester', '=', 'semester_models.id_semester')
		->join('mata_pelajaran_models', 'ujian_models.id_mata_pelajaran', '=', 'mata_pelajaran_models.id_mata_pelajaran')
		->where('jawab_models.id_siswa', $siswa->id_siswa)
		->where('semester_models.judul_semester', 'Semester 3')
		->where('mata_pelajaran_models.mt_pelajaran',$remataujian)
		->where('mata_pelajaran_models.jurusan', $rejurusan)
		->get()
		)

		@php(
		$dataS4 = DB::table('jawab_models')
		->join('master_soals', 'jawab_models.id_soal', '=', 'master_soals.id_soal')
		->join('data_siswa_models', 'jawab_models.id_siswa', '=', 'data_siswa_models.id_siswa')
		->join('ujian_models', 'jawab_models.id_ujian', '=', 'ujian_models.id_ujian')
		->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
		->join('semester_models', 'master_soals.id_semester', '=', 'semester_models.id_semester')
		->join('mata_pelajaran_models', 'ujian_models.id_mata_pelajaran', '=', 'mata_pelajaran_models.id_mata_pelajaran')
		->where('jawab_models.id_siswa', $siswa->id_siswa)
		->where('semester_models.judul_semester', 'Semester 4')
		->where('mata_pelajaran_models.mt_pelajaran',$remataujian)
		->where('mata_pelajaran_models.jurusan', $rejurusan)
		->get()
		)

		@php(
		$dataS5 = DB::table('jawab_models')
		->join('master_soals', 'jawab_models.id_soal', '=', 'master_soals.id_soal')
		->join('data_siswa_models', 'jawab_models.id_siswa', '=', 'data_siswa_models.id_siswa')
		->join('ujian_models', 'jawab_models.id_ujian', '=', 'ujian_models.id_ujian')
		->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
		->join('semester_models', 'master_soals.id_semester', '=', 'semester_models.id_semester')
		->join('mata_pelajaran_models', 'ujian_models.id_mata_pelajaran', '=', 'mata_pelajaran_models.id_mata_pelajaran')
		->where('jawab_models.id_siswa', $siswa->id_siswa)
		->where('semester_models.judul_semester', 'Semester 5')
		->where('mata_pelajaran_models.mt_pelajaran',$remataujian)
		->where('mata_pelajaran_models.jurusan', $rejurusan)
		->get()
		)

		@php(
		$dataS6 = DB::table('jawab_models')
		->join('master_soals', 'jawab_models.id_soal', '=', 'master_soals.id_soal')
		->join('data_siswa_models', 'jawab_models.id_siswa', '=', 'data_siswa_models.id_siswa')
		->join('ujian_models', 'jawab_models.id_ujian', '=', 'ujian_models.id_ujian')
		->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
		->join('semester_models', 'master_soals.id_semester', '=', 'semester_models.id_semester')
		->join('mata_pelajaran_models', 'ujian_models.id_mata_pelajaran', '=', 'mata_pelajaran_models.id_mata_pelajaran')
		->where('jawab_models.id_siswa', $siswa->id_siswa)
		->where('semester_models.judul_semester', 'Semester 6')
		->where('mata_pelajaran_models.mt_pelajaran',$remataujian)
		->where('mata_pelajaran_models.jurusan', $rejurusan)
		->get()
		)
		<?php 
		$totalS1=0;
		$totalS2=0;
		$totalS3=0;
		$totalS4=0;
		$totalS5=0;
		$totalS6=0;
		$hurufS1=0;
		$hurufS2=0;
		$hurufS3=0;
		$hurufS4=0;
		$hurufS5=0;
		$hurufS6=0;
		 ?>
		
		
		
	<tr>
		<td>{{ $no++ }}</td>
		<td>{{ $siswa->noujian }}</td>
		<td>{{ $siswa->namadepan.' '.$siswa->namabelakang }}</td>
		<td>
			@foreach($dataS1 as $dataS1a)
				@php($totalS1 += $dataS1a->skor_jawab)
			@endforeach
			{{ $hurufS1 = $totalS1 * 5 }}
		</td>
		<td>
			@if($hurufS1 > 65)
			T
			@else
			<span style="background: red; color: #fff; padding: 10px">BT</span>
			@endif
		</td>
		<td>
			@foreach($dataS2 as $dataS2)
				@php($totalS2 += $dataS2->skor_jawab)
			@endforeach
			{{ $hurufS2 = $totalS2 * 5  }}
		</td>
		<td>
			@if($hurufS2 > 65)
			T
			@else
			<span style="background: red; color: #fff; padding: 10px">BT</span>
			@endif
		</td>
		<td>
			@foreach($dataS3 as $dataS3)
				@php($totalS3 += $dataS3->skor_jawab)
			@endforeach
			{{ $hurufS3 = $totalS3 * 5  }}
		</td>
		<td>
			@if($hurufS3 > 65)
			T
			@else
			<span style="background: red; color: #fff; padding: 10px">BT</span>
			@endif
		</td>
		<td>
			@foreach($dataS4 as $dataS4)
				@php($totalS4 += $dataS4->skor_jawab)
			@endforeach
			{{ $hurufS4 = $totalS4 * 5  }}
		</td>
		<td>
			@if($hurufS4 > 65)
			T
			@else
			<span style="background: red; color: #fff; padding: 10px">BT</span>
			@endif
		</td>
		<td>
			@foreach($dataS5 as $dataS5)
				@php($totalS5 += $dataS5->skor_jawab)
			@endforeach
			{{ $hurufS5 = $totalS5 * 5  }}
		</td>
		<td>
			@if($hurufS5 > 65)
			T
			@else
			<span style="background: red; color: #fff; padding: 10px">BT</span>
			@endif
		</td>
		<td>
			@foreach($dataS6 as $dataS6)
				@php($totalS6 += $dataS6->skor_jawab)
			@endforeach
			{{ $hurufS6 = $totalS6 * 5 }}
		</td>
		<td>
			@if($hurufS6 > 65)
			T
			@else
			<span style="background: red; color: #fff; padding: 10px">BT</span>
			@endif
		</td>
	</tr>
		@endforeach
	@endforeach
	
</table>
</div>
</body>
</html>