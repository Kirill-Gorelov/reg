<?php
session_start(); // Стартуем сессию
 if (!isset($_SESSION['login']) && !isset($_SESSION['id'])){ // если в сессии загружены логин и id
	header('Location: login.php');
exit;
} 
// $start = microtime(true); //начало измерения
//          $end = microtime(true); //конец измерения
// echo "Время выполнения скрипта: ".($end - $start); //вывод результата
$connection = mysqli_connect('localhost', 'audiname', 'pass', 'audiobook') or die(mysqli_error());   


?>
<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
	
	<!-- pleer -->
	<link rel="stylesheet" href="assets/css/audioplayer.css" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
	  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	
  <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<!-- <script src="assets/js/online.js"></script> -->
<!-- <script src="assets/js/audioplayer.js"></script> -->
<script>
    $(document).ready(function() { 
        $("audio").audioPlayer(); 
    });
</script>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="dashboard.php" class="simple-text">
                    <? echo $_SESSION['login'];	?>
                </a>
            </div>

            <ul class="nav">
                <li >
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Главная</p>
                    </a>
                </li>
                <li class="active">
                    <a href="add.php">
                        <i class="pe-7s-user"></i>
                        <p>Добавить книгу</p>
                    </a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="pe-7s-note2"></i>
                        <p>Мой аккаунт</p>
                    </a>
                </li>
                <li>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="pe-7s-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               Account
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
				    <div id="player"></div>
<br>  					
<button onclick="play()" type="button">play</button>   
<button onclick="stop()" type="button">stop</button>   
<button onclick="pause()" type="button">pause</button>   
<br>  
<button onclick="pl5()" type="button">+5</button>   
<button onclick="pl10()" type="button">+10</button>   
<button onclick="pl30()" type="button">+30</button>   
<button onclick="pl60()" type="button">+мин</button>   
<br>
<button onclick="min5()" type="button">-5</button>   
<button onclick="min10()" type="button">-10</button>   
<button onclick="min30()" type="button">-30</button>   
<button onclick="min60()" type="button">-мин</button>   
<br>  
 <input id="pbr" type="range" value="1" min="0.5" max="4" step="0.1" > 
  <p>Ускорение <span id="currentPbr">1</span></p> 
				</div>
				<?php

        // print_r($_GET);
					   $idknigi = $_GET['id'];
	   $idlink = $_GET['link'];
	   $authorid = $_SESSION['login']; //id того кто добавляет книгу
	   $login = $_SESSION['id'];
     mysqli_set_charset($connection, "utf8");
