<?php
require "../config/config.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        die("Username and password required");
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare(
            "INSERT INTO users (username, password)
             VALUES (:username, :password)"
        );

        $stmt->execute([
            "username" => $username,
            "password" => $hashedPassword
        ]);

        $_SESSION["username"] = $username;
        header("Location: ../vis/vis.php");
        exit;

    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "Username already exists";
        } else {
            echo $e->getMessage();
        }
    }
}

include "register_view.php";
