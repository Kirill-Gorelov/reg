<!DOCTYPE html>
<html>
<body>
<!--увеличивает скорость воспроизведения -->
 <button onclick="setCurTime()" type="button">начать воспроизведение с 50 сек</button><br>
<audio id="myVideo" controls>
  <source src="https://cs1-37v4.vk-cdn.net/p9/2fe59e129f6d5c.mp3" type="audio/mp3">
  Your browser does not support HTML5 video.
</audio >
<p>Текущая позиция: <span id="demo1"></span></p>
<p>все время: <span id="demo11"></span></p>
<br>



 <button onclick="setCurTime2()" type="button">начать воспроизведение с 331 сек</button><br>
<audio id="myVideo2" controls>
  <source src="https://psv4.vk.me/c6186/u101964415/audios/682fa889549a.mp3" type="audio/mp3">
  Your browser does not support HTML5 video.
</audio >
<p>Текущая позиция: <span id="demo2"></span></p>
<p>все время: <span id="demo22"></span></p>
<br>

 <button onclick="setCurTime3()" type="button">начать воспроизведение с 331 сек</button><br>
<audio id="myVideo3" controls>
  <source src="https://psv4.vk.me/c536216/u101964415/audios/1811032c6f08.mp3" type="audio/mp3">
  Your browser does not support HTML5 video.
</audio >
<p>Текущая позиция: <span id="demo3"></span></p>
<p>все время: <span id="demo33"></span></p>


<form>
  <input id="pbr" type="range" value="1" min="0.5" max="4" step="0.1" >
  <p>Ускорение <span id="currentPbr">1</span></p>
<input id="demo12" type="text" value="1" >
<input id="cdd" type="text" value="1" >
</form>
<script>

var vid = document.getElementById("myVideo");
var vid2 = document.getElementById("myVideo2");
var vid3 = document.getElementById("myVideo3");


vid.ontimeupdate = function() {myFunction()};
function myFunction() {
    // Display the current position of the video in a p element with id="demo"
    document.getElementById("demo1").innerHTML = vid.currentTime;
document.getElementById("demo12").value = vid.currentTime;
document.getElementById("demo11").innerHTML = vid.duration;

}
vid2.ontimeupdate = function() {myFunction2()};
function myFunction2() {
    // Display the current position of the video in a p element with id="demo"

    document.getElementById("demo2").innerHTML = vid2.currentTime;
document.getElementById("demo22").innerHTML = vid2.duration;

}

vid3.ontimeupdate = function() {myFunction3()};
function myFunction3() {
    // Display the current position of the video in a p element with id="demo"

    document.getElementById("demo3").innerHTML = vid3.currentTime;
document.getElementById("demo33").innerHTML = vid3.duration;

}


function setCurTime() { // продолжить с определенного времени
    vid.currentTime=3318;
}
function setCurTime2() { // продолжить с определенного времени
    vid2.currentTime=331;
}
function setCurTime3() { // продолжить с определенного времени
    vid3.currentTime=531;
}
</script>

<script>
//ускорение воспроизведения
window.onload = function () {
 
  var v = document.getElementById("myVideo");
var vv = document.getElementById("myVideo2");
var v3 = document.getElementById("myVideo3");
  var p = document.getElementById("pbr");
  var c = document.getElementById("currentPbr");

  p.addEventListener('input',function(){
    c.innerHTML = p.value;
    v.playbackRate = p.value;
vv.playbackRate = p.value;
v3.playbackRate = p.value;
  },false);

};
</script>



</body>
</html>