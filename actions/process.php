<?php
require('../controllers/cart_controller.php');
session_start();
$cid = $_SESSION['customer_id'];
$email =$_POST['email'];
$amount =$_POST['amount5'];
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL =>"https://api.paystack.co/transaction/verify/".$_GET['reference'],
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_cd22aa0dd31f43894ea5f58a76a918f79d43dc4d",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }



$url = "https://api.paystack.co/transaction/verify/".$_GET['reference'];

$fields = [

    'email' => "$email",
    'amount' => $amount
];

$fields_string = http_build_query($fields);


// Open Connection
$ch = curl_init();
//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer sk_test_cd22aa0dd31f43894ea5f58a76a918f79d43dc4d",
    "Cache-Control: no-cache",
));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// execute post
$result = curl_exec($ch);

$invoice =  mt_rand();
$date = date("Y-m-d");


$orderw= insert_weddingorders_ctr($cid,$invoice,$date);
$orders=insert_shootorders_ctr($cid,$invoice,$date);

if ($orderw == true){
    echo"order recordered";
}else{
    echo"order not recordered";
}
if ($orders == true){
  echo"order recordered";
}else{
  echo"order not recordered";
}

$order_id =get_weddingorder_id_ctr($invoice_no);
$idorder =get_shootorder_id_ctr($invoice_no);
print_r($order_id);
$order_date=get_weddingorder_date_ctr();
$orders_date=get_shootorder_date_ctr();

$or =$order_id['order_id'];
$sh =$idorder['order_id'];
$od = $order_date['order_date'];
$ot=$orders_date['order_date'];

$payment = insert_weddingpayment_ctr($amt,$customer_id,$or, $payment_date);
$payments = insert_shootpayment_ctr($amt,$customer_id,$sh, $payment_date);
if($payment == true){
    echo "success";
}else{
    echo"failed";
}
if($payments == true){
  echo "success";
}else{
  echo"failed";
}

$cartw = get_cart_weddingdetails_ctr($c_id);
$carts=get_cart_shootdetails_ctr($c_id);
$ps_id = $carts['p_id'];
$p_id = $cartw['p_id'];
$qty = $cartw['qty'];
$qtys=$carts['qty'];

$orderdetails = delete_after_weddingpay_ctr($cid);
$orderdetailss= delete_after_shootpay_ctr($cid);

if ($orderdetails == true){
    echo "order details";
}else{
    echo "order not working";
}
if ($orderdetailss == true){
  echo "order details";
}else{
  echo "order not working";
}

$delcart = delete_after_weddingpay_ctr($cid);
$dels=delete_after_shootpay_ctr($cid);
if($delcart == true){

}
header('Location:../view/payment_done.php');
?>