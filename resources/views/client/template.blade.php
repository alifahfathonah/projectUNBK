<!DOCTYPE html>
<html>
<head>
  <title>Selamat Ujian</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('/css/w3.css') }}">
  <link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
  <script type="text/javascript" src="{{asset('/js/app.js')}}"></script>
  <link rel="stylesheet" href="{{asset('/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/css/style.css')}}">
  <!-- <script type="text/javascript" src="{{asset('/js/style.js')}}"></script> -->
  <script src="{{asset('/js/sweetalert.min.js')}}"></script>

  
</head>
<body>
  <div class="wrapper">
    <div class="w3-bar w3-indigo ">
      <div style="float: left; width: 200px; ">
       <img src="{{ asset('/img/4924de679121202.png') }}" style="width:80px; height:80px">
     </div>
     <div style="float: right; width: 280px; padding: 5px; background: #2f2f2f ">
      <img  src="{{ asset('/img/images.png') }}" style="width:80px;height: 80px; margin-right:10px" align="left" >
      <h6 style="padding-top: 3px">Selamat datang</h6>
      @guest
      <h6>Home Login</h6>
      @else
       <h6>{{ str_limit(Auth::user()->name, 15, '...') }}</h6>
      <a href="{{ url('/client/logout') }}">logout</a>
      @endguest
     </div>
     
   </div>
   <br><br>
   <div >
    <div class="container">
      @include('pesanswal')
    </div>
    @yield('mainclient')
  </div>
</div>
<script>
  function openNav() {
    document.getElementById("myNav").style.width = "23%";
  }

  function closeNav() {
    document.getElementById("myNav").style.width = "0%";
  }
  function myFunctionA() {
  document.getElementById("myP").style.fontSize = "12pt";
  document.getElementById("imgsoal").style.width = "30%";
  document.getElementById("imgsoala").style.width = "65%";
  document.getElementById("imgsoalb").style.width = "65%";
  document.getElementById("imgsoalc").style.width = "65%";
  document.getElementById("imgsoald").style.width = "65%";
  document.getElementById("imgsoale").style.width = "65%";
  }
  function myFunctionAA() {
  document.getElementById("myP").style.fontSize = "large";
  document.getElementById("imgsoal").style.width = "70%";
  document.getElementById("imgsoala").style.width = "65%";
  document.getElementById("imgsoalb").style.width = "65%";
  document.getElementById("imgsoalc").style.width = "65%";
  document.getElementById("imgsoald").style.width = "65%";
  document.getElementById("imgsoale").style.width = "65%";
  }
  function myFunctionAAA() {
  document.getElementById("myP").style.fontSize = "x-large";
  document.getElementById("imgsoal").style.width = "85%";
  document.getElementById("imgsoala").style.width = "80%";
  document.getElementById("imgsoalb").style.width = "80%";
  document.getElementById("imgsoalc").style.width = "80%";
  document.getElementById("imgsoald").style.width = "80%";
  document.getElementById("imgsoale").style.width = "80%";
  }
  function myFunctionAAAA() {
  document.getElementById("myP").style.fontSize = "xx-large";
  document.getElementById("imgsoal").style.width = "100%";
  document.getElementById("imgsoala").style.width = "100%";
  document.getElementById("imgsoalb").style.width = "100%";
  document.getElementById("imgsoalc").style.width = "100%";
  document.getElementById("imgsoald").style.width = "100%";
  document.getElementById("imgsoale").style.width = "100%";
  }
</script>
</body>
</html>