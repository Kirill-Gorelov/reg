<?php
$mp3_id = $_POST['mp3_id'];
$text = $_POST['text'];
//echo $mp3_id.'</br>';
//echo $text.'</br>';
//echo "UPDATE `link` SET `comment`= ".$text." WHERE `id` = ".$mp3_id."";
// UPDATE `link` SET `comment`= "привет" WHERE `id` = 19
$connection = mysqli_connect('localhost', 'audiname', 'pass', 'audiobook') or die(mysqli_error()); 
mysqli_set_charset($connection, "utf8");
$query = "UPDATE `link` SET `comment`= '$text' WHERE `id` = $mp3_id "; // Создаем переменную с запросом к базе данных на отправку нового юзера
$result = mysqli_query($connection, $query) or die(mysql_error()); 
?>
<script type="text/javascript">
	setTimeout(function(){$('.box').fadeOut('fast')},3000);  //30000 = 30 секунд
</script>
<div class="box">
Комментарий сохранен 
</div>