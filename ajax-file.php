<?php
session_start(); // Стартуем сессию
 if (!isset($_SESSION['login']) && !isset($_SESSION['id'])){ // если в сессии загружены логин и id
	header('Location: login.php');
exit;
} 
?>
<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Сервис прослушивания аудиокниг</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

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
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
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
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret"></b>
                                    <span class="notification">5</span>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="">
                               Account
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Dropdown
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="login.php?exit">
                                Выход
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
<?php if (isset($_GET['exit'])) { // если вызвали переменную "exit"
unset($_SESSION['password']); // Чистим сессию пароля
unset($_SESSION['login']); // Чистим сессию логина
unset($_SESSION['id']); // Чистим сессию id
//header('Location: login.php');
exit;
} ?>

        <div class="content">
       <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Загрузить аудио файлы</h4>
                            </div>
                            <div class="content">
                                <?php
$connection = mysqli_connect('localhost', 'audiname', 'pass', 'audiobook') or die(mysqli_error());
mysqli_set_charset($connection, "utf8");

// Загрузка файлов
function upload($filename, $pach, $flag = false)
{
	
	// $filename - это свойство name в input 
	// $pach - директория куда будет сохранён загруженный файл
	// директория загрузки должна иметь доступ 777
	// $flag - по умолчанию false (0), 
	// определяет перезапись существующего файла в директории, если выставлен TRUE (1)
	
	// Проверяет существует ли директория и возможно ли её открыть из этого скрипта
	if(!opendir($pach)){return 'Директория сохранения файлов, указана неверно!';}
	
	// устанавливаем директорию загрузки файла
	 $uploadfile = $pach."/".basename($_FILES[$filename]['name']);
	
	// Устанавливаем вариант перезаписи файла
	// если false, файл не перезаписывается, а выдаётся предупреждение.
	if(!$flag){
		// Проверяем существует ли такой файл в директории
		if(is_file($uploadfile)) return('ВНИМАНИЕ! Такой файл уже существует.');
	}
	
	if(!empty($filename))
	{
	  
	  // Ограничения размера загружаемого файла
	  /*if($_FILES[$filename]['size'] > 1024*2*1024)
	   {
		 return("Размер файла превышает 2 мегабайта");
		 
	   }*/
	   // Проверяем загружен ли файл
	   if(is_uploaded_file($_FILES[$filename]['tmp_name']))
	   {
		 // Если файл загружен успешно, перемещаем его
		 // из временной директории в конечную
		 
		 if(copy($_FILES[$filename]['tmp_name'],$uploadfile))
		 {

			 return('OK! Файл успешно загружен.');
			 
		 }
		 else
		 {
			return('<strong>'/*. $_FILES[$filename]['tmp_name'].$pach */.$_FILES[$filename]['name'].' </strong> - не является правильно загруженным файлом или не может быть перемещён из временной директории.');	 
		 }
	   } 
	   else 
	   {
		  switch($_FILES[$filename]['error'])
		  {
			  case 1: echo 'Размер файла превышает допустимый.';
			  break;
			  case 2: echo 'Размер файла превышает допустимый.';
			  break;
			  case 3: echo 'Загружаемый файл был получен только частично.';
			  break;
			  case 4: echo 'Файл не был загружен!';
			  break;
		  }
		  
	   }
	}
	else
	{
		return('Не указан файл для загрузки!');	
	}
}


// var_dump($_FILES['filename1']);
// var_dump($_FILES['filename']);

$autor = $_POST['autor']; // автор книги   
$nazvanie = $_POST['nazvanie']; // название
$izdatelstvo = $_POST['izdatelstvo']; //
$descriptionkniga = $_POST['descriptionkniga']; //
$login = $_SESSION['id'];
$oblozka = $_POST['oblozka']; // обложка книги
$authorid = $_SESSION['id']; //id того кто добавляет книгу
$today = date("Y-m-d H:i:s");  // дата добавления книги
$id_knigi = $authorid.rand(0, 15000); // создаем свой id книги

$filname = $_SERVER['DOCUMENT_ROOT']."/reg/users/".$login."/".$id_knigi;
//echo $filname;

 mkdir($filname, 0777, true);
