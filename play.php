<?php
session_start(); // Стартуем сессию
 if (!isset($_SESSION['login']) && !isset($_SESSION['id'])){ // если в сессии загружены логин и id
	header('Location: login.php');
exit;
} 
$connection = mysqli_connect('localhost', 'audiname', 'pass', 'audiobook') or die(mysqli_error());   


?>
<!doctype html>
<?php
$idknigi = $_GET['id'];
mysqli_set_charset($connection, "utf8");
$query = mysqli_query($connection, "SELECT `istochnik` FROM `kniga` WHERE `id_knigi` = '$idknigi'"); 
// var_dump(mysqli_fetch_array($query));
$all_arr = mysqli_fetch_array($query);
// var_dump($all_arr);

if($all_arr['istochnik'] === 'youtube'){
header('Location: play-youtube.php?id='.$idknigi.'');
}

?>
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
	
	
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	<!-- <script src="assets/js/online.js"></script> -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="assets/js/audioplayer.js"></script>

<script>$( function() { $( "audio" ).audioPlayer(); } );</script>
<style>
.prokrutka {
height:300px; /* высота нашего блока */
overflow: auto; /* свойство для прокрутки по горизонтали. Автоматом, если больше блока */
}
</style>
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
				<p></p>
						   <div id="msg"></div>
		<form action="/reg/play.php?id=<?php echo $idknigi ?>" method="post">
		  
					

       <?php
	
	   // https://habrahabr.ru/post/148202/
	   // https://andew.ru/ru/pages/page/html5-audio-video-schema
	   // https://andew.ru/ru/pages/page/html5-audio-video-js-manipulation
	   // http://www.schillmania.com/projects/soundmanager2/demo/bar-ui/
	   // http://tympanus.net/codrops/2012/12/04/responsive-touch-friendly-audio-player/
	   // contentEditable="true"
	   
	   // echo $_GET['id'];
	   
	   $idlink = $_GET['link'];
	   $authorid = $_SESSION['login']; //id того кто добавляет книгу
	   $login = $_SESSION['id'];
	   echo '<a href="/reg/edit.php?edit='.$idknigi.'" title="редактировать книгу">Редактировать книгу</a>';
	   echo '</br>';
	   echo '<a href="/reg/add-link.php?add='.$idknigi.'" title="Добавить">Добавить</a>';
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




