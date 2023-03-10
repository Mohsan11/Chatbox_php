<div class="status-Container">
    <?php
    $sql = "UPDATE `users` SET `Status`='Active' where `User_Id`='{$_SESSION['id']}'";
    if (isset($_SESSION['id'])) {
        mysqli_query($conn, $sql);
        $sql = "SELECT * from `users`";
        $data = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($data)) {
    ?>
            <h1 class="status-h1"><?php echo $row['Name'] ?></h1>
            <p class="status-p"><?php echo $row['Status'] ?></p>
        <?php
        }
        // } else if (!isset($_SESSION['id'])) {
        //     $sql = "UPDATE `users` SET `Status`='Offline' where `User_Id`='{$_SESSION['id']}'";
        //     mysqli_query($conn, $sql);
        //     $sql = "SELECT * from `users`";
        //     $data = mysqli_query($conn, $sql);
        //     while ($row = mysqli_fetch_assoc($data)) {
        //     } 
        ?>
        <!-- //     <h1><?php //echo $row['Name'] 
                        ?></h1> -->
        <!-- //     <p><?php //echo $row['Status'] 
                        ?></p> -->
    <?php
    }
    ?>
</div>