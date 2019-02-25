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
                                <h4 class="title">Добавить аудио файлы</h4>
                            </div>
                            <div class="content">
                                <form action="add-link-download.php?add=<?php echo $_GET['add']; ?>" method="post" multipart="" enctype="multipart/form-data">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Выбрать файл. Не больше 18 шт. 100мб/1шт</label>
                                                 <input type = "file" name="filename"   id="namefile"/>
												 <input type = "file" name="filename1"  id="namefile"/>
												 <input type = "file" name="filename2"  id="namefile"/>
												 <input type = "file" name="filename3"  id="namefile"/> 
												 <input type = "file" name="filename4"  id="namefile"/>
												 <input type = "file" name="filename5"  id="namefile"/>
												 <input type = "file" name="filename6"  id="namefile"/>
												 <input type = "file" name="filename7"  id="namefile"/>
												 <input type = "file" name="filename8"  id="namefile"/>
												 <input type = "file" name="filename9"  id="namefile"/> 
												 <input type = "file" name="filename10"  id="namefile"/> 
												 <input type = "file" name="filename11"  id="namefile"/> 
												 <input type = "file" name="filename12"  id="namefile"/> 
												 <input type = "file" name="filename13"  id="namefile"/> 
												 <input type = "file" name="filename14"  id="namefile"/> 
												 <input type = "file" name="filename15"  id="namefile"/> 
												 <input type = "file" name="filename16"  id="namefile"/> 
                                                 <input type = "file" name="filename17"  id="namefile"/>
                                                 <input type="file" name="filename18" id="namefile">
                                                 <input type="file" name="filename19" id="namefile">
                                                 <input type="file" name="filename20" id="namefile">
                                                 <input type="file" name="filename21" id="namefile">
                                                 <input type="file" name="filename22" id="namefile">
                                                 <input type="file" name="filename23" id="namefile">
                                                 <input type="file" name="filename24" id="namefile">
                                                 <input type="file" name="filename25" id="namefile">
                                                 <input type="file" name="filename26" id="namefile">
                                                 <input type="file" name="filename27" id="namefile">
                                                 <input type="file" name="filename28" id="namefile">
                                                 <input type="file" name="filename29" id="namefile">
                                                 <input type="file" name="filename30" id="namefile">
                                                 <input type="file" name="filename31" id="namefile">
                                                 <input type="file" name="filename32" id="namefile">
                                                 <input type="file" name="filename33" id="namefile">
                                                 <input type="file" name="filename34" id="namefile">
                                                 <input type="file" name="filename35" id="namefile">
                                                 <input type="file" name="filename36" id="namefile">
                                                 <input type="file" name="filename37" id="namefile">
                                                 <input type="file" name="filename38" id="namefile">
                                                 <input type="file" name="filename39" id="namefile">
                                                 <input type="file" name="filename40" id="namefile">
                                                 <input type="file" name="filename41" id="namefile">
                                                 <input type="file" name="filename42" id="namefile">
                                                 <input type="file" name="filename43" id="namefile">
                                                 <input type="file" name="filename44" id="namefile">
                                                 <input type="file" name="filename45" id="namefile">
                                                 <input type="file" name="filename46" id="namefile">
                                                 <input type="file" name="filename47" id="namefile">
                                                 <input type="file" name="filename48" id="namefile">
                                                 <input type="file" name="filename49" id="namefile">
                                                 <input type="file" name="filename50" id="namefile">
                                                 <input type="file" name="filename51" id="namefile">
                                                 <input type="file" name="filename52" id="namefile">
                                                 <input type="file" name="filename53" id="namefile">
                                                 <input type="file" name="filename54" id="namefile">
                                                 <input type="file" name="filename55" id="namefile">
                                                 <input type="file" name="filename56" id="namefile">
                                                 <input type="file" name="filename57" id="namefile">
                                                 <input type="file" name="filename58" id="namefile">
                                                 <input type="file" name="filename59" id="namefile">
                                                 <input type="file" name="filename60" id="namefile">
                                                 <input type="file" name="filename61" id="namefile">
                                                 <input type="file" name="filename62" id="namefile">
                                                 <input type="file" name="filename63" id="namefile">
                                                 <input type="file" name="filename64" id="namefile">
                                                 <input type="file" name="filename65" id="namefile">
                                                 <input type="file" name="filename66" id="namefile">
                                                 <input type="file" name="filename67" id="namefile">
                                                 <input type="file" name="filename68" id="namefile">
                                                 <input type="file" name="filename69" id="namefile">
                                                 <input type="file" name="filename70" id="namefile"> 
												<!--  https://new.vk.com/feed?w=wall-46347604_110778 accept="audio/mp3" -->
                                            </div>
                                        </div>
										<!-- <div class="col-md-5">
                                            <div class="form-group">
                                             <button id="send" type="button" class="btn btn-info btn-fill pull-right">Проверить</button>
                                            </div>
                                        </div> -->
									   <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Загрузить</button>
                                    <div class="clearfix"></div>
                                </form>
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
