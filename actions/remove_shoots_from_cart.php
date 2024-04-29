<?php
include("../controllers/cart_controller.php");
session_start();

if (isset($_POST['deleteCart'])){
    $p_id = $_POST['p_id'];

    deleteshootcart_ctr($p_id,$_SESSION['customer_id']);
    
    header('Location: ../view/cart.php');
}
?>