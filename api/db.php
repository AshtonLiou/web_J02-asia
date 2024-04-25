<?php

    session_start();
    $dsn = "mysql:host=localhost;charset=utf8;dbname=dbj02asia";
    $conn = new PDO($dsn, "admin", "1234");
    $p = $_POST;
    $g = $_GET;