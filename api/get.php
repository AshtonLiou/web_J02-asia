<?php include_once "./db.php";

    switch ($g["mode"]) {
        case "getPlaceData":
            $sql = "SELECT * FROM `place`";
            $result = $conn -> query($sql) -> fetchAll();
            echo json_encode($result);
            break;
        case "getEditData":
            $sql = "SELECT * FROM `place` WHERE `id` = {$g["id"]}";
            $result = $conn -> query($sql) -> fetch();
            echo json_encode($result);
            break;
        case "getSearchPlaceData":
            $title = $conn -> quote($g["title"]);
            $sql = "SELECT * FROM `place` WHERE `title` = $title";
            $result = $conn -> query($sql) -> fetchAll();
            echo json_encode($result);
            break;
    }