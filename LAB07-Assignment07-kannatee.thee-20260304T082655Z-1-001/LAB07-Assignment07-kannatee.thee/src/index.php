<?php
$host = "db-server";
$db   = getenv("DB_NAME") ?: "event_registration_db";
$user = getenv("MY_USERNAME") ?: "somchai";

// อ่านรหัสผ่านจาก secrets (ไฟล์ใน container)
$passFile = "/run/secrets/db_user_pass";
$pass = file_exists($passFile) ? trim(file_get_contents($passFile)) : "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $stmt = $pdo->query("SELECT student_id, full_name, username, email, status, submitted_at FROM students ORDER BY id DESC");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h1>Students</h1>";
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>Student ID</th><th>Full Name</th><th>Username</th><th>Email</th><th>Status</th><th>Submitted At</th></tr>";
    foreach ($rows as $r) {
        echo "<tr>";
        echo "<td>{$r['student_id']}</td>";
        echo "<td>{$r['full_name']}</td>";
        echo "<td>{$r['username']}</td>";
        echo "<td>{$r['email']}</td>";
        echo "<td>{$r['status']}</td>";
        echo "<td>{$r['submitted_at']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} catch (Exception $e) {
    echo "<h1>PHP OK แต่ DB ยังไม่พร้อม/ยังไม่มีตาราง</h1>";
    echo "<pre>" . htmlspecialchars($e->getMessage()) . "</pre>";
}