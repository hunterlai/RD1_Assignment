<?php
require("contodb.php");
// session_start();
$location=$_SESSION["location"];
// echo $location;
$sql="select localName, town, rain, hour_24 from rain where city='$location'";
// echo $sql;
$result=mysqli_query($link,$sql);



?>