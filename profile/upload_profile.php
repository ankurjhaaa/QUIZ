<?php
include_once "../config/db.php";
session_start();

if (isset($_FILES['dp']) && isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $image = $_FILES['dp']['name'];
    $tmp_image = $_FILES['dp']['tmp_name'];
    $imagePath = "dp/" . $image;

    // इमेज को `dp/` फोल्डर में सेव करें
    if (move_uploaded_file($tmp_image, $imagePath)) {
        // डेटाबेस अपडेट करें
        $updateQuery = "UPDATE user SET dp='$image' WHERE email='$email'";
        if (mysqli_query($connect, $updateQuery)) {
            echo "Profile picture updated successfully!";
        } else {
            echo "Database update failed!";
        }
    } else {
        echo "File upload failed!";
    }
} else {
    echo "No file uploaded!";
}
?>