//  chgrp($filname, 'kirill');
//  chown($filname, 'kirill');
// foreach($img_desc as $val) {
 echo upload('filename', $filname, $_POST['f']);
  if($_FILES['filename1']['name'] != ''){
	echo upload('filename1', $filname, $_POST['f']);
 }
 if($_FILES['filename2']['name'] != ''){
	echo upload('filename2', $filname, $_POST['f']);
 }
  if($_FILES['filename3']['name'] != ''){
	echo upload('filename3', $filname, $_POST['f']);
 }
  if($_FILES['filename4']['name'] != ''){
	echo upload('filename4', $filname, $_POST['f']);
 }
  if($_FILES['filename5']['name'] != ''){
	echo upload('filename5', $filname, $_POST['f']);
 }
  if($_FILES['filename6']['name'] != ''){
	echo upload('filename6', $filname, $_POST['f']);
 }
  if($_FILES['filename7']['name'] != ''){
	echo upload('filename7', $filname, $_POST['f']);
 }
  if($_FILES['filename8']['name'] != ''){
	echo upload('filename8', $filname, $_POST['f']);
 }
  if($_FILES['filename9']['name'] != ''){
	echo upload('filename9', $filname, $_POST['f']);
 }
   if($_FILES['filename10']['name'] != ''){
	echo upload('filename10', $filname, $_POST['f']);
 }
   if($_FILES['filename11']['name'] != ''){
	echo upload('filename11', $filname, $_POST['f']);
 }
   if($_FILES['filename12']['name'] != ''){
	echo upload('filename12', $filname, $_POST['f']);
 }
   if($_FILES['filename13']['name'] != ''){
	echo upload('filename13', $filname, $_POST['f']);
 }
   if($_FILES['filename14']['name'] != ''){
	echo upload('filename14', $filname, $_POST['f']);
 }
   if($_FILES['filename15']['name'] != ''){
	echo upload('filename15', $filname, $_POST['f']);
 }
   if($_FILES['filename16']['name'] != ''){
	echo upload('filename16', $filname, $_POST['f']);
 }
   if($_FILES['filename17']['name'] != ''){
	echo upload('filename17', $filname, $_POST['f']);
 }

 if($_FILES['filename18']['name'] != ''){ 
     echo upload('filename18',$filname,$_POST['f']); 
 }
if($_FILES['filename19']['name'] != ''){
     echo upload('filename19', $filname, $_POST['f']);
 }
 
 if($_FILES['filename20']['name'] != ''){
      echo upload('filename20',$filname,$_POST['f']); 
    }
    
if($_FILES['filename21']['name'] != ''){ 
    echo upload('filename21', $filname, $_POST['f']); 
}

if($_FILES['filename22']['name'] != ''){ 
    echo upload('filename22', $filname, $_POST['f']); 
}

if($_FILES['filename23']['name'] != ''){ 
    echo upload('filename23', $filname, $_POST['f']); 
}

if($_FILES['filename24']['name'] != ''){ 
    echo upload('filename24', $filname, $_POST['f']); 
}

if($_FILES['filename25']['name'] != ''){ 
    echo upload('filename25', $filname, $_POST['f']); 
}

if($_FILES['filename26']['name'] != ''){ 
    echo upload('filename26', $filname, $_POST['f']); 
}

if($_FILES['filename27']['name'] != ''){ 
    echo upload('filename27', $filname, $_POST['f']); 
}

if($_FILES['filename28']['name'] != ''){ 
    echo upload('filename28', $filname, $_POST['f']); 
}

if($_FILES['filename29']['name'] != ''){ 
    echo upload('filename29', $filname, $_POST['f']); 
}

if($_FILES['filename30']['name'] != ''){ 
    echo upload('filename30', $filname, $_POST['f']); 
}

if($_FILES['filename31']['name'] != ''){ 
    echo upload('filename31', $filname, $_POST['f']); 
}
if($_FILES['filename32']['name'] != ''){ 
    echo upload('filename32', $filname, $_POST['f']); 
}

if($_FILES['filename33']['name'] != ''){ 
    echo upload('filename33', $filname, $_POST['f']); 
}

if($_FILES['filename34']['name'] != ''){ 
    echo upload('filename34', $filname, $_POST['f']); 
}

if($_FILES['filename35']['name'] != ''){ 
    echo upload('filename35', $filname, $_POST['f']); 
}

if($_FILES['filename36']['name'] != ''){ 
    echo upload('filename36', $filname, $_POST['f']); 
}

if($_FILES['filename37']['name'] != ''){ 
    echo upload('filename37', $filname, $_POST['f']); 
}

if($_FILES['filename38']['name'] != ''){ 
    echo upload('filename38', $filname, $_POST['f']); 
}

if($_FILES['filename39']['name'] != ''){ 
    echo upload('filename39', $filname, $_POST['f']); 
}

if($_FILES['filename40']['name'] != ''){ 
    echo upload('filename40', $filname, $_POST['f']); 
}

if($_FILES['filename41']['name'] != ''){ 
    echo upload('filename41', $filname, $_POST['f']); 
}

if($_FILES['filename42']['name'] != ''){ 
    echo upload('filename42', $filname, $_POST['f']); 
}

if($_FILES['filename43']['name'] != ''){ 
    echo upload('filename43', $filname, $_POST['f']); 
}

if($_FILES['filename44']['name'] != ''){ 
    echo upload('filename44', $filname, $_POST['f']); 
}

