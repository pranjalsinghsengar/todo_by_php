<?php
include "../config/config.php";
$id = $_GET['ID'];

mysqli_query($con, "DELETE FROM `table-todo` WHERE id=$id ");
header("location:../index.php");