$query = mysqli_query($connection, "SELECT `links`, `stoping`, `title_links`, `comment`, `id` FROM `link` WHERE `id_knigi` = '$idknigi' AND `id` = '$idlink'"); 
$all_arr1 = mysqli_fetch_array($query);
 // var_dump($all_arr1);

				?>
				<script>   
      // 2. This code loads the IFrame Player API code asynchronously.   
      var tag = document.createElement('script');   
   
   
      tag.src = "https://www.youtube.com/iframe_api";   
      var firstScriptTag = document.getElementsByTagName('script')[0];   
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);   
   
   
      // 3. This function creates an <iframe> (and YouTube player)   
      //    after the API code downloads.   
      var player;   
   
      function onYouTubeIframeAPIReady() {   
        player = new YT.Player('player', {   
             
          height: '390',   
          width: '640',   
          videoId: '<?php echo $all_arr1['links']; ?>',   
		  // playerVars: { 'controls': 0 },
           events: {   
            'onReady': onPlayerReady,   
             'onStateChange': onPlayerStateChange   
          }   
        });   
      }   
  
  
   
      // 4. The API will call this function when the video player is ready.   
      function onPlayerReady(event) {   
      //  event.target.playVideo();   
           event.target.seekTo(<?php echo $all_arr1['stoping']; ?>,false);  
  //player.getPlaybackRate() 
 // event.target.setPlaybackRate(2); 
event.target.pauseVideo();  
      }   
   
   
      // 5. The API calls this function when the player's state changes.   
      //    The function indicates that when playing a video (state=1),   
      //    the player should play for six seconds and then stop.   
      var done = false;   
      function onPlayerStateChange(event) {   
        if (event.data == YT.PlayerState.PLAYING && !done) {   
        // setTimeout(stopVideo, 6000);  
// setInterval(alert(player.getPlayerState()),1000);	

          done = true;   
        }  
      }   

	  //автосохранение места воспроизведения
        var timerId = setInterval(function() {
		if(player.getPlayerState() == 1){
		var curr_time = player.getCurrentTime(); // текущее время
var time_all = player.getDuration(); // все время трека
var mp3_id = <?php echo $all_arr1['id']; ?>; // id трека
 $.ajax({
        type: "POST",
        url: "/reg/ajax-pause.php",
        data: {curr_time:curr_time, mp3_id:mp3_id, time_all:time_all }
    }).done(function( result )
        {
            $("#msg").html( result );
        });
  } // конец условию
}, 10000);	//конец функции

      function stopVideo() {   
        player.stopVideo();   
      }   
      function play() {   
        player.playVideo();   

      }   
      function stop() {   
        player.stopVideo();   
      }   
      function pl5() {   
           var newTime = player.getCurrentTime() + 5;  
    player.seekTo(newTime);  
      }   
	  function pl10() {   
           var newTime = player.getCurrentTime() + 10;  
    player.seekTo(newTime);  
      }
	  function pl30() {   
           var newTime = player.getCurrentTime() + 30;  
    player.seekTo(newTime);  
      }
	  function pl60() {   
           var newTime = player.getCurrentTime() + 60;  
    player.seekTo(newTime);  
      }

      function min5() {   
                   var newTime = player.getCurrentTime() - 5;  
    player.seekTo(newTime);  
      } 
      function min10() {   
                   var newTime = player.getCurrentTime() - 10;  
    player.seekTo(newTime);  
      } 
      function min30() {   
                   var newTime = player.getCurrentTime() - 30;  
    player.seekTo(newTime);  
      } 
      function min60() {   
                   var newTime = player.getCurrentTime() - 60;  
    player.seekTo(newTime);  
      } 	  
      function pause() {   
        player.pauseVideo(); 
var curr_time = player.getCurrentTime(); // текущее время
var time_all = player.getDuration(); // все время трека
var mp3_id = <?php echo $all_arr1['id']; ?>; // id трека
 $.ajax({
        type: "POST",
        url: "/reg/ajax-pause.php",
        data: {curr_time:curr_time, mp3_id:mp3_id, time_all:time_all }
    }).done(function( result )
        {
            $("#msg").html( result );
        });		
// alert(player.getPlayerState()); //состояние видео   
// alert(player.getCurrentTime()); //время на котором я остановился   
// alert(player.getDuration()); //все время воспроизведения   
      }   

  var p = document.getElementById("pbr"); 
  var c = document.getElementById("currentPbr"); 
  p.addEventListener('input',function(){ 
    c.innerHTML = p.value; 
player.setPlaybackRate(p.value); 
  },false); 

  
   //автосохрание комментариев
 function CommentGet() {
 var txt = document.getElementById("comment");
txt.onchange = function() {CommentGet()};
var text = $("#comment").val();
var mp3_id = <?php echo $all_arr1['id']; ?>;
  //  alert(text);
    $.ajax({
        type: "POST",
        url: "/reg/ajax-comment.php",
        data: {mp3_id:mp3_id, text:text}
    }).done(function( result )
        {
            $("#save").html(result);
        });
}
    </script>   
				<textarea id="comment" rows="5" cols="100" onChange="CommentGet()" ><?php echo $all_arr1['comment']; ?></textarea>
