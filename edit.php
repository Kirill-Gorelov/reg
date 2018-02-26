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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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


  <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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
                    <? echo $_SESSION['login'];	?>
                </a>
            </div>

            <ul class="nav">
                <li >
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Главная</p>
                    </a>
                </li>
                <li class="active">
                    <a href="add.php">
                        <i class="pe-7s-user"></i>
                        <p>Добавить книгу</p>
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
       <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Редактирование</h4>
                            </div>
							
                            <div class="content">
									 <div class="row">
									 
									 <?php 
									  $idknigi = $_GET['edit'];
									echo '<p><a href="/reg/play.php?id='.$idknigi.'" title="вернуться назад">Вернуться</a></p>';
									 $connection = mysqli_connect('localhost', 'audiname', 'pass', 'audiobook') or die(mysqli_error());  
                                     mysqli_set_charset($connection, "utf8");
									 $query = mysqli_query($connection, "SELECT `nazvanie`, `autor`, `descriptionkniga`, `izdatelstvo` FROM `kniga` WHERE `id_knigi` = '$idknigi'"); 
while($result = mysqli_fetch_array($query)){
     ?>
<div class="col-md-5">
                <div class="form-group">
                    <label>Название</label>
                    <input type="text" id="nazvanie" onChange="editGet1()" class="form-control"  name="nazvanie" value="<?php echo $result['nazvanie'] ?>">
					<div id="nazvanie1"></div>
                </div>
      </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Автор</label>
                    <input type="text" id="autor" onChange="editGet2()" class="form-control" name="autor" value="<?php echo  $result['autor'] ?>">
					<div id="autor1"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Издательство</label>
                    <input type="text" id="izdatelstvo" onChange="editGet3()" class="form-control" name="izdatelstvo" value="<?php echo $result['izdatelstvo'] ?>">
					<div id="izdatelstvo1"></div>
                </div>
            </div>
        </div>
		<div class="row">
         <div class="col-md-5">
                <div class="form-group">
                    <label>Категория</label>
                    <select onChange="editGet5()" id="cat" name="cat" class="form-control">
                        <option >Выбери категорию</option>
                        <?php 
                         $query1 = mysqli_query($connection, "SELECT * FROM `categori` WHERE 1"); 
                         while($result = mysqli_fetch_array($query1)){
                        ?>
                    
                    <option value="<?php echo $result['id']?>"><?php echo $result['name']?></option>
                    <?php }?>
                    </select>
                    <div id="cat"></div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Описание</label>
                        <textarea type="text" id="descriptionkniga" onChange="editGet4()" class="form-control" name="descriptionkniga" ><?php echo $result['descriptionkniga'] ?></textarea>
    					<div id="descriptionkniga1"></div>
                    </div>
                </div>
        </div>
        </div>
        
							
<script>
 function editGet1() {
 var txt1 = document.getElementById("nazvanie");
txt1.onchange = function() {editGet1()};
var nazvanie = $("#nazvanie").val();
var id_knigi = '<?php echo $idknigi ?>';
    // alert(nazvanie);
    $.ajax({
        type: "POST",
        url: "/reg/ajax-edit-link.php",
        data: {id_knigi:id_knigi, nazvanie:nazvanie}
    }).done(function( result )
        {
            $("#nazvanie1").html(result);
        });
}

 function editGet2() {
 var txt = document.getElementById("autor");
txt.onchange = function() {editGet2()};
var autor = $("#autor").val();
var id_knigi = '<?php echo $idknigi ?>';
  //  alert(text);
    $.ajax({
        type: "POST",
        url: "/reg/ajax-edit-link.php",
        data: {id_knigi:id_knigi, autor:autor}
    }).done(function( result )
        {
            $("#autor1").html(result);
        });
}

 function editGet3() {
 var txt = document.getElementById("izdatelstvo");
txt.onchange = function() {editGet3()};
var izdatelstvo = $("#izdatelstvo").val();
var id_knigi = '<?php echo $idknigi ?>';
  //  alert(text);
    $.ajax({
        type: "POST",
        url: "/reg/ajax-edit-link.php",
        data: {id_knigi:id_knigi, izdatelstvo:izdatelstvo}
    }).done(function( result )
        {
            $("#izdatelstvo1").html(result);
        });
}

 function editGet4() {
 var txt = document.getElementById("descriptionkniga");
txt.onchange = function() {editGet4()};
var descriptionkniga = $("#descriptionkniga").val();
var id_knigi = '<?php echo $idknigi ?>';
  //  alert(text);
    $.ajax({
        type: "POST",
        url: "/reg/ajax-edit-link.php",
        data: {id_knigi:id_knigi, descriptionkniga:descriptionkniga}
    }).done(function( result )
        {
            $("#descriptionkniga1").html(result);
        });
}

 function editGet5() {
    // var x = document.getElementById("mySelect").value;
 var txt = document.getElementById("cat").value;
 //alert(txt);
// txt.onchange = function() {editGet5()};
var cat = $("#cat").val();
var id_knigi = '<?php echo $idknigi ?>';
  //  alert(text);
    $.ajax({
        type: "POST",
        url: "/reg/ajax-edit-link.php",
        data: {id_knigi:id_knigi, cat:cat}
    }).done(function( result )
        {
            $("#descriptionkniga1").html(result);
        });
}
</script>
	<?php								
	

} //конец whшle
//echo '<div id="nn"></div>';                                  
echo '<ul id="sortable">';									
$ch = 0;
mysqli_set_charset($connection, "utf8");
$query = mysqli_query($connection, "SELECT `title_links`, `id`, `sort` FROM `link` WHERE `id_knigi` = '$idknigi' ORDER by `sort` ASC"); 
while($result = mysqli_fetch_array($query))
{

echo'
<li class="ui-state-default" id="item_'.$ch.'" style="height:55px;">
<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
<!--<div class="row">
 <div class="col-md-4">
            <label for="exampleInputEmail1">'.$ch.'</label>
    </div>	

  <div class="col-md-11">
          <div class="form-group">
 -->             
              <input type="text" class="form-control" id="'.$ch.'" onChange="CommentGet'.$ch.'()" value="'.$result['title_links'].'">
              <input type="hidden" class="form-control" id="newitem_'.$ch.'"  >
              <input type="hidden" class="form-control" id="link_'.$ch.'"  value="'.$result['id'].'">
            <!--  value="'.$result['sort'].'" -->
			  <div id="save'.$ch.'"></div>
 <!--         </div>
    </div>
</div> 
-->
</li>	

<script>
 function CommentGet'.$ch.'() {
 var txt'.$ch.' = document.getElementById("'.$ch.'");
txt'.$ch.'.onchange = function() {CommentGet'.$ch.'()};
var text = $("#'.$ch.'").val();
var mp3_id = '.$result['id'].';
  //  alert(text);
    $.ajax({
        type: "POST",
        url: "/reg/ajax-edit-link.php",
        data: {mp3_id:mp3_id, text:text}
    }).done(function( result )
        {
            $("#save'.$ch.'").html(result);
        });
}
</script>
				';	
$ch++;					
}



 ?>
