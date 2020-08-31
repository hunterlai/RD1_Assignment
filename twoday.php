<?php
require("contodb.php");

$location=$_SESSION["location"];
$date=$_SESSION["datetime"];
$tormd=date("Y-m-d H:i:s" ,strtotime("1 day"));
$acqd=date("Y-m-d H:i:s" ,strtotime("2 day"));


// echo "$tormd".
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

// var_dump($array);
// echo"$date";
    for($i=0;$i<24;$i++){
        $start=$array["records"]["locations"][0]["location"][0]["weatherElement"][0]["time"][$i]["startTime"];
        $end=$array["records"]["locations"][0]["location"][0]["weatherElement"][0]["time"][$i]["endTime"];
        if($date>$start && $date<$end){
            $narr = explode("。",$array["records"]["locations"][0]["location"][0]["weatherElement"][0]["time"][$i]["elementValue"][0]["value"]);
            foreach($narr as $key => $val){
                    echo("$narr[$key]<br>");
            }
        }
        if($tormd>$start && $tormd<$end){
            $narr = explode("。",$array["records"]["locations"][0]["location"][0]["weatherElement"][0]["time"][$i]["elementValue"][0]["value"]);
            foreach($narr as $key => $val){
                echo("$narr[$key]<br>");
            }
        }
        if($acqd>$start && $acqd<$end){
            $narr = explode("。",$array["records"]["locations"][0]["location"][0]["weatherElement"][0]["time"][$i]["elementValue"][0]["value"]);
            foreach($narr as $key => $val){
                echo("$narr[$key]<br>");
            }
        }

    }         

// echo $array["records"]["locations"][0]["location"][0]["weatherElement"][0]["time"][0]["elementValue"][0]["value"];

?>
