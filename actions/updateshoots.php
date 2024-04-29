<?php
include("../controllers/shoot_controller.php");

// Collecting Form Data
if(isset($_POST["updateshoot"])){
    $shoot_id = $_POST["shoot_id"];
    $shoot_name = $_POST["shoot_name"];
    $shoot_price = $_POST["shoot_price"];
    $shoot_label = $_POST["shoot_label"];
    $shoot_key = $_POST["shoot_key"];

    // Shoot Controller
    $result = updateShoot_ctr($shoot_id,$shoot_name,$shoot_price,$shoot_label,$shoot_key);

    if($result==true){
        header('Location:../Admin/view_products.php');
    }else{
        echo "Couldn't update changes";
    }
}else{
    echo "Something went wrong";
}




?>