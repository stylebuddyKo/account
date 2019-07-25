<?php
require __DIR__ . '/__connect__db.php';

if (isset($_GET['id'])) {
    $sid = intval($_GET['id']);
    $sql = "DELETE FROM `account_info` WHERE `id`=?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $sid);
    $stmt->execute();

    echo $stmt->affected_rows;
}
if (isset($_SERVER['HTTP_REFERER'])) {
    header("Location:" . $_SERVER['HTTP_REFERER']);
} else {
    header("Location: data_list.php");
}
