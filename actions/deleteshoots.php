<?php
include("../controllers/shoot_controller.php");

if(isset($_POST["delete"])){
    $shoot_id = $_POST["shoot_id"];

    // controller
    $result=deleteshoot_ctr($shoot_id);
    
    if($result==true){
        header('Location:../Admin/view_products.php');
    }else{
        echo"Couldn't delete";
    }
}else{
    echo "Something went wrong";
}




?>