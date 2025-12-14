<?php
define("HOST", "localhost");
define("DATABASE", "anomaly_db");
define("USERNAME", "root");
define("PASSWORD", "");

try {
    $conn = new PDO(
        "mysql:host=" . HOST . ";dbname=" . DATABASE . ";charset=utf8mb4",
        USERNAME,
        PASSWORD
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Không thể kết nối hệ thống: " . $e->getMessage());
}