<!DOCTYPE html>
<html>
<head>
	<title>laporan dua</title>
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
			<h2 align="center">ANALISIS REKAPITULASI NILAI <BR> SIMULASI UJIAN BERBASIS KOMPUTER <BR> TAHUN AJARAN {{ $periode }}</h2>
		</div>
</div>

		<p align="right"><span style="color: #fff;padding: 2px; background: blue">SIMULASI UNBK-{{ date('Y') }}(SMA/MA)</span></p>
		<hr>
	<div class="row">
		<div class="col-md-4">
			<table>
			<tr>
				<td>Provinsi</td>
				<td>:</td>
				<td>{{ $datasekolah->provinsi }}</td>
			</tr>
			<tr>
				<td>KOTA / KAB</td>
				<td>:</td>
				<td>{{ $datasekolah->kotaorkab }}</td>
			</tr>
		</table>
		</div>
		<div class="col-md-4">
			<table >
			<tr>
				<td>PROGRAM STUDI</td>
				<td>:</td>
				<td><span style=" background: blue; color: #fff">{{ $jurusan }}</span></td>
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
				<td>{{ $datasekolah->namasekolah }}</td>
			</tr>
			<tr>
				<td>NPSN</td>
				<td>:</td>
				<td>{{ $datasekolah->npsn }}</td>
			</tr>
		</table>
		</div>
	</div>
