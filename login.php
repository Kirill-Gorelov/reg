<?php
session_start(); // Стартуем сессию
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Авторизация на сервисе прослушивания аудиокниг</title>

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
		сделать регистрацию через почту
		сделать в настройках уведомление о заходе в кабинет(по почте
		сделать что бы сессия держалась практический вечно

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    Авторизация
                </a>
            </div>
			</br></br></br>
				
            
    	</div>
    </div>

    <div class="main-panel">
<div class="col-md-12">
                        <div class="card">
                            <div class="content">
                                <form action="login.php" method="post">
										<div class="col-md-12">
                                            <div class="form-group">
                                                <label>Логин</label>
                                                <input type="text" class="form-control" name="login">
                                            </div>
                                 
                                            <div class="form-group">
                                                <label>Пароль</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                        </div>
										
										<?php if (isset($_SESSION['login']) && isset($_SESSION['id'])) // если в сессии не загружены логин и id
{
echo '<a href="">Забыл пароль?</a>';
echo '<div align="center"><a href="reg.php">Регистрация</a></div>'; // Выводим нашу ссылку регистрации
} ?>
                                    <button name="submit" type="submit" class="btn btn-info btn-fill pull-right">Войти</button>
                                    <div class="clearfix"></div>
                                </form>
    <?php $connection = mysqli_connect('localhost', 'audiname', 'pass', 'audiobook') or die(mysqli_error()); 
//     if (!$connection) {
//         echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
//         echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
//         echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
//         exit;
//     }

//     echo "Соединение с MySQL установлено!" . PHP_EOL;
// echo "Информация о сервере: " . mysqli_get_host_info($connection) . PHP_EOL;
// mysql_query('SET names utf8');
	?> 

<?php if (isset($_POST['submit'])) // Отлавливаем нажатие кнопки "Отправить"
{
if (empty($_POST['login'])) // Если поле логин пустое
{
echo '<script>alert("Поле логин не заполненно");</script>'; // То выводим сообщение об ошибке
}
elseif (empty($_POST['password'])) // Если поле пароль пустое
{
echo '<script>alert("Поле пароль не заполненно");</script>'; // То выводим сообщение об ошибке
}
else  // Иначе если все поля заполненны
{    
$login = $_POST['login']; // Записываем логин в переменную 
$password = md5($_POST['password']); // Записываем пароль в переменную           
$query = mysqli_query($connection, "SELECT `id` FROM `users` WHERE `login` = '$login' AND `password` = '$password'"); // Формируем переменную с запросом к базе данных с проверкой пользователя
$result = mysqli_fetch_array($query); // Формируем переменную с исполнением запроса к БД 
var_dump($result);
if (empty($result['id'])) // Если запрос к бд не возвразяет id пользователя
{
echo '<script>alert("Неверные Логин или Пароль");</script>'; // Значит такой пользователь не существует или не верен пароль
}
else // Если возвращяем id пользователя, выполняем вход под ним
{
$_SESSION['password'] = $password; // Заносим в сессию  пароль
$_SESSION['login'] = $login; // Заносим в сессию  логин
$_SESSION['id'] = $result['id']; // Заносим в сессию  id
echo '<div align="center" style="color: #000;">Вы успешно вощли в систему: '.$_SESSION['login'].'</div>'; // Выводим сообщение что пользователь авторизирован        
}     
}		
} 


?>

<?php if (isset($_GET['exit'])) { // если вызвали переменную "exit"
unset($_SESSION['password']); // Чистим сессию пароля
unset($_SESSION['login']); // Чистим сессию логина
unset($_SESSION['id']); // Чистим сессию id
} ?>

<?php if (isset($_SESSION['login']) && isset($_SESSION['id'])){ // если в сессии загружены логин и id
	echo '<div align="center"><a href="login.php?exit">Выход</a></div>'; // Выводим нашу ссылку выхода
	header('Location: dashboard.php');
exit;
} 
echo $_SESSION['login'];

?>



                            </div>
                        </div>
                    </div>
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