$ch = 0;
$query = mysqli_query($connection, "SELECT `links`, `stoping`, `title_links`, `comment`, `id` FROM `link` WHERE `id` = '$idlink' "); 
while($result = mysqli_fetch_array($query))
{
$ch++;
echo '

 <p>'.$result['links'].'</p>
  <p>'.$result['title_links'].'</p>
<video id="audio" controls style="width: 100%;">
  <!-- <source src="'.$result['links'].'" type="audio/mp3"> -->
  <source src="'.$result['links'].'" type="video/mp4">
  Ваш браузер не поддерживает воспроизведение, смените браузер.
</video>
</br>

<input id="pbr" type="range" value="1" min="0.5" max="2" step="0.1" >
  <p>Ускорение <span id="currentPbr">1</span></p>
</br>
<button onclick="plusCurTime5()" type="button">+5 сек</button>
<button onclick="plusCurTime10()" type="button">+10 сек</button>
<button onclick="plusCurTime30()" type="button">+30 сек</button>
<button onclick="plusCurTime60()" type="button">+1 мин</button>
</br>
</br>
<button onclick="minusCurTime5()" type="button">-5 сек</button>
<button onclick="minusCurTime10()" type="button">-10 сек</button>
<button onclick="minusCurTime30()" type="button">-30 сек</button>
<button onclick="minusCurTime60()" type="button">-1 мин</button>


</br>
</br>
<textarea id="comment" rows="5" cols="100" onChange="CommentGet()" >'.$result['comment'].'</textarea>
<div id="save"></div>
<br>
';
}
echo '<div class="prokrutka">
<table border="0" width="90%" cellspacing="0" cellpadding="0">';
$ch = 0;
$query = mysqli_query($connection, "SELECT `links`, `progress`, `stoping`, `title_links`, `comment`, `id`, `all` FROM `link` WHERE `id_knigi` = '$idknigi' ORDER by `sort` ASC"); 
while($result = mysqli_fetch_array($query))
{
$ch++;
if(strlen($result['comment']) != '0'){
$ok = "ок / ".strlen($result['comment']);
}else{ $ok = '';}
$all = (int)$result['all'] / 60;
$all = number_format($all, 2, '.', '');
$text = $_GET['link'] == $result['id']?'сейчас воспроизводится':'';
echo'
<tr>
<td><a style="font-size:15px; line-height:40px;" >'.$ch.'</a></td>
<td><a style="font-size:15px; line-height:40px;" href="/reg/play.php?id='.$idknigi.'&link='.$result['id'].'" >'.$result['title_links'].'</a></td>
<td>'.$text.'</td>
<td>'.$all.'</td>
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
echo '</table> </div>';
// $count = count($ch);
//echo $count;

	   ?>

   <?php
   $x = 0; 
   $query = mysqli_query($connection, "SELECT `id`,`links` FROM `link` WHERE `id_knigi` = '$idknigi'"); 
   while($result = mysqli_fetch_array($query)){
   $x++;
 // echo '<textarea name="id'.$x.'" rows="1" cols="20" id="id'.$x.'">'.$result['id'].'</textarea><br />
   // <textarea name="stoping'.$x.'" rows="1" cols="20" id="stoping'.$x.'"></textarea><br />
// <textarea name="all'.$x.'" rows="1" cols="20" id="all'.$x.'"></textarea><br />';
	}
	$count = $x; // сделать нормально

    // $dir = $_SERVER['DOCUMENT_ROOT']."/reg/users/".$login."/".$idknigi."/bdk/";
   // $dir = $_SERVER['DOCUMENT_ROOT']."/reg/users/".$login."/2513323/bdk/";

echo "<pre>";
/*
 function getFileList($dir, $recurse=false, $depth=false){
   $authorid = $_SESSION['login']; //id того кто добавляет книгу
	   $login = $_SESSION['id'];
    // массив, хранящий возвращаемое значение
    $retval = array();

    // добавить конечный слеш, если его нет
    if(substr($dir, -1) != "/") $dir .= "/";

    // указание директории и считывание списка файлов
    $d = @dir($dir) or die("getFileList: Не удалось открыть каталог $dir для чтения");
    while(false !== ($entry = $d->read())) {
      // пропустить скрытые файлы
      if($entry[0] == ".") continue;
	  // echo $entry;
      if(is_dir("$dir$entry")) {
         $string=str_replace($_SERVER['DOCUMENT_ROOT'], $_SERVER['HTTP_HOST'],$dir.$entry);
        // $retval[] = $dir.$entry; //выводит файлы в 
		 $retval[] = $string."/"; //выводит файлы
        if($recurse && is_readable("$dir$entry/")) {
          if($depth === false) {
            $retval = array_merge($retval, getFileList("$dir$entry/", true));
          } elseif($depth > 0) {
            $retval = array_merge($retval, getFileList("$dir$entry/", true, $depth-1));
          }
        }
      } elseif(is_readable("$dir$entry")) {
	  $string=str_replace($_SERVER['DOCUMENT_ROOT'], $_SERVER['HTTP_HOST'],$dir.$entry);
        // $retval[] = $dir.$entry; //выводит файлы в 
		 $retval[] = $string; //выводит файлы
      }
    }
    $d->close();

    return $retval;
  }

$dirlist = getFileList($dir, true);
asort($dirlist, SORT_STRING | SORT_FLAG_CASE | SORT_NATURAL);
// print_r($dirlist);
foreach($dirlist as $val){
$path_info = pathinfo($val);
    if( $path_info['extension'] == "mp3"){
	// echo "http://".$val."<></br>";
	}
}*/
echo "</pre>";



 ?>
</form>

<script type="text/javascript">
var vid = document.getElementById("audio");

 <?php
    // vid.oncanplay = function() {
// vid.currentTime = '.$result['stoping'].';
// };

 $ch = 0;
 $query = mysqli_query($connection, "SELECT `id`, `stoping` FROM `link` WHERE `id` = '$idlink'"); 
while($result = mysqli_fetch_array($query))
{
$ch++;
echo '
 vid.currentTime = '.$result['stoping'].'; // продолжаем прослушивать с момента на котором остановились

//забись в базу по кнопке пауза
vid.onpause = function() {myFunction()};
function myFunction() {
    // document.getElementById("position'.$ch.'").innerHTML = vid'.$ch.'.currentTime;
// document.getElementById("time'.$ch.'").innerHTML = vid'.$ch.'.duration;
// document.getElementById("stoping'.$ch.'").innerHTML = vid'.$ch.'.duration;
// document.getElementById("all'.$ch.'").innerHTML = vid'.$ch.'.currentTime;
var curr_time = vid.currentTime;
var time_all = vid.duration;
var mp3_id = '.$result['id'].';
 $.ajax({
        type: "POST",
        url: "/reg/ajax-pause.php",
        data: {curr_time:curr_time, mp3_id:mp3_id, time_all:time_all }
    }).done(function( result )
        {
            $("#msg").html( result );
        });
}

// авто запись в базу данных
window.onLineHandler = function(){ //если есть подключение к интернету, то работаем
setInterval (function(){ 
if (vid.paused == false){
var curr_time = vid.currentTime; // текущее время
var time_all = vid.duration; // все время трека
var mp3_id = '.$result['id'].'; // id трека
 $.ajax({
        type: "POST",
        url: "/reg/ajax-pause.php",
        data: {curr_time:curr_time, mp3_id:mp3_id, time_all:time_all }
    }).done(function( result )
        {
            $("#msg").html( result );
        });
}
}, 10000); // записывать каждые 10 секунд
 };

// проверка интернет соединения 
 window.offLineHandler = function(){
	vid.pause(); 
	$("#msg").html("Интернет соединение пропало. Поэтому прослушивание и сохранение дальше бесполезно </br> Восстанови соединение и слушай дальше.");
};

 // продолжить с определенного места. изменение положения ползунка и запись положения времени
 if (vid.seeking == true){
var curr_time = vid.currentTime; // текущее время
var time_all = vid.duration; // все время трека
var mp3_id = '.$result['id'].'; // id трека
 $.ajax({
        type: "POST",
        url: "/reg/ajax-pause.php",
        data: {curr_time:curr_time, mp3_id:mp3_id, time_all:time_all }
    }).done(function( result )
        {
            $("#msg").html( result );
        });
}

// перемотка времени
function plusCurTime5(){
	vid.currentTime = vid.currentTime + 5;
}
function plusCurTime10(){
	vid.currentTime = vid.currentTime + 10;
}
function plusCurTime30(){
	vid.currentTime = vid.currentTime + 30;
}
function plusCurTime60(){
	vid.currentTime = vid.currentTime + 60;
}

function minusCurTime5(){
	vid.currentTime = vid.currentTime - 5;
}
function minusCurTime10(){
	vid.currentTime = vid.currentTime - 10;
}
function minusCurTime30(){
	vid.currentTime = vid.currentTime - 30;
}
function minusCurTime60(){
	vid.currentTime = vid.currentTime - 60;
}
 //автосохрание комментариев
 function CommentGet() {
 var txt = document.getElementById("comment");
txt.onchange = function() {CommentGet()};
var text = $("#comment").val();
var mp3_id = '.$result['id'].';
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
';
}
 ?>

</script>

<script type="text/javascript">
//ускорение воспроизведения
window.onload = function () {


var v = document.getElementById("audio");

  var p = document.getElementById("pbr");
  var c = document.getElementById("currentPbr");

  p.addEventListener('input',function(){
    c.innerHTML = p.value;
    

v.playbackRate = p.value;



  },false);

};
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
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
