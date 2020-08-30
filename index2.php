<?php
ini_set ( 'date.timezone' , 'Asia/Taipei' );  
date_default_timezone_set('Asia/Taipei');
session_start();
$location="";
$_SESSION["datetime"]=date("Y-m-d H:i:s");

if(isset($_POST["location"])){
    $location = $_POST["location"];
    $_SESSION["location"]=$location;
}else{
    $_SESSION["location"]="臺北市";
}

if(isset($_POST["okbtn"])){
    $location = $_POST["location"];
    $_SESSION["location"]=$location;
}

// require_once "test.php";
// if(isset($_POST["okbtn2"])){
//     // echo "ok";
//     $location=$_POST["location"];

//     if(trim($location)!= ""){
        
//         $_SESSION["location"]=$location;
//         $_SESSION["datetime"]=date("Y-m-d H:i:s");
//         header("location: test2.php");
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <select name= "location" class="form-control" onchange="this.form.submit()">
            <optgroup label="北部">
            <option <?php if($location== '臺北市'){echo "selected";}?> >臺北市</option>
            <option <?php if($location== '新北市'){echo "selected";}?> >新北市</option>
            <option <?php if($location== '基隆市'){echo "selected";}?> >基隆市</option>
            <option <?php if($location== '宜蘭縣'){echo "selected";}?> >宜蘭縣</option>
            <option <?php if($location== '桃園市'){echo "selected";}?> >桃園市</option>
            <option <?php if($location== '新竹縣'){echo "selected";}?> >新竹縣</option>
            <option <?php if($location== '新竹市'){echo "selected";}?> >新竹市</option>
            </optgroup>
            <optgroup label="中部">
            <option <?php if($location== '臺中市'){echo "selected";}?> >臺中市</option>
            <option <?php if($location== '南投縣'){echo "selected";}?> >南投縣</option>
            <option <?php if($location== '苗栗縣'){echo "selected";}?> >苗栗縣</option>
            <option <?php if($location== '彰化縣'){echo "selected";}?> >彰化縣</option>
            <option <?php if($location== '雲林縣'){echo "selected";}?> >雲林縣</option>
            </optgroup>
            <optgroup label="南部">
            <option <?php if($location== '高雄市'){echo "selected";}?> >高雄市</option>
            <option <?php if($location== '臺南市'){echo "selected";}?> >臺南市</option>
            <option <?php if($location== '屏東縣'){echo "selected";}?> >屏東縣</option>
            <option <?php if($location== '嘉義縣'){echo "selected";}?> >嘉義縣</option>
            <option <?php if($location== '嘉義市'){echo "selected";}?> >嘉義市</option>
            </optgroup>
            <optgroup label="東部">
            <option <?php if($location== '花蓮縣'){echo "selected";}?> >花蓮縣</option>
            <option <?php if($location== '臺東縣'){echo "selected";}?> >臺東縣</option>
            </optgroup>
            <optgroup label="外島">
            <option <?php if($location== '金門縣'){echo "selected";}?> >金門縣</option>
            <option <?php if($location== '連江縣'){echo "selected";}?> >連江縣</option>
            <option <?php if($location== '澎湖縣'){echo "selected";}?> >澎湖縣</option>
            </optgroup>
        </select>
        <input type="submit" name="okbtn" value="未來一周"></input>
        
    </form>
    <?php require "test.php"?>
    <?php require "test2.php"?>

    
</body>
</html>