if($_FILES['filename45']['name'] != ''){ 
    echo upload('filename45', $filname, $_POST['f']); 
}

if($_FILES['filename46']['name'] != ''){ 
    echo upload('filename46', $filname, $_POST['f']); 
}

if($_FILES['filename47']['name'] != ''){ 
    echo upload('filename47', $filname, $_POST['f']); 
}

if($_FILES['filename48']['name'] != ''){ 
    echo upload('filename48', $filname, $_POST['f']); 
}

if($_FILES['filename49']['name'] != ''){ 
    echo upload('filename49', $filname, $_POST['f']); 
}

if($_FILES['filename50']['name'] != ''){ 
    echo upload('filename50', $filname, $_POST['f']); 
}

if($_FILES['filename51']['name'] != ''){ 
    echo upload('filename51', $filname, $_POST['f']); 
}

if($_FILES['filename52']['name'] != ''){ 
    echo upload('filename52', $filname, $_POST['f']); 
}

if($_FILES['filename53']['name'] != ''){ 
    echo upload('filename53', $filname, $_POST['f']); 
}

if($_FILES['filename54']['name'] != ''){ 
    echo upload('filename54', $filname, $_POST['f']); 
}

if($_FILES['filename55']['name'] != ''){ 
    echo upload('filename55', $filname, $_POST['f']); 
}

if($_FILES['filename56']['name'] != ''){ 
    echo upload('filename56', $filname, $_POST['f']); 
}

if($_FILES['filename57']['name'] != ''){ 
    echo upload('filename57', $filname, $_POST['f']); 
}

if($_FILES['filename58']['name'] != ''){ 
    echo upload('filename58', $filname, $_POST['f']); 
}

if($_FILES['filename59']['name'] != ''){ 
    echo upload('filename59', $filname, $_POST['f']); 
}

if($_FILES['filename60']['name'] != ''){ 
    echo upload('filename60', $filname, $_POST['f']); 
}

if($_FILES['filename61']['name'] != ''){ 
    echo upload('filename61', $filname, $_POST['f']); 
}

if($_FILES['filename62']['name'] != ''){ 
    echo upload('filename62', $filname, $_POST['f']); 
}

if($_FILES['filename63']['name'] != ''){ 
    echo upload('filename63', $filname, $_POST['f']); 
}

if($_FILES['filename64']['name'] != ''){ 
    echo upload('filename64', $filname, $_POST['f']); 
}

if($_FILES['filename65']['name'] != ''){ 
    echo upload('filename65', $filname, $_POST['f']); 
}

if($_FILES['filename66']['name'] != ''){ 
    echo upload('filename66', $filname, $_POST['f']); 
}

if($_FILES['filename67']['name'] != ''){ 
    echo upload('filename67', $filname, $_POST['f']); 
}

if($_FILES['filename68']['name'] != ''){ 
    echo upload('filename68', $filname, $_POST['f']); 
}

if($_FILES['filename69']['name'] != ''){ 
    echo upload('filename69', $filname, $_POST['f']); 
}

if($_FILES['filename70']['name'] != ''){ 
    echo upload('filename70', $filname, $_POST['f']); 
}


echo "</br>";
// Открыть заведомо существующий каталог и начать считывать его содержимое
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
  
  

$query = "INSERT INTO `kniga` (id_knigi,nazvanie, autor, izdatelstvo, descriptionkniga, user_id, date, istochnik, oblozka) VALUES ('$id_knigi', '$nazvanie', '$autor', '$izdatelstvo', '$descriptionkniga', '$authorid', '$today', 'download', '$oblozka')"; // Создаем переменную с запросом к базе данных на отправку нового юзера
$result = mysqli_query($connection, $query) or die(mysql_error()); 

$dirlist = getFileList($filname, true);
asort($dirlist, SORT_STRING | SORT_FLAG_CASE | SORT_NATURAL);
// print_r($dirlist);
foreach($dirlist as $val){
$link = "http://".$val;
$path_info = pathinfo($val);
$file = basename($link, ".mp3"); 
// echo $file;
$query = "INSERT INTO `link` (id_knigi, links, title_links, stoping) VALUES ('$id_knigi', '$link', '$file', '01')"; // Создаем переменную с запросом к базе данных на отправку нового 
$result = mysqli_query($connection, $query) or die(mysql_error()); 
    //if( $path_info['extension'] == "mp3"){
	
	//echo $link."<></br>";
//	}
}


echo "</pre>";
echo '
<p>Готово. Перейти к изучению -> <a href="/reg/play.php?id='.$id_knigi.'">'.$nazvanie.'</a></p>
<p> <a href="/reg/add-my-file.php">Добавить еще</a></p>
';

?>

                            </div>
                        </div>
                    </div>
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
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
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

