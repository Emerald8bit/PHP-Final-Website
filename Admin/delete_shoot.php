<?php // Check if shoot_id is provided in the URL
die($_GET['delete_id');

if(isset($_GET['delete_id'])) {
    $shoot_id = $_GET['delete_id'];
    $delete_shoot = new shoot_class();
    // Update the service details in the database
    $delete_result = $delete_shoot->delete_shoot($shoot_id);

    var_export($delete_result);
    die('here');

    if($delete_result) {
        // Redirect back to the single shoot page with a success message
        header("Location: single_shoot.php?shoot_id=$shoot_id&success=1");
        exit;
    } else {
        $error = "Failed to update the service. Please try again.";
    }
} else {
    // shoot_id is not provided in the URL, redirect to an error page or handle it accordingly
    header("Location: error.php");
    exit;
}
?>

