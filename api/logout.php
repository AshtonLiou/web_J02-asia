<?php include_once "./db.php";

    session_destroy();

    ?>

    <script>
        alert("Logout successfully!")
        location.href="../login.php"
    </script>