</ul>
                                    <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
<style type="text/css">
#sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
#sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
#sortable li span { position: absolute; margin-left: -1.3em; }
</style>        
<script type="text/javascript">
    var div = document.getElementById("sortable");
var elems = div.getElementsByTagName('li');


$("#sortable").sortable({
    /*stop: function(event, ui) {
        alert("New position: " + ui.item.index());
    }*/
    start: function(e, ui) {
        // creates a temporary attribute on the element with the old index
        $(this).attr('data-previndex', ui.item.index());
    },
    update: function(e, ui) {
//console.log(elems);
for(var i=0; i<elems.length; i++) {

var ii = elems[i].id;
var nnew_s = "new"+ii;
document.getElementById(nnew_s).value = i;
// var mp3_id = $("#link_"+i).val();
 // console.log(ii);
 // var newitem = $("#newitem_"+i).val() // номер сортировки значение
  // console.log(mp3_id+' / '+ newitem);
        $(this).removeAttr('data-previndex');

    }

    for(var i=0; i<elems.length; i++) {

var ii = elems[i].id;
var nnew_s = "new"+ii;
// document.getElementById(nnew_s).value = i;
var mp3_id = $("#link_"+i).val();
 // console.log(ii);
 var newitem = $("#newitem_"+i).val() // номер сортировки значение
  console.log(mp3_id+' / '+ newitem);
        // $(this).removeAttr('data-previndex');

    $.ajax({
        type: "POST",
        url: "/reg/ajax-edit-link.php",
        data: {
            mp3_id:mp3_id, // номер строки
            newitem:newitem, // порядковый номер
         }
    }).done(function( result )
        {
            $("#nn").html(result);
        });

    }
    }
   
});
$("#sortable").disableSelection();
</script>
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

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

<script type="text/javascript">   
$(document).ready(function(){

$("#send").click(function(){

 $("#status").load("ajax-zip.php","namefile="+$("#link").val()); /* Так мы собираем данные из форм и сразу отправляем! */

})

});             
</script> 

</html>
