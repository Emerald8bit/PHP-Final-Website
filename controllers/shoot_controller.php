<?php
//connect to the user account class
include("../classes/shoot_class.php");

//sanitize data

//--INSERT--//
function addShoot_ctr($shoot_name,$shoot_price,$shoot_label,$shoot_img,$shoot_key){

    // Create an instance of the class
    $add_shoot = new shoot_class();

     return $add_shoot->add_shoot($shoot_name,$shoot_price,$shoot_label,$shoot_img,$shoot_key);

}
//--update--//
function updateShoot_ctr($shoot_id,$shoot_name,$shoot_price,$shoot_label,$shoot_img,$shoot_key){

    // Create an instance of the class
    $verify_customer = new shoot_class();

     return $verify_customer->update_shoot($shoot_id,$shoot_name,$shoot_price,$shoot_label,$shoot_img,$shoot_key);

}

function selectall_shoot_ctr(){

    // Create an instance of the product class. 
    $selectall_brand = new shoot_class();

     return $selectall_brand->select_all_shoots();

}

function selectoneshoot_ctr($shoot_id){

    // Create an instance of the product class. 
    $selectone= new shoot_class();

     return $selectone->selectone_shoot($shoot_id);

}

function deleteshoot_ctr($shoot_id){

    // Create an instance of the product class. 
    $selectone= new shoot_class();

    return $selectone->delete_shoot($shoot_id);

}

function searchshoot_ctr($shoot_key){

    // Create an instance of the product class. 
    $selectone= new shoot_class();

    return $selectone->search_shoots($shoot_key);

}
function updateshoot_img_ctr($shoot_id,$shoot_img){

    // Create an instance of the product class. 
    $selectone= new shoot_class();

    return $selectone->update_shoot_img($shoot_id,$shoot_img);

}


?>