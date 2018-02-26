<?php
// Заботимся о файловой структуре...
header("Content-type: text/plain; charset=utf-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
if (isset($_REQUEST['link'])){
$link = stripslashes($_REQUEST['link']);
$id = explode('wall',$link );
if ($link == '') {
 unset($link);
 //сделать проверку на то, что ссылка действительно из вк. и ответить, что я не понимаю такую ссылку или напишите в тех поддержку
 echo "<div class='content'>Извините, что-то пошло не так(</div>";
 die;
 }
 // https://new.vk.com/feed?w=wall-28556858_147276
 } 
$request_params = array(
'posts' => $id['1'],
// 'extended' = '1',
'copy_history_depth' => '2',
'v' => '5.52'
);
// https://psv4.vk.me/c6158/u101964415/audios/fb800495ffde.mp3
$get_params = http_build_query($request_params);
$result = json_decode(file_get_contents('https://api.vk.com/method/wall.getById?'. $get_params));
//print_r($result);
//print_r($id['1']);
?>
<div class="content">
 <form action="add-vk.php" method="post">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
											<?php
											if ($result -> response[0] -> text == ''){
												 $nazvanie = $result -> response[0] -> copy_history[0] -> text;
											}else{
												 $nazvanie = $result -> response[0] -> text;
											}
											// echo "<pre>";
											  // // var_dump($result);
											// // print_r($result);
											// echo "</pre>";
											?>
                                                <label>Название книги *</label>
                                                <input type="text" class="form-control" name="nazvanie" required value="<?php echo $nazvanie;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Автор</label>
                                                <input type="text" class="form-control" name="autor" value="<?php echo $nazvanie;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Издательство</label>
                                                <input type="text" class="form-control" name="izdatelstvo">
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Жанр</label>
                                                <input type="text" class="form-control" name="zanr" >
                                            </div>
                                        </div>
										 <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Год</label>
                                                <input type="text" class="form-control" name="zanr" >
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Выбрать обложку</label>
												<?php
											if ($result->response[0]->attachments[0]->photo != ''){
												 // $pathimg = $result->response[0]->attachments[0]->photo;
												 $pathimg = $result->response[0]->attachments[0]->photo->photo_604;
											}else{
												 // $pathimg = $result->response[0]-> copy_history[0] ->attachments[0]->photo;
												 $pathimg = $result->response[0]-> copy_history[0] ->attachments[0]->photo->photo_604;
											}
											// echo "<pre>";
											    // // var_dump($pathimg);
												// // echo $pathimg;
											// // print_r($result);
											// echo "</pre>";
													 // preg_match("/(\S*.(png|jpg))/", $arrmas, $pathimg);
														// var_dump($arrmas);
														// var_dump($matches);
?>
                                              <img src="<?php echo $pathimg;?>">
											   <input type="hidden" class="form-control" name="oblozka" value="<?php echo $pathimg;?>">
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Тестовое прослушивание аудиозаписи</label>
												<?php
											if ($result->response[0]->attachments != ''){
												 $pathaudio = $result->response[0]->attachments;
											}else{
												 $pathaudio = $result->response[0]-> copy_history[0] ->attachments;
											}
											// echo "<pre>";
											   // // var_dump($pathaudio);
											   // // var_dump(count($pathaudio));
											   // // var_dump($result->response[0]-> copy_history[0] ->attachments[1]->audio);
											// // print_r($pathaudio[5]->audio);
											// echo "</pre>";
												
												// array_shift($pathaudio);
												$cl = count($pathaudio);
														$arr_audio = array();
														// var_dump($pathaudio);
															for($i=0; $i++<$cl;){
															// echo $i;
															$arr_audio[] = $pathaudio[$i]->audio->url;
																 // echo $pathaudio[1]->audio;
																 // print_r($pathaudio[$i]->audio);
																 // echo $pathaudio[$i]->audio->url;
																  // echo $pathaudio[$i]->audio->title;
																// echo '<audio controls>';
																	// echo '<source src="https://cs1-43v4.vk-cdn.net/p10/2fc1940541a2a2.mp3" type="audio/mpeg">';
																// echo '</audio>';
															}
													// preg_match("/(\S*.(png|jpg))/", $arrmas, $matches);
														//var_dump($arrmas);
														// var_dump($matches);
														// var_dump($arr_audio);
														foreach($arr_audio as $key =>$val){
															echo "<input type=text name=$key value=$val>"; 
														}
														$ar = serialize($arr_audio);
?>
<textarea style="display:none;" class="form-control" name="linksaudio" ><?php echo $ar;?></textarea>
                                            </div>
                                        </div>
                                    </div>
									<div class="row">
                                        <div id="status" ></div>
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