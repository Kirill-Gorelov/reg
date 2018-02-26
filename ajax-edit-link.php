<?php
$connection = mysqli_connect('localhost', 'audiname', 'pass', 'audiobook') or die(mysqli_error()); 
mysqli_set_charset($connection, "utf8");
if (!empty($_POST['newitem'])) {
	$mp3_id = $_POST['mp3_id'];
	$newitem = $_POST['newitem'];
	$book = $_POST['book'];
	// echo $title;
	// echo $mp3_id;
	$query = "UPDATE `link` SET `sort` = '$newitem' WHERE `id` = '$mp3_id'"; // Создаем переменную с запросом к базе данных на отправку нового юзера
	$result = mysqli_query($connection, $query) or die(mysql_error()); 
}
if(($_POST['mp3_id'] != '') and ($_POST['text'] != '')) {
	$mp3_id = $_POST['mp3_id'];
	$title = $_POST['text'];
	// echo $title;
	// echo $mp3_id;
	$query = "UPDATE `link` SET `title_links` = '$title' WHERE `id` = $mp3_id"; // Создаем переменную с запросом к базе данных на отправку нового юзера
	$result = mysqli_query($connection, $query) or die(mysql_error()); 
}
if($_POST['id_knigi'] != ''){
$id_knigi = $_POST['id_knigi'];
	if($_POST['nazvanie'] != ''){
		$nazvanie = $_POST['nazvanie'];
		$query = "UPDATE `kniga` SET `nazvanie` = '$nazvanie' WHERE `id_knigi` = $id_knigi"; 
		$result = mysqli_query($connection, $query) or die(mysql_error()); 
	}
	
	if($_POST['autor'] != ''){
		$autor = $_POST['autor'];
		$query = "UPDATE `kniga` SET `autor` = '$autor' WHERE `id_knigi` = $id_knigi"; 
		$result = mysqli_query($connection, $query) or die(mysql_error()); 
	}
	
	if($_POST['izdatelstvo'] != ''){
		$izdatelstvo = $_POST['izdatelstvo'];
		$query = "UPDATE `kniga` SET `izdatelstvo` = '$izdatelstvo' WHERE `id_knigi` = $id_knigi"; 
		$result = mysqli_query($connection, $query) or die(mysql_error()); 
	}
	
	if($_POST['descriptionkniga'] != ''){
		$descriptionkniga = $_POST['descriptionkniga'];
		$query = "UPDATE `kniga` SET `descriptionkniga` = '$descriptionkniga' WHERE `id_knigi` = $id_knigi"; 
		$result = mysqli_query($connection, $query) or die(mysql_error()); 
	}

	if($_POST['cat'] != ''){
		$cat = $_POST['cat'];
		$query = "UPDATE `kniga` SET `id_cat` = '$cat' WHERE `id_knigi` = $id_knigi"; 
		$result = mysqli_query($connection, $query) or die(mysql_error()); 
	}
}
// print_r($query);
?>
<script type="text/javascript">
	setTimeout(function(){$('.box').fadeOut('fast')},3000);  //30000 = 30 секунд
</script>
<div class="box">
Сохранено
</div>

