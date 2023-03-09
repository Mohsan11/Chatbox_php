<?php
include('./db.php');
session_start();
$Current_User = $_SESSION['id'];
$Message = $_POST['message'];
include('msgbox.php');
$sql = "INSERT into `messages`(User_Id,Message,Date)VALUES((SELECT User_Id FROM users WHERE User_Id='$Current_User'),'$Message',now())";
$data = mysqli_query($conn, $sql);
if ($data) {
    if (header('location: home.php'));
    header('location: home.php');
} else {
    header('location: userDetail.php ');
}
