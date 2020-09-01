<?php

// @session_start();
// $location=$_SESSION["location"];
require_once("contodb.php");
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
        $sql="insert into rain values('$local_city','$local_name','$local_town',$local_rain,$local_hour_24);";
        $result=mysqli_query($link,$sql);
        
    }
    // for($x=1;$x<23;$x++){
    //     $sql_city="select cityName,cityId from city where cityId=$x";
    //     $result_city=mysqli_query($link,$sql_city);
    //     $row_city=mysqli_fetch_assoc($result_city);
    //     $location=$row_city["cityName"];
    //     $id=$row_city["cityId"];
    //     $find="select cityName,domain from week where cityName='$location'";
    //     $yes=mysqli_query($link,$find);
    //     $row=mysqli_fetch_assoc($yes);

    //     for($i=0;$i<14;$i++){
            
    //         $start=$array["records"]["locations"][0]["location"][$id-1]["weatherElement"][0]["time"][$i]["startTime"];
    //         $end=$array["records"]["locations"][0]["location"][$id-1]["weatherElement"][0]["time"][$i]["endTime"];
    //         $narr = explode("。",$array["records"]["locations"][0]["location"][$id-1]["weatherElement"][0]["time"][$i]["elementValue"][0]["value"]);
    //             // echo $location.$id.$row["cityName"].$row["domain"]."<br>";
    //         if($row["domain"]!="" && $row["cityName"]==$location){
    //             if($i>5){
    //                 $wear_update="update week set startT='$start', endT='$end',
    //                 wx='$narr[0]',t='$narr[1]', ci='$narr[2]' where domain=$i and cityName='$location'";
    //                 $result=mysqli_query($link,$wear_update);
    //             }else{
    //                 $update="update week set startT='$start', endT='$end',
    //                 wx='$narr[0]',pop='$narr[1]',t='$narr[2]', ci='$narr[3]' where domain=$i and cityName='$location'";
    //                 $result=mysqli_query($link,$update);
    //             }
                    
    //         }else{
    //             if($i>5){
    //                 $wear_insert="insert into week (cityName,startT,endT,domain,wx,t,ci)
    //                 values ('$location','$start','$end',$i,'$narr[0]','$narr[1]','$narr[2]')";
    //                 $result=mysqli_query($link,$wear_insert);
    //             }else{
    //                 $insert="insert into week (cityName,startT,endT,domain,wx,pop,t,ci)
    //                 values ('$location','$start','$end',$i,'$narr[0]','$narr[1]','$narr[2]','$narr[3]')";
    //                 // echo $insert;
    //                 $result=mysqli_query($link,$insert);
    //             }
    //         }
    //         // $sql="delete from week where cityName='$location'";
    //         // $result=mysqli_query($link,$sql);
    //     }    
            
    // }

// echo $array["records"]["locations"][0]["location"][0]["weatherElement"][0]["time"][0]["elementValue"][0]["value"];

?>
