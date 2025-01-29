<?php
// การเชื่อมต่อฐานข้อมูล
$host = "localhost";
$port = "5432";
$dbname = "b_farm";
$user = "postgres"; // เปลี่ยนเป็นชื่อผู้ใช้ Postgres ของคุณ
$password = "postgres"; // ใส่รหัสผ่านของคุณ

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // รับค่า province_id จากพารามิเตอร์ GET
    $province_id = $_GET['province_id'];

    // Query ดึงข้อมูลอำเภอที่ตรงกับ province_id
    $sql = "SELECT id, name_th FROM districts WHERE province_id = :province_id ORDER BY name_th ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':province_id', $province_id, PDO::PARAM_INT);
    $stmt->execute();

    $amphures = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // ส่งข้อมูล JSON กลับไปยัง client
    echo json_encode($amphures);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
