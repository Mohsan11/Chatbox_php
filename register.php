<?php
include('./db.php');
$Name = $_POST['name'];
$Email = $_POST['email'];
$Pass = $_POST['pass'];
if (isset($_POST['sub'])) {
    $sql = "INSERT into  `users` (Name,Email,Password,Status)Values('$Name','$Email','$Pass','Offline')";
    $data = mysqli_query($conn, $sql);
    if ($data) {
        header('location: LoginForm.php');
        exit();
    } else {
        header('RegisterForm.php');
        exit();
    }
}
