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
switch($row_0["wx"]){
    case '晴':
        $w0="sun";
    break;
    case '多雲':
        $w0="clound_many";
    break;
    case ('晴時多雲'):
        $w0="clound_sun";
    break;
    case ('多雲時晴'):
        $w0="clound_sun";
    break;
    case '陰天':
        $w0="clound";
    break;
    case '多雲時陰短暫陣雨':
        $w0="rain";
    break;
    case '多雲短暫陣雨':
        $w0="rain";
    break;
    case '陰短暫陣雨':
        $w0="rain";
    break;
    case '晴午後短暫雷陣雨':
        $w0="thunder_rain";
    break;
    case '多雲午後短暫雷陣雨':
        $w0="thunder_rain";
    break;
    case '多雲短暫陣雨或雷雨':
        $w0="thunder_rain";
    break;
    case '多雲時陰短暫陣雨或雷雨':
        $w0="thunder_rain";
    break;
}
switch($row_1["wx"]){
    case '晴':
        $w1="sun";
    break;
    case '多雲':
        $w1="clound_many";
    break;
    case ('晴時多雲'):
        $w1="clound_sun";
    break;
    case ('多雲時晴'):
        $w1="clound_sun";
    break;
    case '陰天':
        $w1="clound";
    break;
    case '多雲時陰短暫陣雨':
        $w1="rain";
    break;
    case '多雲短暫陣雨':
        $w1="rain";
    break;
    case '陰短暫陣雨':
        $w1="rain";
    break;
    case '晴午後短暫雷陣雨':
        $w1="thunder_rain";
    break;
    case '多雲午後短暫雷陣雨':
        $w1="thunder_rain";
    break;
    case '多雲短暫陣雨或雷雨':
        $w1="thunder_rain";
    break;
    case '多雲時陰短暫陣雨或雷雨':
        $w1="thunder_rain";
    break;
}
switch($row_2["wx"]){
    case '晴':
        $w2="sun";
    break;
    case '多雲':
        $w2="clound_many";
    break;
    case ('晴時多雲'):
        $w2="clound_sun";
    break;
    case ('多雲時晴'):
        $w2="clound_sun";
    break;
    case '陰天':
        $w2="clound";
    break;
    case '多雲時陰短暫陣雨':
        $w2="rain";
    break;
    case '多雲短暫陣雨':
        $w2="rain";
    break;
    case '陰短暫陣雨':
        $w2="rain";
    break;
    case '晴午後短暫雷陣雨':
        $w2="thunder_rain";
    break;
    case '多雲午後短暫雷陣雨':
        $w2="thunder_rain";
    break;
    case '多雲短暫陣雨或雷雨':
        $w2="thunder_rain";
    break;
    case '多雲時陰短暫陣雨或雷雨':
        $w2="thunder_rain";
    break;
}
switch($row_3["wx"]){
    case '晴':
        $w3="sun";
    break;
    case '多雲':
        $w3="clound_many";
    break;
    case ('晴時多雲'):
        $w3="clound_sun";
    break;
    case ('多雲時晴'):
        $w3="clound_sun";
    break;
    case '陰天':
        $w3="clound";
    break;
    case '多雲時陰短暫陣雨':
        $w3="rain";
    break;
    case '多雲短暫陣雨':
        $w3="rain";
    break;
    case '陰短暫陣雨':
        $w3="rain";
    break;
    case '晴午後短暫雷陣雨':
        $w3="thunder_rain";
    break;
    case '多雲午後短暫雷陣雨':
        $w3="thunder_rain";
    break;
    case '多雲短暫陣雨或雷雨':
        $w3="thunder_rain";
    break;
    case '多雲時陰短暫陣雨或雷雨':
        $w3="thunder_rain";
    break;
}
switch($row_4["wx"]){
    case '晴':
        $w4="sun";
    break;
    case '多雲':
        $w4="clound_many";
    break;
    case ('晴時多雲'):
        $w4="clound_sun";
    break;
    case ('多雲時晴'):
        $w4="clound_sun";
    break;
    case '陰天':
        $w4="clound";
    break;
    case '多雲時陰短暫陣雨':
        $w4="rain";
    break;
    case '多雲短暫陣雨':
        $w4="rain";
    break;
    case '陰短暫陣雨':
        $w4="rain";
    break;
    case '晴午後短暫雷陣雨':
        $w4="thunder_rain";
    break;
    case '多雲午後短暫雷陣雨':
        $w4="thunder_rain";
    break;
    case '多雲短暫陣雨或雷雨':
        $w4="thunder_rain";
    break;
    case '多雲時陰短暫陣雨或雷雨':
        $w4="thunder_rain";
    break;
}
switch($row_5["wx"]){
    case '晴':
        $w5="sun";
    break;
    case '多雲':
        $w5="clound_many";
    break;
    case ('晴時多雲'):
        $w5="clound_sun";
    break;
    case ('多雲時晴'):
        $w5="clound_sun";
    break;
    case '陰天':
        $w5="clound";
    break;
    case '多雲時陰短暫陣雨':
        $w5="rain";
    break;
    case '多雲短暫陣雨':
        $w5="rain";
    break;
    case '陰短暫陣雨':
        $w5="rain";
    break;
    case '晴午後短暫雷陣雨':
        $w5="thunder_rain";
    break;
    case '多雲午後短暫雷陣雨':
        $w5="thunder_rain";
    break;
    case '多雲短暫陣雨或雷雨':
        $w5="thunder_rain";
    break;
    case '多雲時陰短暫陣雨或雷雨':
        $w5="thunder_rain";
    break;
}
switch($row_6["wx"]){
    case '晴':
        $w6="sun";
    break;
    case '多雲':
        $w6="clound_many";
    break;
    case ('晴時多雲'):
        $w6="clound_sun";
    break;
    case ('多雲時晴'):
        $w6="clound_sun";
    break;
    case '陰天':
        $w6="clound";
    break;
    case '多雲時陰短暫陣雨':
        $w6="rain";
    break;
    case '多雲短暫陣雨':
        $w6="rain";
    break;
    case '陰短暫陣雨':
        $w6="rain";
    break;
    case '晴午後短暫雷陣雨':
        $w6="thunder_rain";
    break;
    case '多雲午後短暫雷陣雨':
        $w6="thunder_rain";
    break;
    case '多雲短暫陣雨或雷雨':
        $w6="thunder_rain";
    break;
    case '多雲時陰短暫陣雨或雷雨':
        $w6="thunder_rain";
    break;
}





?>