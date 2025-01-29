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

    // รับ geography_id จาก request
    $geography_id = isset($_GET['geography_id']) ? $_GET['geography_id'] : null;

    if ($geography_id) {
        // ดึงข้อมูลจังหวัดที่อยู่ในภาคที่เลือก
        $sql = "SELECT id, name_th FROM provinces WHERE geography_id = :geography_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':geography_id', $geography_id, PDO::PARAM_INT);
        $stmt->execute();
        $provinces = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // ส่งข้อมูลจังหวัดในรูปแบบ JSON
        echo json_encode($provinces);
    } else {
        echo json_encode(['error' => 'Geography ID is required']);
    }
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
