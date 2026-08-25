<?php
require "../inlog/session.php";
require "../config/config.php";

$username = $_SESSION["username"];

$stmt = $conn->prepare("
    SELECT naam 
    FROM vis 
    WHERE username = :username
");

$stmt->execute([
    "username" => $username
]);

$clickedCubes = array_map('strtolower', $stmt->fetchAll(PDO::FETCH_COLUMN));
include "vis_view.php";