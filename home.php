<html>

<head>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        a {
            text-decoration: none;
            color: deepskyblue;
            font-weight: 500;
        }

        a:hover {
            border-bottom: 1px solid deepskyblue;
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

        .container {
            margin-top: 0;
            border: 1px solid black;
            border-top: none;
            width: 70%;
            display: flex;
            flex-direction: column;
            margin-bottom: 120px;
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
            background-color: #444;
            border: 1px solid black;
            border-top: 0;
            margin-top: 0;
            padding: 0;
            width: 30%;
            display: flex;
            height: auto;
            flex-direction: column;
            margin-left: auto;

        }

        .status-h1 {
            color: deepskyblue;
        }

        .status-p {
            color: #4CAF50;
            font-weight: 300;
        }

        .status-p:hover {
            color: #47d74d;
            font-weight: 300;
            border-bottom: 1px solid green;
            width: 30px;
            cursor: pointer;
        }

        .chat {
            border: 1px solid black;
            border-top: none;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500&display=swap" rel="stylesheet">
    <title>ChatBox</title>
</head>

<body>
    <?php include('./Nav.php') ?>
    <div class="main">

        <div class="container">
            <?php
            session_start();
            if (isset($_SESSION['id'])) {
                include('./db.php');
                $CurrentUser = $_SESSION['id'];
                $sql = "SELECT users.User_Id, users.Name, messages.Message FROM users JOIN messages ON users.User_Id = messages.User_Id ORDER BY messages.Date ASC";
                $data = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($data)) {
            ?><div class="chat">
                        <h1><a href="userDetail.php?id=<?php echo $row['User_Id'] ?>&currentUser=<?php echo $CurrentUser ?>">
                                <?php echo $row['Name'] ?></h1>
                        </a>
                        <p style="margin-left: 100px;"><?php echo $row['Message'] ?></p>
                    </div>
                <?php } ?>
        </div>

        <?php include('msgbox.php') ?>
        <?php include('./StatusBox.php'); ?>
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
                exit();
            }
?>
</body>

</html>