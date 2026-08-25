<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("location: ../inlog/inlog.php");
    exit;
}
