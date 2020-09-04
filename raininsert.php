<?php
// @session_start();
// $location=$_SESSION["location"];
require("contodb.php");
$date=date("Y-m-d");
$dele="delete from rain";
$trash=mysqli_query($link,$dele);
// 1. 初始設定

    $ch = curl_init();
    $url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/O-A0002-001?Authorization=CWB-B49B9DCF-7BB9-4300-8452-B146577EE1AE&elementName=RAIN,HOUR_24";

// 2. 設定 / 調整參數

    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT,1);

    // 3. 執行，取回 response 結果
    $result = curl_exec($ch);
    // 4. 關閉與釋放資源
    // curl_close($ch);
    $result=file_get_contents($url);
    $array = json_decode($result,true);

    // var_dump($array);
    $length=count($array["records"]["location"]);
    // echo $length;
    
    for($x=0;$x<$length;$x++){
        $local_name=$array["records"]["location"][$x]["locationName"];
        $local_city=$array["records"]["location"][$x]["parameter"][0]["parameterValue"];
        $local_town=$array["records"]["location"][$x]["parameter"][2]["parameterValue"];        
        $local_rain=$array["records"]["location"][$x]["weatherElement"][0]["elementValue"];
        $local_hour_24=$array["records"]["location"][$x]["weatherElement"][1]["elementValue"];
        
        // echo $x.$local_name."C=".$local_city."T=".$local_town."R=".$local_rain."H=".$local_hour_24."<br>";
        $sql="insert into rain values('$local_city','$local_name','$local_town',$local_rain,$local_hour_24,'$date');";
        $result=mysqli_query($link,$sql);
    }

// echo $array["records"]["locations"][0]["location"][0]["weatherElement"][0]["time"][0]["elementValue"][0]["value"];

?>
