<?php
header("content-type: text/html; charset=utf-8");

// 1. 初始設定
$ch = curl_init();
$url = 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-073?Authorization=CWB-B49B9DCF-7BB9-4300-8452-B146577EE1AE&locationName=%E8%A5%BF%E5%B1%AF%E5%8D%80';
// 2. 設定 / 調整參數

// $params= array(
//  CURLOPT_RETURNTRANSFER => true,
//  CURLOPT_HEADER => array('Content-type: application/json'),
//  CURLOPT_URL => $url
// );

curl_setopt($ch, CURLOPT_URL,$url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
// curl_setopt_array($ch,$params);
// 3. 執行，取回 response 結果
$output = curl_exec($ch);
// if(!$result = curl_exec($ch)){
//     die('Error: "'.curl_error($ch).'" - Code: ' . curl_errno($ch));
// }
// 4. 關閉與釋放資源
curl_close($ch);

// $response = json_decode($result,true);

echo htmlspecialchars($output);
?>
