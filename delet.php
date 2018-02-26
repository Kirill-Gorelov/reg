<?php
$delet_id = $_GET['id']; // id книги
$aut = $_GET['aut']; // id юзера
echo $delet_id.'</br>';
$connection = mysqli_connect('localhost', 'audiname', 'pass', 'audiobook') or die(mysqli_error()); 
$query = "DELETE FROM `kniga` WHERE `id_knigi` = $delet_id"; // Создаем переменную с запросом к базе данных на отправку нового юзера
$result = mysqli_query($connection, $query) or die(mysql_error()); 

$query = "DELETE FROM `link` WHERE `id_knigi` = $delet_id"; // Создаем переменную с запросом к базе данных на отправку нового юзера
$result = mysqli_query($connection, $query) or die(mysql_error()); 

function fullRemove_ff($path,$t="1") {
    $rtrn="1";
    if (file_exists($path) && is_dir($path)) {
        $dirHandle = opendir($path);
        while (false !== ($file = readdir($dirHandle))) {
            if ($file!='.' && $file!='..') {
                $tmpPath=$path.'/'.$file;
                chmod($tmpPath, 0777);
                if (is_dir($tmpPath)) {
                    fullRemove_ff($tmpPath);
                } else {
                    if (file_exists($tmpPath)) {
                        unlink($tmpPath);
                    }
                }
            }
        }
        closedir($dirHandle);
        if ($t=="1") {
            if (file_exists($path)) {
                rmdir($path);
            }
        }
    } else {
        $rtrn="0";
    }
    return $rtrn;
}

$dirr = $_SERVER['DOCUMENT_ROOT']."/reg/users/".$aut."/".$delet_id;
if(is_dir($dirr)){
fullRemove_ff($dirr);
}
// $query = mysqli_query($connection, "SELECT * FROM `link` WHERE `id_knigi` = 252595"); 
// while($result = mysqli_fetch_array($query))
// {
// echo "<tr>";
// echo "<td height=\"45\"><a style=\"font-size:20px;\" href=/reg/play.php?id=".$result['id_knigi']." title=".$result['nazvanie'].">".$result['nazvanie']."</a></td>";
// echo "<td height=\"45\"><a style=\"font-size:20px;\" href=/reg/delet.php?id=".$result['id_knigi']." title=\"удалить книгу \">Удалить книгу</a></td>";
// echo "<tr>";
// // echo $result['id_knigi'] . "<br>";
// }
echo "Книга удалена";
header("Location: /reg/dashboard.php");
?>
