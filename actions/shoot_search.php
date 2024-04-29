<?php
	include ("../controllers/shoot_controller.php");
    
    $shoot_key;
		//This file gets the search data and pass it in the search_product controller
	if(isset($_POST['search'])){
	$shoot_key = $_POST['search'];
			
			$wedding_key=searchshoot_ctr($shoot_key);

			header('Location: ../view/shoot_search_results.php?shoot_id='.$shoot_key);
		}
?>