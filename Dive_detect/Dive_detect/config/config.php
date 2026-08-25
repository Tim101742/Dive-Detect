<?php
try {
    $servername = "127.0.0.1";
    $username = "Dive_detect";
    $password = "#1geheim!";
    $dbname = "Dive_detect_beroeps";

    $conn = new PDO(
        "mysql:host=$servername; dbname=Dive_detect_beroeps; charset=utf8",
        $username, $password
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

