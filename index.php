<?php
ini_set ( 'date.timezone' , 'Asia/Taipei' );  
date_default_timezone_set('Asia/Taipei');
session_start();
$location="";
$_SESSION["datetime"]=date("Y-m-d H:i:s");

if(isset($_POST["location"])){
    $location = $_POST["location"];
    $_SESSION["location"]=$location;
}else{
    $_SESSION["location"]="臺北市";
}

if(isset($_POST["okbtn"])){
    $location = $_POST["location"];
    $_SESSION["location"]=$location;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 4, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3>
				氣象站
			</h3>
			<div class="jumbotron">
				<h2>
					Hello, world!
				</h2>
				<form method="post">
					<select name= "location" class="form-control" onchange="this.form.submit()">
						<optgroup label="北部">
						<option <?php if($location== '臺北市'){echo "selected";}?> >臺北市</option>
						<option <?php if($location== '新北市'){echo "selected";}?> >新北市</option>
						<option <?php if($location== '基隆市'){echo "selected";}?> >基隆市</option>
						<option <?php if($location== '宜蘭縣'){echo "selected";}?> >宜蘭縣</option>
						<option <?php if($location== '桃園市'){echo "selected";}?> >桃園市</option>
						<option <?php if($location== '新竹縣'){echo "selected";}?> >新竹縣</option>
						<option <?php if($location== '新竹市'){echo "selected";}?> >新竹市</option>
						</optgroup>
						<optgroup label="中部">
						<option <?php if($location== '臺中市'){echo "selected";}?> >臺中市</option>
						<option <?php if($location== '南投縣'){echo "selected";}?> >南投縣</option>
						<option <?php if($location== '苗栗縣'){echo "selected";}?> >苗栗縣</option>
						<option <?php if($location== '彰化縣'){echo "selected";}?> >彰化縣</option>
						<option <?php if($location== '雲林縣'){echo "selected";}?> >雲林縣</option>
						</optgroup>
						<optgroup label="南部">
						<option <?php if($location== '高雄市'){echo "selected";}?> >高雄市</option>
						<option <?php if($location== '臺南市'){echo "selected";}?> >臺南市</option>
						<option <?php if($location== '屏東縣'){echo "selected";}?> >屏東縣</option>
						<option <?php if($location== '嘉義縣'){echo "selected";}?> >嘉義縣</option>
						<option <?php if($location== '嘉義市'){echo "selected";}?> >嘉義市</option>
						</optgroup>
						<optgroup label="東部">
						<option <?php if($location== '花蓮縣'){echo "selected";}?> >花蓮縣</option>
						<option <?php if($location== '臺東縣'){echo "selected";}?> >臺東縣</option>
						</optgroup>
						<optgroup label="外島">
						<option <?php if($location== '金門縣'){echo "selected";}?> >金門縣</option>
						<option <?php if($location== '連江縣'){echo "selected";}?> >連江縣</option>
						<option <?php if($location== '澎湖縣'){echo "selected";}?> >澎湖縣</option>
						</optgroup>
					</select>
					<input type="submit" name="okbtn" value="未來一周"></input>
					
				</form>
			</div>
			<div class="tabbable" id="tabs-89841">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link" href="#tab1" data-toggle="tab">最近兩日</a>
						<?php require "test.php"?>
					</li>
					<li class="nav-item">
						<a class="nav-link active show" href="#tab2" data-toggle="tab">未來一周</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="panel-175523">
					</div>
					<div class="tab-pane" id="tab2">
						<p>
							<?php require "test2.php"?>
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="card">
						<img class="card-img-top" alt="Bootstrap Thumbnail First" src="https://www.layoutit.com/img/people-q-c-600-200-1.jpg">
						<div class="card-block">
							<h5 class="card-title">
								test1
							</h5>
							<p class="card-text">
								test2
							</p>
							<p>
								<a class="btn btn-primary" href="#">Action</a> 
							</p>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>