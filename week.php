<?php
require("contodb.php");
$location=$_SESSION["location"];
for($x=0;$x<7;$x++){
    $week=date("Y-m-d H:i:s",strtotime("$x day"));
    $select_now="select wx,pop,t,ci from week where cityName='$location' 
    and '$week' between startT and endT";
    // echo $select_now;
    switch($x){
        case 0:
            $result_0=mysqli_query($link,$select_now);
            $row_0=mysqli_fetch_assoc($result_0);
        break;
        case 1:
            $result_1=mysqli_query($link,$select_now);
            $row_1=mysqli_fetch_assoc($result_1);
        break;
        case 2:
            $result_2=mysqli_query($link,$select_now);
            $row_2=mysqli_fetch_assoc($result_2);
        break;
        case 3:
            $result_3=mysqli_query($link,$select_now);
            $row_3=mysqli_fetch_assoc($result_3);
        break;
        case 4:
            $result_4=mysqli_query($link,$select_now);
            $row_4=mysqli_fetch_assoc($result_4);
        break;
        case 5:
            $result_5=mysqli_query($link,$select_now);
            $row_5=mysqli_fetch_assoc($result_5);
        break;
        case 6:
            $result_6=mysqli_query($link,$select_now);
            $row_6=mysqli_fetch_assoc($result_6);
        break;

    }
}





?>