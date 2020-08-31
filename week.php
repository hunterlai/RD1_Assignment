<?php

$location=$_SESSION["location"];
$date=$_SESSION["datetime"];
// $weekd=date("Y-m-d H:i:s" ,strtotime("1 week"));


// echo "$tormd"."<br>$acqd";
// 1. 初始設定
$ch = curl_init();
$url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-091?Authorization=CWB-B49B9DCF-7BB9-4300-8452-B146577EE1AE&elementName=WeatherDescription&locationName=$location";
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
    for($i=0;$i<14;$i++){
        $start=$array["records"]["locations"][0]["location"][0]["weatherElement"][0]["time"][$i]["startTime"];
        $end=$array["records"]["locations"][0]["location"][0]["weatherElement"][0]["time"][$i]["endTime"];
        // echo "date:"."$date"."<br>start:"."$start"."<br>"."$end";
        
        for($x=0;$x<7;$x++){
            $setday=date("Y-m-d H:i:s" ,strtotime("$x day"));
            $y=$x+1;
            if($setday>$start && $setday<$end){
                $narr = explode("。",$array["records"]["locations"][0]["location"][0]["weatherElement"][0]["time"][$i]["elementValue"][0]["value"]);
                echo "第"."$y"."天<br>";
                foreach($narr as $key => $val){
                        echo("$narr[$key]<br>");
                }
            }
            
        }
        
    }         

// echo $array["records"]["locations"][0]["location"][0]["weatherElement"][0]["time"][0]["elementValue"][0]["value"];

?>
