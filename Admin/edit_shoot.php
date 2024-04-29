<?php
session_start();
include("../controllers/shoot_controller.php");

// Check if shoot_id is provided in the URL
if(isset($_GET['shoot_id'])) {
    $shoot_id = $_GET['shoot_id'];

    // Retrieve the current service details from the database
    $shoot = selectoneshoot_ctr($shoot_id);

    // Check if the shoot exists
    if($shoot) {
        // If the form is submitted
        if(isset($_POST['updateShoot'])) {
            // Retrieve form data
            $shoot_name = $_POST['shoot_name'];
            $shoot_price = $_POST['shoot_price'];
            $shoot_label = $_POST['shoot_label'];
            $shoot_img = $_POST['shoot_img']; // Retrieve shoot_img from the form
            $shoot_key = $_POST['shoot_key'];

            $update_shoot = new shoot_class();

            // Update the service details in the database
            $update_result = $update_shoot->update_shoot($shoot_id,$shoot_name,$shoot_price,$shoot_label,$shoot_img,$shoot_key);

            if($update_result) {
                // Redirect back to the single shoot page with a success message
                header("Location: ../view/single_shoot.php?shoot_id=$shoot_id&success=1");
                exit;
            } else {
                $error = "Failed to update the service. Please try again.";
            }
        }
    } else {
        // Shoot with the provided ID doesn't exist, redirect to an error page or handle it accordingly
        header("Location: error.php");
        exit;
    }
} else {
    // shoot_id is not provided in the URL, redirect to an error page or handle it accordingly
    header("Location: error.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Shoot</title>
</head>

<body>
<h1>Edit Shoot</h1>
<?php if(isset($error)): ?>
    <p><?php echo $error; ?></p>
<?php endif; ?>
<form method="POST">
    <label for="shoot_name">Name:</label><br>
    <input type="text" id="shoot_name" name="shoot_name" value="<?php echo $shoot['shoot_name']; ?>" required><br>

    <label for="shoot_price">Price:</label><br>
    <input type="text" id="shoot_price" name="shoot_price" value="<?php echo $shoot['shoot_price']; ?>" required><br>

    <label for="shoot_label">Description:</label><br>
    <textarea id="shoot_label" name="shoot_label" required><?php echo $shoot['shoot_label']; ?></textarea><br>

    <label for="shoot_img">Image:</label><br>
    <input type="text" id="shoot_img" name="shoot_img" value="<?php echo $shoot['shoot_img']; ?>" required><br>

    <label for="shoot_key">Key:</label><br>
    <input type="text" id="shoot_key" name="shoot_key" value="<?php echo $shoot['shoot_key']; ?>" required><br>

    <button type="submit" name="updateShoot">Update</button>
</form>
</body>

</html>


