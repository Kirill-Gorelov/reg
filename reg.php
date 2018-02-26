<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Регистрация на сервисе прослушивания аудиокниг</title>

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
                <a href="" class="simple-text">
                    Регистрация
                </a>
            </div>
			</br></br></br>
					<div class="col-md-12">
                        <div class="card">
                            <div class="content">
                                <form action="reg.php" method="post">
										<div class="col-md-12">
                                            <div class="form-group">
                                                <label>Логин</label>
                                                <input type="text" class="form-control" name="login">
                                            </div>
											<div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" name="email">
                                            </div>
                                 
                                            <div class="form-group">
                                                <label>Пароль</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                        </div>
										<a href="">Забыл пароль?</a>
                                    <button name="submit" type="submit" class="btn btn-info btn-fill pull-right">Регистрация</button>
                                    <div class="clearfix"></div>
                                </form>
	<?php $connection = mysqli_connect('localhost', 'audiname', 'pass', 'audiobook') or die(mysqli_error());  ?> 

<?php 
if (isset($_POST['submit'])) // Отлавливаем нажатие на кнопку отправить 
{
if (empty($_POST['login']))  // Условие - если поле логин пустое
{
echo "<script>alert('Поле логин не заполненно');</script>"; // Выводим сообщение об ошибке
}          
elseif (empty($_POST['password'])) // Иначе если поле с паролем пустое
{
echo "<script>alert('Поле пароль не заполненно');</script>"; // Выводим сообщение об ошибке
}                      
else // Иначе если поля не пустые
{
$login = $_POST['login']; // Присваеваем переменной значение из поля с логином   
$email = $_POST['email']; // Присваеваем переменной значение из поля с логином             
$password = md5($_POST['password']); // Присваеваем другой переменной значение из поля с паролем
$pass = $_POST['password'];
$today = date("Y-m-d H:i:s");  
   # проверяем, не сущестует ли пользователя с таким именем 
$query = mysqli_query($connection, "SELECT `id` FROM `users` WHERE `login` = '$login'"); // Формируем переменную с запросом к базе данных с проверкой пользователя
$result = mysqli_fetch_array($query); // Формируем переменную с исполнением запроса к БД 
if (!empty($result['id'])) // Если запрос к бд не возвразяет id пользователя
{
echo "<div align='center' style='color: #000;'>Такой логин существет</div>"; // Значит такой пользователь не существует или не верен пароль
echo '<div align="center"><a href="login.php">авторизоваться</a></div>';
} else{
$query = "INSERT INTO `users` (login, password, email, regdata) VALUES ('$login', '$password', '$email', '$today')"; // Создаем переменную с запросом к базе данных на отправку нового юзера

$result = mysqli_query($connection, $query) or die(mysql_error()); // Отправляем переменную с запросом в базу данных 

// несколько получателей
$to  = $email; // обратите внимание на запятую

// тема письма
$subject = 'Регистрация на сайте аудикниг';

// текст письма
$message = "
Поздравляю. Ты зарегистрирован. </br>
Твой логин:  $login2 </br>
Твой пароль:  $pass </br>
Спасибо за регистрацию.
";

$mailheaders = "Content-type:text/html;charset=utf-8"; 
// почтовый заголовок, указывает формат письма - текстовый и кодировку

$mailheaders .= "From: SiteRobot <bounce@emailplus.ru>"; 
// почтовый заголовок, указывает емайл отправителя


$mailheaders .= "Reply-To: bounce@emailplus.ru"; 
// почтовый заголовок, указывает емайл для ответа 
// лучше если емайл для ответа совпадает с емайлом отправителя, иначе некоторые почтовые сервисы могут классифицировать письмо как спам 


mail($to, $subject, $message, $mailheaders);

echo "<div align='center' style='color: #000;'>Регистрация прошла успешно!</div>"; // Сообщаем что все получилось
echo '<div align="center"><a href="login.php">авторизоваться</a></div>';
}
}
} ?>
                            </div>
                        </div>
                    </div>
            
    	</div>
    </div>

    <div class="main-panel">
       

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
