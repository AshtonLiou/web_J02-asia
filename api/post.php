<?php include_once "./db.php";

    switch ($p["mode"]) {
        case "addPlace":
            $sql = "INSERT INTO `place`(`title`, `description`, `img`) VALUES ('{$p["title"]}','{$p["description"]}','{$p["img"]}')";
            $conn -> exec($sql);
            break;
        case "delPlace":
            $sql = "DELETE FROM `place` WHERE `id` = {$p["id"]}";
            $conn -> exec($sql);
            break;
        case "editPlace":
            $sql = "UPDATE `place` SET `title`='{$p["title"]}',`description`='{$p["description"]}',`img`='{$p["img"]}' WHERE `id` = {$p["id"]}";
            $conn -> exec($sql);
            break;
    }