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
	<meta charset="utf-8" />
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
                    <? echo $_SESSION['login'];?>
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Главная</p>
                    </a>
                </li>
                <li>
                    <a href="add.php">
                        <i class="pe-7s-user"></i>
                        <p>Добавить книгу</p>
                    </a>
                </li>
                <li>
                    <a href="add-cat.php">
                        <i class="pe-7s-user"></i>
                        <p>Добавить категорию</p>
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
		<?php $connection = mysqli_connect('localhost', 'audiname', 'pass', 'audiobook') or die(mysqli_error());   ?> 

	<h2>Категории</h2>	
	
<table border="0" width="100%" cellspacing="0" cellpadding="0">
       <?php
	   $ch = 0;
	   $authorid = $_SESSION['login']; //id того кто добавляет книгу
	   $login = $_SESSION['id'];
       mysqli_set_charset($connection, "utf8");
// $query = mysqli_query($connection, "SELECT `nazvanie`, `autor`, `id_knigi` FROM `kniga` WHERE `user_id` = '$login'"); 
$query = mysqli_query($connection, "SELECT * FROM `categori` WHERE `user_id` = '$login'"); 

while($result = mysqli_fetch_array($query))
{
$ch++;
echo "<tr>";
echo "<td height=\"15\"><a style=\"font-size:15px;\" >".$ch."</a></td>";
// echo "<td height=\"45\"><a style=\"font-size:20px;\" href=/reg/play.php?id=".$result['id_knigi']." title=".$result['nazvanie'].">".$result['nazvanie']."</a></td>";
// echo "<td height=\"45\"><a style=\"font-size:20px;\" href=/reg/delet.php?id=".$result['id_knigi']."&aut=".$login." title=\"удалить книгу \">Удалить книгу</a></td>";

echo "<td height=\"45\"><a style=\"font-size:20px;\" href=/reg/view-cat.php?id=".$result['id']." title=".$result['name'].">".$result['name']."</a></td>";
// echo "<td height=\"45\"><a style=\"font-size:20px;\" href=/reg/delet.php?id=".$result['id']."&aut=".$login." title=\"удалить книгу \">Удалить книгу</a></td>";

echo "<tr>";
}

	   ?>
	   </table>
		
    <h2>Книги</h2>  
    
<table border="0" width="100%" cellspacing="0" cellpadding="0">
       <?php
       $ch = 0;
       $authorid = $_SESSION['login']; //id того кто добавляет книгу
       $login = $_SESSION['id'];
       mysqli_set_charset($connection, "utf8");
$query = mysqli_query($connection, "SELECT `nazvanie`, `autor`, `id_knigi` FROM `kniga` WHERE `user_id` = '$login' AND `id_cat` = '0' "); 
// $query = mysqli_query($connection, "SELECT * FROM `categori` WHERE `user_id` = '$login'"); 

while($result = mysqli_fetch_array($query))
{
$ch++;
echo "<tr>";
echo "<td height=\"15\"><a style=\"font-size:15px;\" >".$ch."</a></td>";
echo "<td height=\"45\"><a style=\"font-size:20px;\" href=/reg/play.php?id=".$result['id_knigi']." title=".$result['nazvanie'].">".$result['nazvanie']."</a></td>";
echo "<td height=\"45\"><a style=\"font-size:20px;\" href=/reg/delet.php?id=".$result['id_knigi']."&aut=".$login." title=\"удалить книгу \">Удалить книгу</a></td>";

// echo "<td height=\"45\"><a style=\"font-size:20px;\" href=/reg/view-cat.php?id=".$result['id']." title=".$result['name'].">".$result['name']."</a></td>";
// echo "<td height=\"45\"><a style=\"font-size:20px;\" href=/reg/delet.php?id=".$result['id']."&aut=".$login." title=\"удалить книгу \">Удалить книгу</a></td>";

echo "<tr>";
}

       ?>
       </table>
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
