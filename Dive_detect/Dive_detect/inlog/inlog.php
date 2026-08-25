<?php
require "../config/config.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare(
        "SELECT * FROM users WHERE username = :username"
    );
    $stmt->execute(["username" => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"])) {

        session_regenerate_id(true);

        $_SESSION["username"] = $user["username"];
        $_SESSION["role"] = $user["role"];


        if ($user["role"] === "admin") {
            header("Location: ../vis/vis.php");
        } else {
            header("Location: index.php");
        }
        exit;

    } else {
        echo "<script>alert('WRONG INFORMATION');</script>";
    }
}
include "index.php";