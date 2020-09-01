<?php

// ignore_user_abort();//關掉瀏覽器，PHPscripts也可以繼續執行.
// set_time_limit(0);// 通過set_time_limit(0)可以讓程式無限制的執行下去
$interval=10;// 每隔半小時執行
// do{
//     $x=10;
//     $x++;
//     if($x<10){
//     echo "10";
//     }else{
//         header("location :index.php");
//     }
//     sleep(3);
// }while(true);
echo $interval;

sleep(5);

echo $interval+1;
?>


