<?php
require("contodb.php");
$location=$_SESSION["location"];
$date=$_SESSION["datetime"];
$tormd=date("Y-m-d H:i:s" ,strtotime("1 day"));
$acqd=date("Y-m-d H:i:s" ,strtotime("2 day"));

$select_now="select wx,pop,t,ws from twoday where cityName='$location' 
and '$date' between startT and endT";
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

switch($row["wx"]){
    case '晴':
        $today="sun";
    break;
    case '多雲':
        $today="clound_many";
    break;
    case ('晴時多雲'|'多雲時晴'):
        $today="clound_sun";
    break;
    case '陰':
        $today="clound";
    break;
    case '短暫陣雨或雷雨':
        $today="thunder_rain";
    break;
    case '午後短暫雷陣雨':
        $today="thunder_rain";
    break;
    case '短暫陣雨':
        $today="rain";
    break;


}
switch($row_torm["wx"]){
    case '晴':
        $torm="sun";
    break;
    case '多雲':
        $torm="clound_many";
    break;
    case ('晴時多雲'|'多雲時晴'):
        $torm="clound_sun";
    break;
    case '陰':
        $torm="clound";
    break;
    case '短暫陣雨或雷雨':
        $torm="thunder_rain";
    break;
    case '午後短暫雷陣雨':
        $torm="thunder_rain";
    break;
    case '短暫陣雨':
        $torm="rain";
    break;
}
switch($row_acq["wx"]){
    case '晴':
        $acq="sun";
    break;
    case '多雲':
        $acq="clound_many";
    break;
    case ('晴時多雲'|'多雲時晴'):
        $acq="clound_sun";
    break;
    case '陰':
        $acq="clound";
    break;
    case '短暫陣雨或雷雨':
        $acq="thunder_rain";
    break;
    case '午後短暫雷陣雨':
        $acq="thunder_rain";
    break;
    case '短暫陣雨':
        $acq="rain";
    break;
}
?>