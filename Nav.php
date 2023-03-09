<html>
<style>
    body {
        margin: 0;
    }

    nav {
        display: flex;
        width: 100%;
        background-color: #333;
        /* border-bottom: 1px solid #fafafa; */
    }

    .a {
        font-size: larger;
        font-weight: 300;
        text-decoration: none;
        color: #fafafa;
    }

    .a:hover {
        border-bottom: 1px solid orange;
        font-size: x-large;
    }

    ul {
        display: flex;
        height: auto;
        width: 100%;
        list-style: none;
        background-color: #333;
    }

    li {
        margin: 5px;
    }

    .sticky {
        margin-left: auto;
    }
</style>

<head>
</head>

<body>
    <nav>
        <ul>
            <li><a class="a" href="#">Home</a></li>
            <?php
            if (isset($_SESSION['logedIn'])) {
            ?>
                <li class="sticky"><a class="a" href="./LoginForm.php"> Login</a></li>
            <?php                  } else {
            ?>
                <li class="sticky"><a class="a" href="./LoginForm.php">Logout</a></li>
            <?php }
            ?>
        </ul>

    </nav>
</body>

</html>