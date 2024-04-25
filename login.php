<?php include_once "./api/db.php";

    if (isset($_SESSION["isLogin"])) {
        header("location: ./admin.php");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AbuDhabiTerhal</title>
    <link rel="stylesheet" href="./jquery/jquery-ui.css">
    <link rel="stylesheet" href="./bootstrap/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./img/admin.jpg" type="image/x-icon">
</head>

<body>

    <div id="app">

        <!-- top header -->

        <?php include_once "./header.php" ?>

        <!-- banner -->

        <div class="banner">

            <img src="./img/image8.jpg" alt="bannerImg">

            <div class="bannerBody">

                <!-- header -->

                <header class="d-flex justify-content-center align-items-center">
                    <nav class="d-flex">
                        <h2 class="text-white my-auto mx-5 text-center">AbuDhabi<span
                                style="color: var(--green);">Terhal</span></h2>
                        <div class="nav d-flex justify-content-center">
                            <a href="./home.php">Home</a>
                            <a href="./attractions.php">Attractions</a>
                            <a href="./gallery.php">Gallery</a>
                            <a href="./aboutus.php">About Us</a>
                            <a href="./contact.php">Contact</a>
                        </div>
                    </nav>
                </header>

                <div class="loginPlace container text-center my-5">
                    <label for="loginUserInput">Admin Login</label>
                    <div class="loginBox">
                        <form action="./api/loginBack.php" method="get">
                            <input type="text" name="acc" id="loginUserInput" class="col-10 mx-auto mt-4 shadow"
                                placeholder="User Name" required>
                            <input type="text" name="pw" id="loginPwInput" class="col-10 mx-auto mt-4 shadow"
                                placeholder="Password" required>
                            <button type="submit" class="btn rootBtn col-3 mx-auto mt-4">LOGIN</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>

        <!-- main -->

        <main>



        </main>

        <!-- footer -->

        <?php include_once "./footer.php" ?>

    </div>

    <!-- script -->

    <script src="./jquery/jquery.js"></script>
    <script src="./jquery/jquery-ui.min.js"></script>
    <script src="./jquery/vue3.global.js"></script>
    <script src="./bootstrap/bootstrap.js"></script>

</body>

</html>