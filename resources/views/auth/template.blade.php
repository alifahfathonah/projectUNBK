<!DOCTYPE html>
<html style="height: auto; min-height: 100%;"><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminUNBK | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('/admin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/admin/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('/admin/dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('/admin/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('/admin/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/admin/bower_components/select2/dist/css/select2.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;box-sizing: content-box;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>

<script src="{{asset('/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/ckeditor/ckeditor.js')}}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<body class="skin-blue sidebar-mini wysihtml5-supported" style="height: auto; min-height: 100%;">
<div class="wrapper" style="height: auto; min-height: 100%;">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>UNBK</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>UNBK</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
     
   

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoT7KJMXKxvuXMHn05K5OlWjFYmmFHfdr_nvgC4ogorgFbtICdgg" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRoT7KJMXKxvuXMHn05K5OlWjFYmmFHfdr_nvgC4ogorgFbtICdgg" class="img-circle" alt="User Image">

                <p>
                  {{ auth()->user()->name }}
                 
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('/home/profil/sekolah') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                     </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">Home</li>
         <li class="{{ $add == 'Dashboard' ? 'active' : ''}}">
          <a href="{{url('/home')}}">
            <i class="fa fa-dashboard"></i> <span>Dashborad</span>
          </a>
        </li>
        @php($cekprofil = DB::table('profil_sekolah_models')->count())
        @if($cekprofil > 0)
        <li class="{{ $add == 'Input' ? 'active' : ''}}">
          <a href="{{url('/home/input')}}">
            <i class="fa fa-download"></i> <span>Input Data</span>
          </a>
        </li>
      <li class="{{ $add == 'Editor' ? 'active' : ''}}">
          <a href="{{url('/home/editor')}}" target="_blank" >
            <i class="fa fa-copy"></i> <span>
              Editor
            </span>
          </a>
        </li>
       <li class="{{ $add == 'Periode' ? 'active' : ''}}">
          <a href="{{url('/home/periode')}}">
            <i class="fa fa-copy"></i> <span>
              Periode
            </span>
          </a>
        </li>
      <li class="{{ $add == 'Mata Ujian' ? 'active' : ''}}">
          <a href="{{url('/home/mata/ujian')}}">
            <i class="fa fa-copy"></i> <span>
              Mata Ujian
            </span>
          </a>
        </li>
         <li class="treeview {{ ($add == 'Siswa') || ($add == 'Daftar Peserta') ? 'active menu-open' : ''}}" >
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Siswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" >
            <li class="{{ $add == 'Siswa' ? 'active' : ''}}"><a href="{{url('/home/input/siswa')}}"><i class="fa fa-circle-o"></i> Input Siswa</a></li>
            <li class="{{ $add == 'Daftar Peserta' ? 'active' : ''}}"><a href="{{url('/home/daftar/peserta')}}"><i class="fa fa-circle-o"></i> Daftar Peserta</a></li>
          </ul>
        </li>
        <li class="treeview {{ ($add == 'Home Soal') || ($add == 'Input Soal') ? 'active menu-open' : ''}}" style="height: auto;">
          <a href="#">
            <i class="fa fa-copy"></i>
            <span>Menu Ujian</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ $add == 'Home Soal' ? 'active' : ''}}"><a href="{{url('/home/ujian')}}"><i class="fa fa-circle-o"></i>Input Ujian</a></li>
            <li class="{{ $add == 'Input Soal' ? 'active' : ''}}"><a href="{{url('/home/soal')}}"><i class="fa fa-circle-o"></i> Soal</a></li>
          </ul>
        </li>
        <li class="{{ $add == 'Token' ? 'active' : ''}}">
          <a href="{{url('/home/token')}}">
            <i class="fa fa-key"></i> <span>
              Token
            </span>
          </a>
        </li>
        <li class="{{ $add == 'Aktifkan Test' ? 'active' : ''}}">
          <a href="{{url('/home/aktifkan/test')}}">
            <i class="fa fa-power-off"></i> <span>
              Aktifkan Test
            </span>
          </a>
        </li>
         <li class="{{ $add == 'Aktifkan Nilai' ? 'active' : ''}}">
          <a href="{{url('/home/aktifkan/nilai')}}">
            <i class="fa fa-power-off"></i> <span>
              Aktifkan Nilai
            </span>
          </a>
        </li>
          <li class="{{ $add == 'Cetak Kartu' ? 'active' : ''}}">
          <a href="{{url('/home/cetak/kartu')}}">
            <i class="fa fa-print"></i> <span>
          Cetak Kartu
            </span>
          </a>
        </li>
        <li class="{{ $add == 'Report Test' ? 'active' : ''}}">
          <a href="{{url('/home/report/test')}}">
            <i class="fa fa-newspaper-o"></i> <span>
        Report test
            </span>
          </a>
        </li>
        <li class="{{ $add == 'Beckup Data' ? 'active' : ''}}">
          <a href="{{url('/home/beckup/data')}}">
             <i class="fa fa-cloud-download"></i>
        Beckup data
            </span>
          </a>
        </li>
        <li class="{{ $add == 'Hapus Data' ? 'active' : ''}}">
          <a href="{{url('/home/hapus/data')}}">
             <i class="fa fa-trash"></i>
        Hapus data
            </span>
          </a>
        </li>
        <li class="{{ $add == 'Restore Data' ? 'active' : ''}}">
          <a href="{{url('/home/restore/data')}}">
              <i class="fa fa-refresh"></i>
        Restore data
            </span>
          </a>
        </li>
        @endif
         </li>
          <li class="{{ $add == 'Data Sekolah' ? 'active' : ''}}">
          <a href="{{url('/home/profil/sekolah')}}">
            <i class="fa fa-user"></i> <span>
          Profil Sekolah
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 902.8px;">
    <!-- Content Header (Page header) -->
        <section class="content-header">
      <h1>
        {{ $add }}
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{$add}}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    @include('pesan')
    @yield('mainadmin')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright © 2019-{{ date('Y') }} Mediatama, Herisvan Hendra.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/admin/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('/admin/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('/admin/bower_components/morris.js/morris.min.js')}}"></script>

<script src="{{ asset('/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/admin/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('/admin/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('/admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/admin/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('/admin/dist/js/demo.js')}}"></script>

<script src="{{asset('/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
@include('auth.data')
</body></html>