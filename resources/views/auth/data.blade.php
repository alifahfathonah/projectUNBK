@php
if($_SERVER['REQUEST_URI'] == '/home'){
  if($cariper != null)
  {
  	$periode = DB::Table('periode_models')
	  ->orderByDesc('id_periode')
	  ->where('id_periode', $cariper->id_periode)	
	  ->first();
  }
  else
  {
  	$periode = DB::Table('periode_models')
	  ->orderByDesc('id_periode')
	  ->where('status', 1)	
	  ->first();
  }
  if($periode != null)
  {
// start ips
  $datasiswaips = DB::table('data_siswa_models')
  ->join('kelas_m_odels', 'data_siswa_models.id_kelas', '=', 'kelas_m_odels.id_kelas')
  ->where('data_siswa_models.id_periode', $periode->id_periode)
  ->where('kelas_m_odels.jurusan', 'IPS')
  ->count();
  //dd($datasiswaips);
  if($datasiswaips > 0){
    $cekgeografi = DB::table('mata_pelajaran_models')
    ->where('jurusan', 'IPS')
    ->where('mt_pelajaran', 'GEOGRAFI')
    ->count();

    $cekmatematikaips = DB::table('mata_pelajaran_models')
    ->where('jurusan', 'IPS')
    ->where('mt_pelajaran', 'MATEMATIKA')
    ->count();

    $cekbiips = DB::table('mata_pelajaran_models')
    ->where('jurusan', 'IPS')
    ->where('mt_pelajaran', 'BAHASA INDONESIA')
    ->count();

    $cekbinggips = DB::table('mata_pelajaran_models')
    ->where('jurusan', 'IPS')
    ->where('mt_pelajaran', 'BAHASA INGGRIS')
    ->count();

    $cekekoips = DB::table('mata_pelajaran_models')
    ->where('jurusan', 'IPS')
    ->where('mt_pelajaran', 'EKONOMI')
    ->count();

    $ceksosiologiips = DB::table('mata_pelajaran_models')
    ->where('jurusan', 'IPS')
    ->where('mt_pelajaran', 'SOSIOLOGI')
    ->count();

  if($cekgeografi > 0){
  
// start goegrafi
  $geografi = DB::table('jawab_models')
  ->join('ujian_models', 'jawab_models.id_ujian', '=', 'ujian_models.id_ujian')
  ->join('data_siswa_models', 'jawab_models.id_siswa', '=', 'data_siswa_models.id_siswa')
  ->join('mata_pelajaran_models', 'ujian_models.id_mata_pelajaran', '=', 'mata_pelajaran_models.id_mata_pelajaran')
  ->join('kelas_m_odels', 'data_siswa_models.id_kelas', '=', 'kelas_m_odels.id_kelas')
  ->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
  ->where('mata_pelajaran_models.mt_pelajaran', 'GEOGRAFI')
  ->where('mata_pelajaran_models.jurusan', 'IPS')
  ->where('periode_models.id_periode', $periode->id_periode)
  ->groupBy('mata_pelajaran_models.id_mata_pelajaran')
  ->select(DB::raw('SUM(jawab_models.skor_jawab) as skor'))
  ->get();
  $nilaigeografi = 0;
  foreach($geografi as $geografi)
  {
    $nilaigeografi += $geografi->skor;
  }
  if($nilaigeografi == 0 && $datasiswaips == 0)
  {
  	$bagigeografi = 0;
  }
  elseif($nilaigeografi == 0 || $datasiswaips == 0)
  {
  	$bagigeografi = 0;
  }
  else
  {
  	$bagigeografi = $nilaigeografi / $datasiswaips;
  }
 // end geografi
}

if($cekmatematikaips > 0){

// start MATEMATIKA
  $matematikaips = DB::table('jawab_models')
  ->join('ujian_models', 'jawab_models.id_ujian', '=', 'ujian_models.id_ujian')
  ->join('data_siswa_models', 'jawab_models.id_siswa', '=', 'data_siswa_models.id_siswa')
  ->join('mata_pelajaran_models', 'ujian_models.id_mata_pelajaran', '=', 'mata_pelajaran_models.id_mata_pelajaran')
  ->join('kelas_m_odels', 'data_siswa_models.id_kelas', '=', 'kelas_m_odels.id_kelas')
  ->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
  ->where('mata_pelajaran_models.mt_pelajaran', 'MATEMATIKA')
  ->where('mata_pelajaran_models.jurusan', 'IPS')
  ->where('periode_models.id_periode', $periode->id_periode)
  ->groupBy('mata_pelajaran_models.id_mata_pelajaran')
  ->select(DB::raw('SUM(jawab_models.skor_jawab) as skor'))
  ->get();
  $nilaimatematikaips = 0;
  foreach($matematikaips as $matematikaips)
  {
    $nilaimatematikaips += $matematikaips->skor;
  }
  if($nilaimatematikaips == 0 && $datasiswaips == 0)
  {
  	$bagimatematikaips = 0;
  }
  elseif($nilaimatematikaips == 0 || $datasiswaips == 0)
  {
  	$bagimatematikaips = 0;
  }
  else
  {
  	$bagimatematikaips = $nilaimatematikaips / $datasiswaips;
  }
  
 // end MATEMATIKA
}

  if($cekbiips > 0){

 // start BAHASA INDONESIA
  $biips = DB::table('jawab_models')
  ->join('ujian_models', 'jawab_models.id_ujian', '=', 'ujian_models.id_ujian')
  ->join('data_siswa_models', 'jawab_models.id_siswa', '=', 'data_siswa_models.id_siswa')
  ->join('mata_pelajaran_models', 'ujian_models.id_mata_pelajaran', '=', 'mata_pelajaran_models.id_mata_pelajaran')
  ->join('kelas_m_odels', 'data_siswa_models.id_kelas', '=', 'kelas_m_odels.id_kelas')
  ->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
  ->where('mata_pelajaran_models.mt_pelajaran', 'BAHASA INDONESIA')
  ->where('mata_pelajaran_models.jurusan', 'IPS')
  ->where('periode_models.id_periode', $periode->id_periode)
  ->groupBy('mata_pelajaran_models.id_mata_pelajaran')
  ->select(DB::raw('SUM(jawab_models.skor_jawab) as skor'))
  ->get();
  $nilaibiips = 0;
  foreach($biips as $biips)
  {
    $nilaibiips += $biips->skor;
  }
  if($nilaibiips == 0 && $datasiswaips == 0)
  {
  	$bagibiips = 0;
  }
  elseif($nilaibiips == 0 || $datasiswaips == 0)
  {
  	$bagibiips = 0;
  }
  else
  {
  	$bagibiips = $nilaibiips / $datasiswaips;
  }
  

 // end BAHASA INDONESIA
}

if($cekbinggips > 0){

 // start BAHASA INGGRIS
  $binggips = DB::table('jawab_models')
  ->join('ujian_models', 'jawab_models.id_ujian', '=', 'ujian_models.id_ujian')
  ->join('data_siswa_models', 'jawab_models.id_siswa', '=', 'data_siswa_models.id_siswa')
  ->join('mata_pelajaran_models', 'ujian_models.id_mata_pelajaran', '=', 'mata_pelajaran_models.id_mata_pelajaran')
  ->join('kelas_m_odels', 'data_siswa_models.id_kelas', '=', 'kelas_m_odels.id_kelas')
  ->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
  ->where('mata_pelajaran_models.mt_pelajaran', 'BAHASA INGGRIS')
  ->where('mata_pelajaran_models.jurusan', 'IPS')
  ->where('periode_models.id_periode', $periode->id_periode)
  ->groupBy('mata_pelajaran_models.id_mata_pelajaran')
  ->select(DB::raw('SUM(jawab_models.skor_jawab) as skor'))
  ->get();
  $nilaibinggips = 0;
  foreach($binggips as $binggips)
  {
    $nilaibinggips += $binggips->skor;
  }

  if($nilaibinggips == 0 && $datasiswaips == 0)
  {
  	$bagibinggips = 0;
  }
  elseif($nilaibinggips == 0 || $datasiswaips == 0)
  {
  	$bagibinggips = 0;
  }
  else
  {
  	$bagibinggips = $nilaibinggips / $datasiswaips;
  }
  
 // end BAHASA INGGRIS
}

 if($cekekoips > 0){

 // start EKONOMI
  $ekoips = DB::table('jawab_models')
  ->join('ujian_models', 'jawab_models.id_ujian', '=', 'ujian_models.id_ujian')
  ->join('data_siswa_models', 'jawab_models.id_siswa', '=', 'data_siswa_models.id_siswa')
  ->join('mata_pelajaran_models', 'ujian_models.id_mata_pelajaran', '=', 'mata_pelajaran_models.id_mata_pelajaran')
  ->join('kelas_m_odels', 'data_siswa_models.id_kelas', '=', 'kelas_m_odels.id_kelas')
  ->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
  ->where('mata_pelajaran_models.mt_pelajaran', 'EKONOMI')
  ->where('mata_pelajaran_models.jurusan', 'IPS')
  ->where('periode_models.id_periode', $periode->id_periode)
  ->groupBy('mata_pelajaran_models.id_mata_pelajaran')
  ->select(DB::raw('SUM(jawab_models.skor_jawab) as skor'))
  ->get();
  $nilaiekoips = 0;
  foreach($ekoips as $ekoips)
  {
    $nilaiekoips += $ekoips->skor;
  }

  if($nilaiekoips == 0 && $datasiswaips == 0)
  {
  	$bagiekoips = 0;
  }
  elseif($nilaiekoips == 0 || $datasiswaips == 0)
  {
  	$bagiekoips = 0;
  }
  else
  {
  	$bagiekoips = $nilaiekoips / $datasiswaips;
  }
  
 // end EKONOMI
}

 if($ceksosiologiips > 0){
 // start SOSIOLOGI
  $sosiologiips = DB::table('jawab_models')
  ->join('ujian_models', 'jawab_models.id_ujian', '=', 'ujian_models.id_ujian')
  ->join('data_siswa_models', 'jawab_models.id_siswa', '=', 'data_siswa_models.id_siswa')
  ->join('mata_pelajaran_models', 'ujian_models.id_mata_pelajaran', '=', 'mata_pelajaran_models.id_mata_pelajaran')
  ->join('kelas_m_odels', 'data_siswa_models.id_kelas', '=', 'kelas_m_odels.id_kelas')
  ->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
  ->where('mata_pelajaran_models.mt_pelajaran', 'SOSIOLOGI')
  ->where('mata_pelajaran_models.jurusan', 'IPS')
  ->where('periode_models.id_periode', $periode->id_periode)
  ->groupBy('mata_pelajaran_models.id_mata_pelajaran')
  ->select(DB::raw('SUM(jawab_models.skor_jawab) as skor'))
  ->get();
  $nilaisosiologiips = 0;
  foreach($sosiologiips as $sosiologiips)
  {
    $nilaisosiologiips += $sosiologiips->skor;
  }

  if($nilaisosiologiips == 0 && $datasiswaips == 0)
  {
  	$bagisosiologiips = 0;
  }
  if($nilaisosiologiips == 0 || $datasiswaips == 0)
  {
  	$bagisosiologiips = 0;
  }
  else
  {
  	 $bagisosiologiips = $nilaisosiologiips / $datasiswaips;
  }
 
 // end SOSIOLOGI
}
}
 // end ips

 // start ipa
 	$datasiswaipa = DB::table('data_siswa_models')
	  ->join('kelas_m_odels', 'data_siswa_models.id_kelas', '=', 'kelas_m_odels.id_kelas')
	  ->where('data_siswa_models.id_periode', $periode->id_periode)
	  ->where('kelas_m_odels.jurusan', 'IPA')
	  ->count();
if($datasiswaipa > 0){

    $cekmatematikaipa = DB::table('mata_pelajaran_models')
    ->where('jurusan', 'IPA')
    ->where('mt_pelajaran', 'MATEMATIKA')
    ->count();

    $cekbiipa = DB::table('mata_pelajaran_models')
    ->where('jurusan', 'IPA')
    ->where('mt_pelajaran', 'BAHASA INDONESIA')
    ->count();

    $cekbinggipa = DB::table('mata_pelajaran_models')
    ->where('jurusan', 'IPA')
    ->where('mt_pelajaran', 'BAHASA INGGRIS')
    ->count();

    $cekfisikaipa = DB::table('mata_pelajaran_models')
    ->where('jurusan', 'IPA')
    ->where('mt_pelajaran', 'FISIKA')
    ->count();

    $cekkimiaipa = DB::table('mata_pelajaran_models')
    ->where('jurusan', 'IPA')
    ->where('mt_pelajaran', 'KIMIA')
    ->count();

    $cekbiologiipa = DB::table('mata_pelajaran_models')
    ->where('jurusan', 'IPA')
    ->where('mt_pelajaran', 'BIOLOGI')
    ->count();

    if($cekmatematikaipa > 0){


	 // start MATEMATIKA
	  $matematikaipa = DB::table('jawab_models')
	  ->join('ujian_models', 'jawab_models.id_ujian', '=', 'ujian_models.id_ujian')
	  ->join('data_siswa_models', 'jawab_models.id_siswa', '=', 'data_siswa_models.id_siswa')
	  ->join('mata_pelajaran_models', 'ujian_models.id_mata_pelajaran', '=', 'mata_pelajaran_models.id_mata_pelajaran')
	  ->join('kelas_m_odels', 'data_siswa_models.id_kelas', '=', 'kelas_m_odels.id_kelas')
	  ->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
	  ->where('mata_pelajaran_models.mt_pelajaran', 'MATEMATIKA')
	  ->where('mata_pelajaran_models.jurusan', 'IPA')
	  ->where('periode_models.id_periode', $periode->id_periode)
	  ->groupBy('mata_pelajaran_models.id_mata_pelajaran')
	  ->select(DB::raw('SUM(jawab_models.skor_jawab) as skor'))
	  ->get();
	  $nilaimatematikaipa = 0;
	  foreach($matematikaipa as $matematikaipa)
	  {
	    $nilaimatematikaipa += $matematikaipa->skor;
	  }
	  if($nilaimatematikaipa == 0 && $datasiswaipa == 0)
	  {
	  	$bagimatematikaipa = 0;
	  }
	  elseif($nilaimatematikaipa == 0 || $datasiswaipa == 0)
	  {
	  	$bagimatematikaipa = 0;
	  }
	  else
	  {
	  	 $bagimatematikaipa = $nilaimatematikaipa / $datasiswaipa;
	  }
	 // end MATEMATIKA
}

if($cekbiipa > 0){

	 // start BAHASA INDONESIA
	  $biipa = DB::table('jawab_models')
	  ->join('ujian_models', 'jawab_models.id_ujian', '=', 'ujian_models.id_ujian')
	  ->join('data_siswa_models', 'jawab_models.id_siswa', '=', 'data_siswa_models.id_siswa')
	  ->join('mata_pelajaran_models', 'ujian_models.id_mata_pelajaran', '=', 'mata_pelajaran_models.id_mata_pelajaran')
	  ->join('kelas_m_odels', 'data_siswa_models.id_kelas', '=', 'kelas_m_odels.id_kelas')
	  ->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
	  ->where('mata_pelajaran_models.mt_pelajaran', 'BAHASA INDONESIA')
	  ->where('mata_pelajaran_models.jurusan', 'IPA')
	  ->where('periode_models.id_periode', $periode->id_periode)
	  ->groupBy('mata_pelajaran_models.id_mata_pelajaran')
	  ->select(DB::raw('SUM(jawab_models.skor_jawab) as skor'))
	  ->get();
	  $nilaibiipa = 0;
	  foreach($biipa as $biipa)
	  {
	    $nilaibiipa += $biipa->skor;
	  }

	  if($nilaibiipa == 0 && $datasiswaipa == 0)
	  {
	  	$bagibiipa = 0;
	  }
	  elseif($nilaibiipa == 0 || $datasiswaipa == 0)
	  {
	  	$bagibiipa = 0;
	  }
	  else
	  {
	  	  $bagibiipa = $nilaibiipa / $datasiswaipa;
	  }
	 

	 // end BAHASA INDONESIA
}

  if($cekbinggipa > 0){

	 // start BAHASA INGGRIS
	  $binggipa = DB::table('jawab_models')
	  ->join('ujian_models', 'jawab_models.id_ujian', '=', 'ujian_models.id_ujian')
	  ->join('data_siswa_models', 'jawab_models.id_siswa', '=', 'data_siswa_models.id_siswa')
	  ->join('mata_pelajaran_models', 'ujian_models.id_mata_pelajaran', '=', 'mata_pelajaran_models.id_mata_pelajaran')
	  ->join('kelas_m_odels', 'data_siswa_models.id_kelas', '=', 'kelas_m_odels.id_kelas')
	  ->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
	  ->where('mata_pelajaran_models.mt_pelajaran', 'BAHASA INGGRIS')
	  ->where('mata_pelajaran_models.jurusan', 'IPA')
	  ->where('periode_models.id_periode', $periode->id_periode)
	  ->groupBy('mata_pelajaran_models.id_mata_pelajaran')
	  ->select(DB::raw('SUM(jawab_models.skor_jawab) as skor'))
	  ->get();
	  $nilaibinggipa = 0;
	  foreach($binggipa as $binggipa)
	  {
	    $nilaibinggipa += $binggipa->skor;
	  }

	  if($nilaibinggipa == 0 && $datasiswaipa == 0)
	  {
	  	$bagibinggipa = 0;
	  }
	  elseif($nilaibinggipa == 0 || $datasiswaipa == 0)
	  {
	  	$bagibinggipa = 0;
	  }
	  else
	  {
	  	  $bagibinggipa = $nilaibinggipa / $datasiswaipa;
	  }
	  
	 // end BAHASA INGGRIS
}

 if($cekfisikaipa > 0){


	 // start FISIKA
	  $fisikaipa = DB::table('jawab_models')
	  ->join('ujian_models', 'jawab_models.id_ujian', '=', 'ujian_models.id_ujian')
	  ->join('data_siswa_models', 'jawab_models.id_siswa', '=', 'data_siswa_models.id_siswa')
	  ->join('mata_pelajaran_models', 'ujian_models.id_mata_pelajaran', '=', 'mata_pelajaran_models.id_mata_pelajaran')
	  ->join('kelas_m_odels', 'data_siswa_models.id_kelas', '=', 'kelas_m_odels.id_kelas')
	  ->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
	  ->where('mata_pelajaran_models.mt_pelajaran', 'FISIKA')
	  ->where('mata_pelajaran_models.jurusan', 'IPA')
	  ->where('periode_models.id_periode', $periode->id_periode)
	  ->groupBy('mata_pelajaran_models.id_mata_pelajaran')
	  ->select(DB::raw('SUM(jawab_models.skor_jawab) as skor'))
	  ->get();
	  $nilaifisikaipa = 0;
	  foreach($fisikaipa as $fisikaipa)
	  {
	    $nilaifisikaipa += $fisikaipa->skor;
	  }

	  if($nilaifisikaipa == 0 && $datasiswaipa == 0)
	  {
	  	$bagifisikaipa = 0;
	  }
	  elseif($nilaifisikaipa == 0 || $datasiswaipa == 0)
	  {
	  	$bagifisikaipa = 0;
	  }
	  else
	  {
	  	  $bagifisikaipa = $nilaifisikaipa / $datasiswaipa;
	  }

	  
	 // end FISIKA
}

 if($cekkimiaipa > 0){

	 // start KIMIA
	  $kimiaipa = DB::table('jawab_models')
	  ->join('ujian_models', 'jawab_models.id_ujian', '=', 'ujian_models.id_ujian')
	  ->join('data_siswa_models', 'jawab_models.id_siswa', '=', 'data_siswa_models.id_siswa')
	  ->join('mata_pelajaran_models', 'ujian_models.id_mata_pelajaran', '=', 'mata_pelajaran_models.id_mata_pelajaran')
	  ->join('kelas_m_odels', 'data_siswa_models.id_kelas', '=', 'kelas_m_odels.id_kelas')
	  ->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
	  ->where('mata_pelajaran_models.mt_pelajaran', 'KIMIA')
	  ->where('mata_pelajaran_models.jurusan', 'IPA')
	  ->where('periode_models.id_periode', $periode->id_periode)
	  ->groupBy('mata_pelajaran_models.id_mata_pelajaran')
	  ->select(DB::raw('SUM(jawab_models.skor_jawab) as skor'))
	  ->get();
	  $nilaikimiaipa = 0;
	  foreach($kimiaipa as $kimiaipa)
	  {
	    $nilaikimiaipa += $kimiaipa->skor;
	  }
	  if($nilaikimiaipa == 0 && $datasiswaipa == 0)
	  {
	  	$bagikimiaipa = 0;
	  }
	  elseif($nilaikimiaipa == 0 || $datasiswaipa == 0)
	  {
	  	$bagikimiaipa = 0;
	  }
	  else
	  {
	  	 $bagikimiaipa = $nilaikimiaipa / $datasiswaipa;
	  }
	  
	 // end KIMIA
}

  if($cekbiologiipa > 0){
	 // start BIOLOGI
	  $biologiipa = DB::table('jawab_models')
	  ->join('ujian_models', 'jawab_models.id_ujian', '=', 'ujian_models.id_ujian')
	  ->join('data_siswa_models', 'jawab_models.id_siswa', '=', 'data_siswa_models.id_siswa')
	  ->join('mata_pelajaran_models', 'ujian_models.id_mata_pelajaran', '=', 'mata_pelajaran_models.id_mata_pelajaran')
	  ->join('kelas_m_odels', 'data_siswa_models.id_kelas', '=', 'kelas_m_odels.id_kelas')
	  ->join('periode_models', 'data_siswa_models.id_periode', '=', 'periode_models.id_periode')
	  ->where('mata_pelajaran_models.mt_pelajaran', 'BIOLOGI')
	  ->where('mata_pelajaran_models.jurusan', 'IPA')
	  ->where('periode_models.id_periode', $periode->id_periode)
	  ->groupBy('mata_pelajaran_models.id_mata_pelajaran')
	  ->select(DB::raw('SUM(jawab_models.skor_jawab) as skor'))
	  ->get();
	  $nilaibiologipa = 0;
	  foreach($biologiipa as $biologiipa)
	  {
	    $nilaibiologipa += $biologiipa->skor;
	  }
	  if($nilaibiologipa == 0 && $datasiswaipa == 0)
	  {
	  	$bagibiologiipa = 0;
	  }
	  elseif($nilaibiologipa == 0 || $datasiswaipa == 0)
	  {
	  	$bagibiologiipa = 0;
	  }
	  else
	  {
	  	 $bagibiologiipa = $nilaibiologipa / $datasiswaipa;
	  }
	  
	  
	 // end BIOLOGI
}


 // end ipa
 }
}
}
@endphp
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example3').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    $('.select2').select2()
    // $('.textarea').wysihtml5()
    @if($_SERVER['REQUEST_URI'] == '/home' && $periode != null)
    @if($datasiswaipa > 0)
    var bar = new Morris.Bar({
      element: 'bar-chart-ipa',
      resize: true,
      data: [
        {
          y: 'Bahasa Indonesia',
          a: <?= ($cekbiipa > 0) ?  $bagibiipa :  0; ?>
        },
        {
          y: 'Matematika', 
          a: <?= ($cekmatematikaipa > 0) ? $bagimatematikaipa : 0;?>
        },
        {
          y: 'Bahasa Inggris', 
          a: <?= ($cekbinggipa > 0) ? $bagibinggipa : 0; ?>
        },
        {
          y: 'Fisika', 
          a: <?= ($cekfisikaipa > 0) ? $bagifisikaipa : 0; ?>
        },
        {
          y: 'Kimia', 
          a: <?= ($cekkimiaipa > 0) ? $bagikimiaipa : 0; ?>
        },
        {
          y: 'Biologi', 
          a: <?=  ($cekbiologiipa > 0) ? $bagibiologiipa : 0; ?>
        },
      ],
      barColors: ['#00a65a'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Rata-rata'],
      hideHover: 'auto'
    });
    @endif
    @if($datasiswaips > 0)
    var bar = new Morris.Bar({
      element: 'bar-chart-ips',
      resize: true,
      data: [
        {
          y: 'Bahasa Indonesia', 
          a: <?= ($cekbiips > 0) ? $bagibiips : 0; ?>
        },
        {
          y: 'Matematika', 
          a: <?= ($cekmatematikaips > 0) ? $bagimatematikaips : 0; ?>
        },
        {
          y: 'Bahasa Inggris', 
          a: <?= ($cekbinggips > 0) ? $bagibinggips : 0;?>
        },
        {
          y: 'Ekonomi', 
          a: <?= ($cekekoips > 0) ? $bagiekoips : 0; ?>
        },
        {
          y: 'Sesiologi', 
          a: <?= ($ceksosiologiips > 0) ? $bagisosiologiips : 0; ?>
        },
        {
          y: 'Geografi', 
          a: <?= ($cekgeografi > 0) ? $bagigeografi : 0; ?>
        },
      ],
      barColors: ['#dd4b39'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Rata-rata'],
      hideHover: 'auto'
    });
    @endif
    @endif
  })
</script>