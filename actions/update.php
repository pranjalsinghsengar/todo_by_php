<?php
include "../config/config.php";
// Retrieve POST data and sanitize inputs
$id = mysqli_real_escape_string($con, $_POST['id']);
$list = mysqli_real_escape_string($con, $_POST['updateList']);

// Update query (assuming `id` is a primary key and does not need to be updated)
$query = "UPDATE `table-todo` SET `list`='$list' WHERE id=$id";

// Perform the update query
$result = mysqli_query($con, $query);

if ($result) {
    // Redirect to index.php on success
    header("location:../index.php");
    exit; // Always exit after a header redirect to prevent further script execution
} else {
    // Handle error if update query fails
    echo "Error updating record: " . mysqli_error($con);
}

// Close database connection
mysqli_close($con);
