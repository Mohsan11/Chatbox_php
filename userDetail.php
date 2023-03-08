<html>

<head>
    <title>ChatBox</title>
</head>

<body>
    <?php
    include('./db.php');
    if (isset($_GET['id'])) {
        $currentUser = $_GET['currentUser'];
        $User_id = $_GET['id'];
        // $sql = "SELECT * from `users` WHERE User_Id='$User_id'";
        $sql3 = "SELECT users.User_Id, users.Name, messages.Message FROM users JOIN messages ON users.User_Id = messages.User_Id  WHERE messages.User_Id = '$User_id' OR messages.User_Id = '$currentUser'";
        $user = mysqli_query($conn, $sql3);
        // $sql2 = "SELECT * From `messages` where User_Id='$User_id'";
        // $messages = mysqli_query($conn, $sql2);
        while ($row = mysqli_fetch_assoc($user)) {
    ?>
            <h1><?php echo $row['Name'] ?></h1>
            <p><?php echo $row['Message'] ?></p>
    <?php
        }
    } else {
        echo 'failed';
    }
    ?>
</body>

</html>