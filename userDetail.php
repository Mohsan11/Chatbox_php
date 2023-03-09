<html>

<head>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .user-msg {
            display: flex;
            border: 1px solid black;
            background-color: #CCC;
        }

        .msg-h1 {
            color: deepskyblue;
        }

        .msg-p {
            color: #4CAF50;
            font-weight: 300;
        }

        h1,
        p {
            margin: 5px;
            padding: 5px;
            font-weight: 200;
        }

        h1 {
            font-weight: 300;
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

        .sticky {
            margin-left: auto;
        }
    </style>
    <title>ChatBox</title>
</head>

<body>
    <?php
    include('./Nav.php');
    session_start();
    include('./db.php');
    if (isset($_GET['id'])) {
        $currentUser = $_GET['currentUser'];
        $User_id = $_GET['id'];
        // $sql = "SELECT * from `users` WHERE User_Id='$User_id'";
        $sql3 = "SELECT users.User_Id, users.Name, messages.Message,messages.Date  FROM users JOIN messages ON users.User_Id = messages.User_Id  WHERE messages.User_Id = '$User_id' OR messages.User_Id = '$currentUser'";
        $user = mysqli_query($conn, $sql3);
        // $sql2 = "SELECT * From `messages` where User_Id='$User_id'";
        // $messages = mysqli_query($conn, $sql2);
        while ($row = mysqli_fetch_assoc($user)) {
    ?><div class="user-msg">
                <h1 class="msg-h1"><?php echo $row['Name'] ?></h1>
                <p class="msg-p"><?php echo $row['Message'] ?></p>
                <p class="sticky"><?php echo $row['Date'] ?></p>
            </div>
        <?php
        }
        include('msgbox.php');
        ?>
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
        echo 'failed';
    }
    ?>
</body>

</html>