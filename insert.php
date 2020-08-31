<?php
// header("content-type: text/html; charset=utf-8");
require_once("contodb.php");
// 1. 初始設定

    $ch = curl_init();
    $url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-089?Authorization=CWB-B49B9DCF-7BB9-4300-8452-B146577EE1AE&elementName=WeatherDescription";

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
for($x=1;$x<23;$x++){
    $sql_city="select cityName,cityId from city where cityId=$x";
    $result_city=mysqli_query($link,$sql_city);
    $row_city=mysqli_fetch_assoc($result_city);
    $location=$row_city["cityName"];
    $id=$row_city["cityId"];
    $find="select cityName,domain from twoday where cityName='$location'";
    $yes=mysqli_query($link,$find);
    $row=mysqli_fetch_assoc($yes);

    for($i=0;$i<24;$i++){
        
        $start=$array["records"]["locations"][0]["location"][$id-1]["weatherElement"][0]["time"][$i]["startTime"];
        $end=$array["records"]["locations"][0]["location"][$id-1]["weatherElement"][0]["time"][$i]["endTime"];
        $narr = explode("。",$array["records"]["locations"][0]["location"][$id-1]["weatherElement"][0]["time"][$i]["elementValue"][0]["value"]);
        // echo $location.$id.$row["cityName"].$row["domain"]."<br>";
        if($row["cityName"]==$location && $row["domain"] != ""){
            if($i>21){
                $wear_update="update twoday set startT='$start', endT='$end',
                wx='$narr[0]',t='$narr[1]', ci='$narr[2]', ws='$narr[3]', rh='$narr[4]' where domain=$i and cityName='$location'";
                // echo $wear_update;
                $wear_up=mysqli_query($link,$update);
            }else{
                $update="update twoday set startT='$start', endT='$end',
                wx='$narr[0]', pop='$narr[1]', t='$narr[2]', ci='$narr[3]', ws='$narr[4]', rh='$narr[5]' where domain=$i and cityName='$location'";
                // echo $update;
                $up=mysqli_query($link,$update);
            }
         }
         else{
            if($i>21){
                $wear="insert into twoday (cityName,startT,endT,domain,wx,pop,t,ci,ws,rh) 
                values ('$location','$start','$end',$i,'$narr[0]','null','$narr[1]','$narr[2]','$narr[3]','$narr[4]')";
                // echo $wear;
                $edwear=mysqli_query($link,$wear);
            }else{
                $sql="insert into twoday (cityName,startT,endT,domain,wx,pop,t,ci,ws,rh) 
                values ('$location','$start','$end',$i,'$narr[0]','$narr[1]','$narr[2]','$narr[3]','$narr[4]','$narr[5]')";
                // echo $sql;
                $inser=mysqli_query($link,$sql);
            }
            
        }
    }
}
// echo $array["records"]["locations"][0]["location"][0]["weatherElement"][0]["time"][0]["elementValue"][0]["value"];

?>
