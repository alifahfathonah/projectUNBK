<script src="{{ asset('/js/store.everything.min.js') }}"></script>
  <script type="text/javascript" src="{{asset('/js/pace.min.js')}}"></script>
<script>
// Set the date we're counting down to
var countDownDate = new Date("{{date('M d, Y H:i:s', strtotime($cekmulai->batas_waktu))}}").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = hours + ":"
  + minutes + ":" + seconds + "";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Waktu Habis";
    document.getElementById('waktu-habis').submit();
  }
}, 1000);


<?php
  $klik = "_".md5($id_ujian.$id_siswa.$soal->no_soal);
?>
var <?=$klik?>;
var vid = document.getElementById("audio");

function SetVolume(val)
{
    vid.volume = val / 100;
}
if(!store.get("<?=$klik?>")){
  store.set("<?=$klik?>", 0);
  <?=$klik?> = 0;
}
else{
  <?=$klik?> = store.get("<?=$klik?>");
}
store.set("<?=$klik?>", <?=$klik?>);
if(<?=$klik?> >= 3)
{
	document.getElementById("play").disabled=true;
}

vid.onended = function() {
      document.getElementById("play").disabled=false;
      document.getElementById("play").style.display='block';
      document.getElementById("play1").style.display='none';
      document.getElementById("pause").style.display='none';
};

// Countdown
vid.addEventListener("timeupdate", function() {
    var ml = parseInt((vid.duration / 60 - vid.currentTime / 60) % 60);
}, false);

// Countup
vid.addEventListener("timeupdate", function() {
    var timeline = document.getElementById('duration');
    var s = parseInt(vid.currentTime % 60);
    var m = parseInt((vid.currentTime / 60) % 60);
    if (s < 10) {
        timeline.innerHTML = m + ':0' + s;
    }
    else {
        timeline.innerHTML = m + ':' + s;
    }
}, false);

function playVid() {
  <?=$klik?>++;
  
  store.set("<?=$klik?>", <?=$klik?>);
  if(<?=$klik?> <= 3)
  {
    document.getElementById("play").style.display='none';
    document.getElementById("pause").style.display='block';
    vid.play();
    
  }
  else{
    document.getElementById("play").disabled=true;
  }
}
function pauseVid() {
    document.getElementById("play").style.display='none';
    document.getElementById("play1").style.display='block';
    document.getElementById("pause").style.display='none';
    vid.pause(); 
}
function playVid1() {
    document.getElementById("play").style.display='none';
    document.getElementById("play1").style.display='none';
    document.getElementById("pause").style.display='block';
    vid.play();
}

</script>