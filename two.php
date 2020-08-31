<?php
// require("contodb.php");
$location=$_SESSION["location"];
$tormd=date("Y-m-d H:i:s" ,strtotime("1 day"));
$acqd=date("Y-m-d H:i:s" ,strtotime("2 day"));

$select_now="select wx,pop,t,ws from twoday where cityName='$location'";
$result_now=mysqli_query($link,$select_now);
$row=mysqli_fetch_assoc($result_now);

$select_torm="select wx,pop,t,ws from twoday 
where cityName='$location' and '$tormd' between startT and endT";
$result_torm=mysqli_query($link,$select_torm);
$row_torm=mysqli_fetch_assoc($result_torm);


$select_acq="select wx,pop,t,ws from twoday 
where cityName='$location' and '$acqd' between startT and endT";
$result_acq=mysqli_query($link,$select_acq);
$row_acq=mysqli_fetch_assoc($result_acq);
?>