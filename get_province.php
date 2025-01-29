<?php
// เชื่อมต่อฐานข้อมูล
$host = "localhost";
$port = "5432";
$dbname = "b_farm";
$user = "postgres";
$password = "postgres"; // เปลี่ยนเป็นรหัสผ่านของคุณ

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // รับค่าคำค้นหาจาก request
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    // SQL สำหรับค้นหาจังหวัด
    $sql = "SELECT id, name_th FROM provinces WHERE name_th ILIKE :search ORDER BY name_th ASC";
    $stmt = $conn->prepare($sql);
    $searchTerm = $search ? "%$search%" : '%'; // ถ้าไม่มีคำค้นหา ให้แสดงทั้งหมด
    $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();
    $provinces = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // ส่งข้อมูล JSON
    echo json_encode($provinces);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
