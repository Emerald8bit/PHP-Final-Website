<?php
session_start();
include("../controllers/cart_controller.php");

if(isset($_POST['p_id']) && isset($_POST['qty'])) {
    $p_id = $_POST['p_id'];
    $c_id = $_SESSION['customer_id'];
    $ip_add = $_SERVER['REMOTE_ADDR'];
    $qty = $_POST['qty'];

    // Add service to cart
    $added_to_cart = addshootcart_ctr($p_id, $ip_add, $c_id, $qty);

    if($added_to_cart) {
        // Redirect to cart page
        header('Location: ../view/cart.php');
        exit;
    } else {
        // Handle failure to add to cart
        echo "Failed to add service to cart.";
    }
} else {
    // Handle case where required data is not provided
    echo "Invalid request.";
}
?>