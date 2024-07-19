<?php
include "../config/config.php";
$LIST = $_POST['list'];

mysqli_query($con, "INSERT INTO `table-todo`(`list`) VALUES ('$LIST')");
header("location:../index.php");
