<?php
header("content-type: text/html; charset=utf-8");
if(isset($_POST["okbtn"])){
    // echo "ok";
    $location=$_POST["location"];
    $_SESSION["location"]=$location;
    $_SESSION["datetime"]=date("Y-m-d H:i:s");
}
$location=$_SESSION["location"];
$date=$_SESSION["datetime"];

// 1. 初始設定
$ch = curl_init();
$url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-089?Authorization=CWB-B49B9DCF-7BB9-4300-8452-B146577EE1AE&locationName=$location&elementName=WeatherDescription";
// 2. 設定 / 調整參數

curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);

// 3. 執行，取回 response 結果
$result = curl_exec($ch);
// 4. 關閉與釋放資源
curl_close($ch);
$result=file_get_contents($url);
$array = json_decode($result,true);

    for($i=1;$i<24;$i++){
        $start=$array["records"]["locations"][0]["location"][0]["weatherElement"][0]["time"][$i]["startTime"];
        $end=$array["records"]["locations"][0]["location"][0]["weatherElement"][0]["time"][$i]["endTime"];
        if($date>$start && $date<$end){
            echo $array["records"]["locations"][0]["location"][0]["weatherElement"][0]["time"][$i]["elementValue"][0]["value"];
        }
    }         

// echo $array["records"]["locations"][0]["location"][0]["weatherElement"][0]["time"][0]["elementValue"][0]["value"];

?>
