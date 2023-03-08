<html>

<head>
    <style>
        h1,
        p {
            margin: 5px;
            padding: 5px;
        }

        .container {
            border: 1px solid black;
            width: 70%;
            display: flex;
            flex-direction: column;
        }

        .box {
            display: flex;
            flex-direction: column;
        }

        input[type='submit'] {
            background-color: #4CAF50;
            color: #ffffff;
            border: 0.5px solid black;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type='text'] {
            padding: 10px 70px 10px 70px;
            margin-right: 5px;
            border: 0.5px solid black;
            border-radius: 3px;
        }

        .typing {
            margin-bottom: auto;
        }

        .main {
            display: flex;
        }

        .messagebox {
            border: 1px solid black;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0;
            background-color: #f3f3f1;
            padding: 20px;
        }

        .status-Container {
            border: 1px solid black;
            padding: 0;
            width: 30%;
            display: flex;
            height: auto;
            flex-direction: column;
            margin-left: auto;

        }

        .chat {
            border: 1px solid black;
        }
    </style>
    <title>ChatBox</title>
</head>

<body>
    <div class="main">

        <div class="container">
            <?php
            session_start();
            if (isset($_SESSION['id'])) {
                include('./db.php');
                $CurrentUser = $_GET['currentId'];
                $sql = "SELECT users.User_Id, users.Name, messages.Message FROM users JOIN messages ON users.User_Id = messages.User_Id ORDER BY messages.Date ASC";
                $data = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($data)) {
            ?><div class="chat">
                        <h1><a href="userDetail.php?id=<?php echo $row['User_Id'] ?>&currentUser=<?php echo $CurrentUser ?>">
                                <?php echo $row['Name'] ?></h1>
                        </a>
                        <p><?php echo $row['Message'] ?></p>
                    </div>
                <?php } ?>
        </div>

        <div class="box">
            <div class="messagebox">
                <p class="typing"></p>
                <form method="POST" action="sendMessage.php">
                    <input type="hidden" name="currentUser" value="<?php echo $CurrentUser ?>">
                    <input type="text" name="message" placeholder="Enter your message...">
                    <input type="submit" name="sub">
                </form>
            </div>
        </div>

        <div class="status-Container">
            <?php
                $sql = "UPDATE `users` SET `Status`='Active' where `User_Id`='{$_SESSION['id']}'";
                if (isset($_SESSION['id'])) {
                    mysqli_query($conn, $sql);
                    $sql = "SELECT * from `users`";
                    $data = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($data)) {
            ?>
                    <h1><?php echo $row['Name'] ?></h1>
                    <p><?php echo $_SESSION['id'] ?></p>
                    <p><?php echo $row['Status'] ?></p>
                <?php
                    }
                } else {
                    $sql = "UPDATE `users` SET `Status`='Offline' where `User_Id`='{$_SESSION['id']}'";
                    mysqli_query($conn, $sql);
                    $sql = "SELECT * from `users`";
                    $data = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($data)) {
                    } ?>
                <h1><?php echo $row['Name'] ?></h1>
                <p><?php echo $_SESSION['id'] ?></p>
                <p><?php echo $row['Status'] ?></p>
            <?php
                }
            ?>
        </div>
    </div>

    <script>
        const p = document.querySelector('.typing');
        const input = document.querySelector('input[name="message"]');
        input.addEventListener("keydown", addOnEnter);


        function addOnEnter(e) {
            p.innerHTML = 'Typing...';
            if (e.key === "Backspace") {
                p.innerHTML = "";
            }
        }
    </script>
<?php
            } else {
                header('location: LoginForm.php');
            }
?>
</body>

</html>