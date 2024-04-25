<?php include_once "./db.php";

    $sql = "SELECT * FROM `admin` WHERE `accandpw` = '{$g['acc']}' AND `accandpw` = '{$g['pw']}'";
    $result = $conn -> query($sql) -> fetch();
    if (empty($result)) {
        ?>
            <script>
                alert("User name / Password wrong!")
                location.href = "../login.php"
            </script>
        <?php
    } else {
        $_SESSION["isLogin"] = true;
        ?>
        <script>
            alert("Login successfully!")
            location.href = "../admin.php"
        </script>
        <?php
    }