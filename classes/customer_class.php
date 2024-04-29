<?php
//connect to database class
require("../settings/db_class.php");

/**
*General class to handle all functions 
*/
/**
 *@author David Sampah
 *
 */

class customer_class extends db_connection
{
	//--INSERT--//
	
    public function add_customer($customer_name, $customer_email, $customer_pass, $customer_country, $customer_city, $customer_contact, $customer_image, $user_role){

		// Write query
		$sql = "INSERT INTO `customer`(`customer_name`,`customer_email`,`customer_pass`,`customer_country`,`customer_city`,`customer_contact`,`customer_image`,`user_role`) 
		VALUES ('$customer_name','$customer_email','$customer_pass','$customer_country','$customer_city','$customer_contact','$customer_image',' $user_role') ";

		// Return  
		return $this -> db_query($sql);
	}
	//--SELECT--//
    public function selectAll_customer(){

		// Write query
		$sql = "Select * FROM `customer`";

		// Excute query
		return$this -> db_fetch_all($sql);
	}

    //--SELECT ONE--//

	public function selectOne_customer($customer_id){

		// Write query
		$sql = "Select * FROM `customer` where customer_id = $customer_id";

		// Excute query
		return$this -> db_query($sql);
	}

	//--UPDATE--//
	public function update_customer($customer_id, $customer_name, $customer_email, $customer_pass, $customer_country, $customer_city, $customer_contact, $customer_image, $user_role){

		// Write query
		$sql = "UPDATE `customer` SET `customer_name`='$customer_name',`customer_email`='$customer_email',`customer_pass`='$customer_pass',`customer_country`='$customer_country',`customer_city`='$customer_city',`customer_contact`='$customer_contact',`customer_image`='$customer_image',`user_role`='$user_role' WHERE customer_id = $customer_id";

		// Execute query
		return $this -> db_query($sql);
	}
    // Verify customer
    public function verify_customer($customer_email){

		
		// Write query
		$sql = "Select * FROM `customer` where customer_email = '$customer_email'";

		// Excute query
		return$this -> db_fetch_one($sql);

	}

    public function selectOne_Email($customer_email){
        //write the sql
        $sql = "SELECT * FROM `customer` WHERE `customer_email` = '$customer_email'";
        //execute the sql
        return $this-> db_fetch_one($sql);
    }

	public function edit_Customer($customer_id,$customer_name,$customer_country, $customer_city,
     $customer_contact){
        $sql = "UPDATE `customer` SET `customer_name`='$customer_name',`customer_country` = '$customer_country',
        `customer_city` = '$customer_city',`customer_contact` = '$customer_contact' WHERE `customer_id` = '$customer_id'";
        return $this-> db_query($sql);
    } 
	
    function delete_Customer($customer_id){
         //write the sql
         $sql= "DELETE FROM `customer` WHERE `customer_id` = '$customer_id' ";
         //execute the sql
         return $this-> db_query($sql);
    }
	

}

?>