<div id="save"></div>
				
				
				
				
				
				
				<div class="row">
				<p></p>
						   <div id="msg"></div>
						   
			<?php
			
			
			?>
						   
						   
		<form action="/reg/play.php?id=<?php echo $idknigi ?>" method="post">

       <?php
	
	   // https://habrahabr.ru/post/148202/
	   // https://andew.ru/ru/pages/page/html5-audio-video-schema
	   // https://andew.ru/ru/pages/page/html5-audio-video-js-manipulation
	   // http://www.schillmania.com/projects/soundmanager2/demo/bar-ui/
	   // http://tympanus.net/codrops/2012/12/04/responsive-touch-friendly-audio-player/
	   // contentEditable="true"
	   
	   // echo $_GET['id'];

	   echo '<a href="/reg/edit.php?edit='.$idknigi.'" title="редактировать книгу">Редактировать книгу</a>';
	   echo '</br>';
	   echo '<a href="/reg/add-youtube.php?add='.$idknigi.'" title="Добавить">Добавить</a>';
$query = mysqli_query($connection, "SELECT `nazvanie`, `autor`, `descriptionkniga` FROM `kniga` WHERE `id_knigi` = '$idknigi'"); 
// var_dump(mysqli_fetch_array($query));
while($result = mysqli_fetch_array($query))
{
echo '</br>';
echo 'Название: '. $result['nazvanie'].'</br>';
echo 'Автор: '.$result['autor'].'</br>';
echo 'Описание: '.$result['descriptionkniga'].'</br>';
// echo $result['id_knigi'] . "<br>";
echo '</br>';
}

echo '<table border="0" width="90%" cellspacing="0" cellpadding="0">';
$ch = 0;
$query = mysqli_query($connection, "SELECT `links`, `progress`, `stoping`, `title_links`, `comment`, `id` FROM `link` WHERE `id_knigi` = '$idknigi'"); 
while($result = mysqli_fetch_array($query))
{
$ch++;
if(strlen($result['comment']) != '0'){
$ok = "ок / ".strlen($result['comment']);
}else{ $ok = '';} 
if ($result['title_links'] != ''){
  $ttl = $result['title_links'];
//     $str = file_get_contents('https://www.youtube.com/watch?v='.$result['links']);
//   echo $result['links'];
// // $re = '/{"videoPrimaryInfoRenderer":{"title":{"simpleText":"(.+?)"/';
//  $re = '/document.title = "(.+?)"/';
// preg_match_all($re, $str, $matches, PREG_OFFSET_CAPTURE, 0);
// var_dump($matches);
}else{
    // $content = file_get_contents("http://youtube.com/get_video_info?video_id=".$result['links']);
// parse_str($content, $ytarr);
// echo $ytarr['title'];
  $ttl = $result['id'];
//   $str = file_get_contents('https://www.youtube.com/watch?v='.$result['links']);
//   echo $result['links'];
// // $re = '/{"videoPrimaryInfoRenderer":{"title":{"simpleText":"(.+?)"/';
//  $re = '/document.title = "(.+?)"/';
// preg_match_all($re, $str, $matches, PREG_OFFSET_CAPTURE, 0);
// var_dump($matches);
// var_dump($re);


//   $ttl = $matches['0']['1'];
}

echo'
<tr>
<td><a style="font-size:15px; line-height:40px;" >'.$ch.'</a></td>
<td><a style="font-size:15px; line-height:40px;" href="/reg/play-youtube.php?id='.$idknigi.'&link='.$result['id'].'" >'.$ttl.'</a></td>
<td><div class="container" style="width: 200px; ">
  <div class="progress" >
    <div class="progress-bar progress-bar active" role="progressbar" aria-valuenow="'.$result['progress'].'" aria-valuemin="0" aria-valuemax="100" style="width:'.$result['progress'].'%">
    '.$result['progress'].' % 
    </div>
  </div>
</div>
</td>
<td>'.$ok.'</td>
</tr>
';
}
echo '</table>';
// $count = count($ch);
//echo $count;

	   ?>


</form>

<script type="text/javascript">
var vid = document.getElementById("audio");

 <?php

 $ch = 0;
 $query = mysqli_query($connection, "SELECT `id`, `stoping` FROM `link` WHERE `id` = '$idlink'"); 
while($result = mysqli_fetch_array($query))
{
$ch++;
echo '

';
}
 ?>

</script>


 
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>

                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	// <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	// <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    // <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    // <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	// <script src="assets/js/demo.js"></script>


</html>
