<?php
require_once('../settings/db_class.php');

class ShootController {
    // Function to delete a shoot by shoot_id
    public static function deleteShoot($shoot_id) {
        // Create a new instance of the database connection class
        $db = new yesido();

        // SQL query to delete a shoot by shoot_id
        $sql = "DELETE FROM shoots WHERE shoot_id = '$shoot_id'";

        // Execute the SQL query
        if ($db->db_query($sql)) {
            return true; // Deletion successful
        } else {
            return false; // Deletion failed
        }
    }
}
?>

