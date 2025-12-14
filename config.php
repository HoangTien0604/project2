<?php
define("HOST", getenv("DB_HOST"));
define("DATABASE", getenv("DB_NAME"));
define("USERNAME", getenv("DB_USER"));
define("PASSWORD", getenv("DB_PASS"));


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