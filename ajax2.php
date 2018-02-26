<?php

$request_params = array(
'posts' => '90161593_3804%2Fall',
// 'extended' = '1',
'copy_history_depth' => '2',
'v' => '5.52'
);
// https://psv4.vk.me/c6158/u101964415/audios/fb800495ffde.mp3
$get_params = http_build_query($request_params);
$result = json_decode(file_get_contents('https://api.vk.com/method/wall.getById?'. $get_params));
print_r($result);
//print_r($id['1']);
?>						