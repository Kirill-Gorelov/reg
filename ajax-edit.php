<?php
UPDATE `kniga` SET `nazvanie`= 'новое название' WHERE `id_knigi`=257773
$curr_time = $_POST['curr_time'];
$mp3_id = $_POST['mp3_id'];
$time_all = $_POST['time_all'];
echo round($curr_time/60,2).'</br>';
echo $mp3_id.'</br>';
echo round($time_all/60,2).'</br>';
$procent = ($curr_time * 100)/$time_all;
// echo round($procent,2);
$connection = mysqli_connect('localhost', 'audiname', 'pass', 'audiobook') or die(mysqli_error()); 
mysqli_set_charset($connection, "utf8");
$query = "UPDATE `link` SET `progress` = $procent, `stoping`= $curr_time,`all`= $time_all WHERE `id` = $mp3_id"; // Создаем переменную с запросом к базе данных на отправку нового юзера
$result = mysqli_query($connection, $query) or die(mysql_error()); 
?>

<div class="container">
  <div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo round($procent,2); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo round($procent,2); ?>%">
    <?php echo round($procent,2); ?> % 
    </div>
  </div>
</div>
