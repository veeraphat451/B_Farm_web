<?php
// เชื่อมต่อฐานข้อมูล
$host = "localhost";
$port = "5432";
$dbname = "b_farm";
$user = "postgres"; // เปลี่ยนเป็นชื่อผู้ใช้ของ Postgres
$password = "postgres"; // ใส่รหัสผ่านของคุณ
$conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// รับ amphure_id จากพารามิเตอร์ GET
$amphure_id = $_GET['amphure_id'];

try {
    // ดึงข้อมูลตำบล
    $sql = "SELECT id, name_th FROM subdistricts WHERE amphure_id = :amphure_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':amphure_id', $amphure_id, PDO::PARAM_INT);
    $stmt->execute();
    $subdistricts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // ส่งข้อมูลเป็น JSON
    echo json_encode($subdistricts);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
