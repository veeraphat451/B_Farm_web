<?php
// เชื่อมต่อฐานข้อมูล
$host = "localhost";
$port = "5432";
$dbname = "b_farm";
$user = "postgres";
$password = "postgres"; // เปลี่ยนเป็นรหัสผ่านของคุณ
$conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    // ดึงข้อมูลจังหวัด
    $sql = "SELECT id, name FROM geographies";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $geographies = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // ส่งข้อมูลเป็น JSON
    echo json_encode($geographies);
} catch (PDOException $e) {
    // จัดการข้อผิดพลาด
    echo "Error: " . $e->getMessage();
}
?>
