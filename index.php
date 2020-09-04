<?php
ini_set ( 'date.timezone' , 'Asia/Taipei' );  
date_default_timezone_set('Asia/Taipei');
require "contodb.php";
session_start();


$location="臺北市";
$_SESSION["datetime"]=date("Y-m-d H:i:s");
$date=date("Y-m-d");
$two=date("Y-m-d H:i:s",strtotime("2 day"));
$weekday=date("Y-m-d H:i:s",strtotime("6 day"));
// echo $two;
if(isset($_POST["location"])){
    $location = $_POST["location"];
    $_SESSION["location"]=$location;
}else{
    $_SESSION["location"]="臺北市";
}
$search="select startT,endT from twoday 
where cityName='$location' and '$two' between startT and endT";
// echo $search;
$result_search=mysqli_query($link,$search);
$row_search=@mysqli_fetch_assoc($result_search);
if($two>@$row_search["startT"] && $two<@$row_search["endT"]){
		// echo "don't have to update! &nbsp";
}else{
	echo "update or inserting &nbsp";
	require "insert.php";
	header("location index.php");
}
$search_week="select startT,endT from week
where cityName='$location' and '$weekday' between startT and endT";
// echo $search_week;	
$result_week=mysqli_query($link,$search_week);
$row_forweek=@mysqli_fetch_assoc($result_week);
if($weekday>@$row_forweek["startT"] && $weekday<@$row_forweek["endT"]){
	//  echo "week have already enter!";
}else{
	echo "update or inserting week data";
	require "weekinsert.php";
	header("location index.php");
}
// require "weekinsert.php";
$search_rain="select today from rain";
$result_rain=mysqli_query($link,$search_rain);
$row_rain=@mysqli_fetch_assoc($result_rain);
if($row_rain["today"]!=$date){
	require "raininsert.php";
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weather</title>
    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<script type="text/javascript" src="./jquery.min.js"></script>
	<script type="text/javascript">
        $(document).ready(test);

        function test(){
            $("#tableSearch").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#myTable tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
        }

    </script>
	
	<style type="text/css">
	.jumbotron{
		padding:10rem 2rem;
	}
	.resize {
		width : auto;
		width : 250px;
	}

	.resize {
		height : auto;
		height : 250px;
	}
	</style>

	

	

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12" >
			<h3>
				氣象站
			</h3>
			<div class="jumbotron" style="background-image:url('./img/<?=$location?>.jpg');">
				<h2 style="color:white;">
					臺灣各縣市
				</h2>
				<form method="post">
					<select name= "location" class="form-control" style="width:350px;" onchange="this.form.submit()">
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
						<option <?php if($location== '苗栗縣'){echo "selected";}?> >苗栗縣</option>
						<option <?php if($location== '臺中市'){echo "selected";}?> >臺中市</option>
						<option <?php if($location== '彰化縣'){echo "selected";}?> >彰化縣</option>
						<option <?php if($location== '南投縣'){echo "selected";}?> >南投縣</option>
						<option <?php if($location== '雲林縣'){echo "selected";}?> >雲林縣</option>
						</optgroup>
						<optgroup label="南部">
						<option <?php if($location== '嘉義縣'){echo "selected";}?> >嘉義縣</option>
						<option <?php if($location== '嘉義市'){echo "selected";}?> >嘉義市</option>
						<option <?php if($location== '臺南市'){echo "selected";}?> >臺南市</option>
						<option <?php if($location== '高雄市'){echo "selected";}?> >高雄市</option>
						<option <?php if($location== '屏東縣'){echo "selected";}?> >屏東縣</option>
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
					
				</form>
			</div>
			
			<div class="tabbable" >
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active show" href="#tab1" data-toggle="tab">最近兩日</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="#tab2" data-toggle="tab">未來一周</a>
					</li>
					<li class="nav-item">
						<a class="nav-link " href="#tab3" data-toggle="tab">雨量</a>
					</li>
					
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab1" >
						<p>
						<?php require "two.php"?>
						<div class="row">
							<div class="col-md-4">
							<img alt="<?=$today?>" src="weather/<?=$today?>.jpg" class="rounded resize" >
							<div>
								<div class="card-block">
									<h4>今日 <?php echo date("m/d");?></h4>
									<hr>
									<h5 class="card-title">
										<?php echo $row["wx"];?>
									</h5>
									<p class="card-text">
										<?php echo $row["pop"];?>
									</p>
									<p class="card-text">
										<?php echo $row["t"];?>
									</p>
									<p class="card-text">
										<?php echo $row["ws"];?>
									</p>
								</div>
							</div>
						</div>
							<div class="col-md-4">
							<img alt="<?=$torm?>" src="weather/<?=$torm?>.jpg" class="rounded resize" >
								<div >
									<div class="card-block">
										<h4>明日 <?php echo date("m/d",strtotime("1 day"));?></h4>
										<hr>
										<h5 class="card-title">
											<?php echo $row_torm["wx"];?>
										</h5>
										<p class="card-text">
											<?php echo $row_torm["pop"];?>
										</p>
										<p class="card-text">
											<?php echo $row_torm["t"];?>
										</p>
										<p class="card-text">
											<?php echo $row_torm["ws"];?>
										</p>
									</div>
								</div>
							</div>
						<div class="col-md-4">
						<img alt="<?=$acq?>" src="weather/<?=$acq?>.jpg" class="rounded resize" >
							<div>
								<div class="card-block">
									<h4>後天 <?php echo date("m/d",strtotime("2 day"));?></h4>
									<hr>
									<h5 class="card-title">
										<?php echo $row_acq["wx"];?>
									</h5>
									<p class="card-text">
										<?php echo $row_acq["pop"];?>
									</p>
									<p class="card-text">
										<?php echo $row_acq["t"];?>
									</p>
									<p class="card-text">
										<?php echo $row_acq["ws"];?>
									</p>
								</div>
							</div>
						</div>
						</p>
					</div>
						
					</div>
					<div class="tab-pane" id="tab2">
						<p>
							<?php require "week.php"?>
							<div class="row">
							<div class="col-md-4">
								<div class="card">
									<div class="card-block">
										<h5 class="card-title">
											<?php echo $row_0["wx"];?>
										</h5>
										<p class="card-text">
											<?php echo $row_0["pop"];?>
										</p>
										<p class="card-text">
											<?php echo $row_0["t"];?>
										</p>
										<p class="card-text">
											<?php echo $row_0["ci"];?>
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-block">
										<h5 class="card-title">
											<?php echo $row_1["wx"];?>
										</h5>
										<p class="card-text">
											<?php echo $row_1["pop"];?>
										</p>
										<p class="card-text">
											<?php echo $row_1["t"];?>
										</p>
										<p class="card-text">
											<?php echo $row_1["ci"];?>
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-block">
										<h5 class="card-title">
											<?php echo $row_2["wx"];?>
										</h5>
										<p class="card-text">
											<?php echo $row_2["pop"];?>
										</p>
										<p class="card-text">
											<?php echo $row_2["t"];?>
										</p>
										<p class="card-text">
											<?php echo $row_2["ci"];?>
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card">
									<div class="card-block">
										<h5 class="card-title">
											<?php echo $row_3["wx"];?>
										</h5>
										<p class="card-text">
											<?php echo $row_3["pop"];?>
										</p>
										<p class="card-text">
											<?php echo $row_3["t"];?>
										</p>
										<p class="card-text">
											<?php echo $row_3["ci"];?>
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card">
									<div class="card-block">
										<h5 class="card-title">
											<?php echo $row_4["wx"];?>
										</h5>
										<p class="card-text">
											<?php echo $row_4["pop"];?>
										</p>
										<p class="card-text">
											<?php echo $row_4["t"];?>
										</p>
										<p class="card-text">
											<?php echo $row_4["ci"];?>
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card">
									<div class="card-block">
										<h5 class="card-title">
											<?php echo $row_5["wx"];?>
										</h5>
										<p class="card-text">
											<?php echo $row_5["pop"];?>
										</p>
										<p class="card-text">
											<?php echo $row_5["t"];?>
										</p>
										<p class="card-text">
											<?php echo $row_5["ci"];?>
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card">
									<div class="card-block">
										<h5 class="card-title">
											<?php echo $row_6["wx"];?>
										</h5>
										<p class="card-text">
											<?php echo $row_6["pop"];?>
										</p>
										<p class="card-text">
											<?php echo $row_6["t"];?>
										</p>
										<p class="card-text">
											<?php echo $row_6["ci"];?>
										</p>
									</div>
								</div>
							</div>
						</p>
					</div>	
				</div>
				<div class="tab-pane" id="tab3">
						<?php require "rain.php"?>
						<p>
						<div class="container">
							<input class="form-control mb-4" id="tableSearch" type="text"
								placeholder="Type something to search list items">

							<table class="table table-bordered table-striped">
								<thead>
								<tr>
									<th>localName</th>
									<th>town</th>
									<th>rain</th>
									<th>hour_24</th>
								</tr>
								</thead>
								<tbody id="myTable">
								<?php while($row=mysqli_fetch_assoc($result)){ 
												if($row["rain"]==-998.00 ){
													$row["rain"]=0.00;
												}
												if($row["hour_24"]==-999.00){
													$row["hour_24"]=0.00;
												}
												?>
								<tr>
									<td><?=$row["localName"]?></td>
									<td><?=$row["town"]?></td>
									<td><?=$row["rain"]?></td>
									<td><?=$row["hour_24"]?></td>
								</tr>
											<?php } ?>
								</tbody>
							</table>
						</div>
							
						</p>
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