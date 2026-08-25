<?php
session_start();
require "../config/config.php";

$naam = strtolower($_POST['naam'] ?? null);
$username = $_SESSION["username"] ?? null;

if (!$naam || !$username) {
    exit("Missing data");
}

try {
    $stmt = $conn->prepare("
        INSERT INTO vis (username, naam)
        VALUES (:username, :naam)
    ");

    $stmt->execute([
        "username" => $username,
        "naam" => $naam
    ]);

    echo "Saved";

} catch (PDOException $e) {
    echo $e->getMessage();
}