</div>
<br>
<div class="container-fluid">
<table class="table table-bordered" id="myTable">
	<tr style="background: blue; color: #fff;text-align: center">
		<th rowspan="3"><br><br>NO</th>
		<th rowspan="3"><br>NOMOR <br> PESERTA</th>
		<th rowspan="3"><br><br>NAMA SISWA</th>
		<th colspan="12">NILAI MATA PELAJARAN / KETUNTASAN</th>
		<th rowspan="3"><br>JML NILAI</th>
		<th rowspan="3">NILAI  RATA - RATA</th>
		<th rowspan="3"><br>RANK</th>
	</tr>
	<tr style="background: blue; color: #fff;text-align: center">
		<th rowspan="2"><br>BAHASA INDONESIA</th>
		<th rowspan="2"><br>T/BT</th>
		<th rowspan="2"><br>MATEMATIKA</th>
		<th rowspan="2"><br>T/BT</th>
		<th rowspan="2"><br>BAHASA INGGRIS</th>
		<th rowspan="2"><br>T/BT</th>
		<th colspan="6">MAPEL PILIHAN</th>
	</tr>
	@if($jurusan == 'IPS')
	<tr style="background: blue; color: #fff;text-align: center">
		<th>EKONOMI</th>
		<th>T/BT</th>
		<th>SOSIOLOGI</th>
		<th>T/BT</th>
		<th>GEOGRAFI</th>
		<th>T/BT</th>
	</tr>
	@elseif($jurusan == 'IPA')
	<tr style="background: blue; color: #fff;text-align: center">
		<th>FISIKA</th>
		<th>T/BT</th>
		<th>KIMIA</th>
		<th>T/BT</th>
		<th>BIOLOGI</th>
		<th>T/BT</th>
	</tr>
	@endif

	@php($no=1)
	@foreach($cekkelas as $kls)

	@php($ceksiswa = DB::table('data_siswa_models')->where('id_kelas', $kls->id_kelas)->where('id_periode', $cekperiode->id_periode)->get())

	@foreach($ceksiswa as $siswa)

	@php($cekmmatpelbi = DB::table('mata_pelajaran_models')->where('mt_pelajaran', 'BAHASA INDONESIA')->where('jurusan', $jurusan)->first())
	<!--  -->
	@php($cekmmatpelmtk = DB::table('mata_pelajaran_models')->where('mt_pelajaran', 'MATEMATIKA')->where('jurusan', $jurusan)->first())
	<!--  -->
	@php($cekmmatpelbingg = DB::table('mata_pelajaran_models')->where('mt_pelajaran', 'BAHASA INGGRIS')->where('jurusan', $jurusan)->first())
	<!--  -->
	@php($cekmmatpelgeog = DB::table('mata_pelajaran_models')->where('mt_pelajaran', 'GEOGRAFI')->where('jurusan', $jurusan)->first())
	<!--  -->
	@php($cekmmatpelsosi = DB::table('mata_pelajaran_models')->where('mt_pelajaran', 'SOSIOLOGI')->where('jurusan', $jurusan)->first())
	<!--  -->
	@php($cekmmatpeleko = DB::table('mata_pelajaran_models')->where('mt_pelajaran', 'EKONOMI')->where('jurusan', $jurusan)->first())
	<!--  -->
	@php($cekmmatpelfisika = DB::table('mata_pelajaran_models')->where('mt_pelajaran', 'FISIKA')->where('jurusan', $jurusan)->first())
	<!--  -->
	@php($cekmmatpelkimia = DB::table('mata_pelajaran_models')->where('mt_pelajaran', 'KIMIA')->where('jurusan', $jurusan)->first())
	<!--  -->
	@php($cekmmatpelbiologi = DB::table('mata_pelajaran_models')->where('mt_pelajaran', 'BIOLOGI')->where('jurusan', $jurusan)->first())
	<!--  -->


	@if(@count($cekmmatpelbiologi) > 0)
		@php($cekpilihbiologi = DB::table('pilih_ujian_models')->where('id_mata_pelajaran', $cekmmatpelbiologi->id_mata_pelajaran)->where('id_kelas', $siswa->id_kelas)->where('id_siswa', $siswa->id_siswa)->first())

		@if(@count($cekpilihbiologi) > 0)
		@php($cekjawabanbiologi = DB::table('jawab_models')
		->select(DB::raw('SUM(skor_jawab) as skor'))
		->where('id_ujian', $cekpilihbiologi->id_ujian)
		->where('id_siswa', $siswa->id_siswa)
		->first())
		@php($nilaibiologi =$cekjawabanbiologi->skor)
		@else
			@php($nilaibiologi = 0)
		@endif
	@else
		@php($nilaibiologi = 0)
	@endif
	<!--  -->

	@if(@count($cekmmatpelkimia) > 0)
		@php($cekpilihkimia = DB::table('pilih_ujian_models')->where('id_mata_pelajaran', $cekmmatpelkimia->id_mata_pelajaran)->where('id_kelas', $siswa->id_kelas)->where('id_siswa', $siswa->id_siswa)->first())

		@if(@count($cekpilihkimia) > 0)
		@php($cekjawabankimia = DB::table('jawab_models')
		->select(DB::raw('SUM(skor_jawab) as skor'))
		->where('id_ujian', $cekpilihkimia->id_ujian)
		->where('id_siswa', $siswa->id_siswa)
		->first())
		@php($nilaikimia =$cekjawabankimia->skor)
		@else
			@php($nilaikimia = 0)
		@endif
	@else
		@php($nilaikimia = 0)
	@endif
	<!--  -->


	@if(@count($cekmmatpelfisika) > 0)
		@php($cekpilihfisika = DB::table('pilih_ujian_models')->where('id_mata_pelajaran', $cekmmatpelfisika->id_mata_pelajaran)->where('id_kelas', $siswa->id_kelas)->where('id_siswa', $siswa->id_siswa)->first())

		@if(@count($cekpilihfisika) > 0)
		@php($cekjawabanfisika = DB::table('jawab_models')
		->select(DB::raw('SUM(skor_jawab) as skor'))
		->where('id_ujian', $cekpilihfisika->id_ujian)
		->where('id_siswa', $siswa->id_siswa)
		->first())
		@php($nilaifisika =$cekjawabanfisika->skor)
		@else
			@php($nilaifisika = 0)
		@endif
	@else
		@php($nilaifisika = 0)
	@endif
	<!--  -->

	@if(@count($cekmmatpelbi) > 0)
		@php($cekpilih = DB::table('pilih_ujian_models')->where('id_mata_pelajaran', $cekmmatpelbi->id_mata_pelajaran)->where('id_kelas', $siswa->id_kelas)->where('id_siswa', $siswa->id_siswa)->first())

		@if(@count($cekpilih) > 0)
		@php($cekjawaban = DB::table('jawab_models')
		->select(DB::raw('SUM(skor_jawab) as skor'))
		->where('id_ujian', $cekpilih->id_ujian)
		->where('id_siswa', $siswa->id_siswa)
		->first())
		@php($nilaibi =$cekjawaban->skor)
		@else
			@php($nilaibi = 0)
		@endif
	@else
		@php($nilaibi = 0)
	@endif
	<!--  -->

	@if(@count($cekmmatpelmtk) > 0)
		@php($cekpilihmtk = DB::table('pilih_ujian_models')->where('id_mata_pelajaran', $cekmmatpelmtk->id_mata_pelajaran)->where('id_kelas', $siswa->id_kelas)->where('id_siswa', $siswa->id_siswa)->first())
		@if(@count($cekpilihmtk) > 0)

		
		@php($cekjawabanmtk = DB::table('jawab_models')
		->select(DB::raw('SUM(skor_jawab) as skor'))
		->where('id_ujian', $cekpilihmtk->id_ujian)
		->where('id_siswa', $siswa->id_siswa)
		->first())
		@php($nilaimtk =$cekjawabanmtk->skor)
		@else
			@php($nilaimtk = 0)
		@endif
	@else
		@php($nilaimtk = 0)
	@endif

	@if(@count($cekmmatpelbingg) > 0)
		@php($cekpilihbingg = DB::table('pilih_ujian_models')->where('id_mata_pelajaran', $cekmmatpelbingg->id_mata_pelajaran)->where('id_kelas', $siswa->id_kelas)->where('id_siswa', $siswa->id_siswa)->first())
		@if(@count($cekpilihbingg) > 0)

		
		@php($cekjawabanbingg = DB::table('jawab_models')
		->select(DB::raw('SUM(skor_jawab) as skor'))
		->where('id_ujian', $cekpilihbingg->id_ujian)
		->where('id_siswa', $siswa->id_siswa)
		->first())
		@php($nilaibingg =$cekjawabanbingg->skor)
		@else
			@php($nilaibingg = 0)
		@endif
	@else
		@php($nilaibingg = 0)
	@endif

	@if(@count($cekmmatpelgeog) > 0)
		@php($cekpilihgeog = DB::table('pilih_ujian_models')->where('id_mata_pelajaran', $cekmmatpelgeog->id_mata_pelajaran)->where('id_kelas', $siswa->id_kelas)->where('id_siswa', $siswa->id_siswa)->first())

		@if(@count($cekpilihgeog) > 0)
		@php($cekjawabangeog = DB::table('jawab_models')
		->select(DB::raw('SUM(skor_jawab) as skor'))
		->where('id_ujian', $cekpilihgeog->id_ujian)
		->where('id_siswa', $siswa->id_siswa)
		->first())
		@php($nilaigeog =$cekjawabangeog->skor)
		@else
			@php($nilaigeog = 0)
		@endif
	@else
		@php($nilaigeog = 0)
	@endif
	<!--  -->

	@if(@count($cekmmatpelsosi) > 0)
		@php($cekpilihsosi = DB::table('pilih_ujian_models')->where('id_mata_pelajaran', $cekmmatpelsosi->id_mata_pelajaran)->where('id_kelas', $siswa->id_kelas)->where('id_siswa', $siswa->id_siswa)->first())

		@if(@count($cekpilihsosi) > 0)
		@php($cekjawabansosi = DB::table('jawab_models')
		->select(DB::raw('SUM(skor_jawab) as skor'))
		->where('id_ujian', $cekpilihsosi->id_ujian)
		->where('id_siswa', $siswa->id_siswa)
		->first())
		@php($nilaisosi =$cekjawabansosi->skor)
		@else
			@php($nilaisosi = 0)
		@endif
	@else
		@php($nilaisosi = 0)
	@endif
	<!--  -->

	@if(@count($cekmmatpeleko) > 0)
		@php($cekpiliheko = DB::table('pilih_ujian_models')->where('id_mata_pelajaran', $cekmmatpeleko->id_mata_pelajaran)->where('id_kelas', $siswa->id_kelas)->where('id_siswa', $siswa->id_siswa)->first())

		@if(@count($cekpiliheko) > 0)
		@php($cekjawabaneko = DB::table('jawab_models')
		->select(DB::raw('SUM(skor_jawab) as skor'))
		->where('id_ujian', $cekpiliheko->id_ujian)
		->where('id_siswa', $siswa->id_siswa)
		->first())
		@php($nilaieko =$cekjawabaneko->skor)
		@else
			@php($nilaieko = 0)
		@endif
	@else
		@php($nilaieko = 0)
	@endif
	<!--  -->

	<tr >
		<td>{{ $no++ }}</td>
		<td>{{ $siswa->noujian }}</td>
		<td>{{ $siswa->namadepan.' '.$siswa->namabelakang }}</td>
		<td>
			<center>{{ $nilaibi }}</center>
		</td>
		<td>
			<center>@if($nilaibi >= 65 && $nilaibi <= 100)
			T
			@elseif($nilaibi >= 0 && $nilaibi <= 64)
			BT
			@endif</center>
		</td>
		<td><center>{{ $nilaimtk }}</center></td>
		<td>
			<center>
			@if($nilaimtk >= 65 && $nilaimtk <= 100)
			T
			@elseif($nilaimtk >= 0 && $nilaimtk <= 64)
			BT
			@endif
			</center>
		</td>
		<td><center>{{ $nilaibingg }}</center></td>
		<td>
			<center>
			@if($nilaibingg >= 65 && $nilaibingg <= 100)
			T
			@elseif($nilaibingg >= 0 && $nilaibingg <= 64)
			BT
			@endif
			</center>
		</td>
		@if($jurusan == 'IPS')
		<!--  -->
		<td><center>{{ $nilaieko }}</center></td>
		<td>
			<center>
			@if($nilaieko >= 65 && $nilaieko <= 100)
			T
			@elseif($nilaieko >= 0 && $nilaieko <= 64)
			BT
			@endif
			</center>
		</td>
		<td><center>{{ $nilaisosi }}</center></td>
		<td>
			<center>
			@if($nilaisosi >= 65 && $nilaisosi <= 100)
			T
			@elseif($nilaisosi >= 0 && $nilaisosi <= 64)
			BT
			@endif
			</center>
		</td>
		<td><center>{{ $nilaigeog }}</center></td>
		<td>
			<center>
			@if($nilaigeog >= 65 && $nilaigeog <= 100)
			T
			@elseif($nilaigeog >= 0 && $nilaigeog <= 64)
			BT
			@endif
			</center>
		</td>
		<!--  -->
		<td>{{ $jml = $nilaibi + $nilaimtk + $nilaibingg + $nilaieko + $nilaisosi + $nilaigeog}}</td>
		@elseif($jurusan == 'IPA')
		<!--  -->
		<td><center>{{ $nilaifisika }}</center></td>
		<td>
			<center>
			@if($nilaifisika >= 65 && $nilaifisika <= 100)
			T
			@elseif($nilaifisika >= 0 && $nilaifisika <= 64)
			BT
			@endif
			</center>
		</td>
		<td><center>{{ $nilaikimia }}</center></td>
		<td>
			<center>
			@if($nilaikimia >= 65 && $nilaikimia <= 100)
			T
			@elseif($nilaikimia >= 0 && $nilaikimia <= 64)
			BT
			@endif
			</center>
		</td>
		<td><center>{{ $nilaibiologi }}</center></td>
		<td>
			<center>
			@if($nilaibiologi >= 65 && $nilaibiologi <= 100)
			T
			@elseif($nilaibiologi >= 0 && $nilaibiologi <= 64)
			BT
			@endif
			</center>
		</td>
		<!--  -->
		<td>{{ $jml = $nilaibi + $nilaimtk + $nilaibingg + $nilaifisika + $nilaikimia + $nilaibiologi}}</td>
		@endif
		<td>{{ str_limit($rata2 = $jml/6, 5, '') }}</td>
		<td>1</td>
	</tr>
	@endforeach
	@endforeach
	
</table>
<!-- <script>
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("th")[15];
      y = rows[i + 1].getElementsByTagName("th")[15];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
</script> -->
</div>
</body>
</html>