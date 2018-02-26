<?php
// Заботимся о файловой структуре...
header("Content-type: text/plain; charset=utf-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
if (isset($_REQUEST['link'])){
$link = stripslashes($_REQUEST['link']);
$link = explode('<>',$link );
var_dump($link);
if ($link == '') {
 //unset($link);
 //сделать проверку на то, что ссылка действительно из вк. и ответить, что я не понимаю такую ссылку или напишите в тех поддержку
 echo "<div class='content'>Вы ничего не отправили, вставьте, пожалуйста, ссылки!</div>";
 die;
 }
 } 
 // https://ia801307.us.archive.org/5/items/27PoslednjajaZhertvaChast2/01_Poslednjaja%20zhertva_%20Predislovie.mp3
// https://ia801309.us.archive.org/16/items/010435/01_01_01.mp3
// https://s3.amazonaws.com/MiniMBA-MarketingAds/Audio/Parabellum-Mrochkovskiy-MiniMBA-Marketing-part1.mp3?response-content-type=audio/mpeg&AWSAccessKeyId=AKIAITST4BNSADDOD4WA&Expires=1471126428&Signature=xiy0mgGc8FQ0M3jPMpxyVWnGEIE=
// https://s3.amazonaws.com/MiniMBA-MarketingAds/Audio/Parabellum-Mrochkovskiy-MiniMBA-Marketing-part1.mp3?response-content-type=audio/mpeg&AWSAccessKeyId=AKIAITST4BNSADDOD4WA&Expires=1471165284&Signature=asuO/ntQ/k0LwXnnya5pbdMjeMY=
// https://s3.amazonaws.com/MiniMBA-MarketingAds/Audio/Parabellum-Mrochkovskiy-MiniMBA-Marketing-part1.mp3?response-content-type=audio/mpeg&AWSAccessKeyId=AKIAITST4BNSADDOD4WA&Expires=1471155933&Signature=n/gRWCol6S4sw97VRwg/GpjC9lA=
// UPDATE `link` SET `stoping`=1233,`all`=113 WHERE `id` = 10
?>
<div class="content">
 <form action="mylink.php" method="post">
 <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Тестовое прослушивание аудиозаписи</label>
												<?php
												// echo "<pre>";
											   // // var_dump($pathaudio);
											   // // var_dump(count($pathaudio));
											   // // var_dump($result->response[0]-> copy_history[0] ->attachments[1]->audio);
											// // print_r($pathaudio[5]->audio);
											// echo "</pre>";
											$arr_audio = array();
												foreach($link as $arr){
												if($arr == '') continue;
												 $arr_audio[] = $arr;
												var_dump($arr);
												echo '<audio controls>
													<source src="'.$arr.'" type="audio/mp3">
													</audio>';
												}
														 $ar = serialize($arr_audio);
?>
<textarea  style="display:none;" class="form-control" name="linksaudio" ><?php echo $ar;?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Описание</label>
                                                <textarea rows="5" class="form-control" name="descriptionkniga"><?php echo $nazvanie;?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Добавить книгу</button>
                                    <div class="clearfix"></div>
                                </form>
</div>								
