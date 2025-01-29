<?php
include('config/condb.php'); // เชื่อมต่อฐานข้อมูล

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "SELECT file_name, file_data FROM download WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);

        $file = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($file) {
            // ตั้งค่า Headers สำหรับการดาวน์โหลดไฟล์
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="' . $file['file_name'] . '"');
            echo $file['file_data'];
            exit;
        } else {
            echo "ไม่พบไฟล์ที่ต้องการดาวน์โหลด";
        }
    } catch (PDOException $e) {
        echo "เกิดข้อผิดพลาด: " . $e->getMessage();
    }
} else {
    echo "ไม่พบพารามิเตอร์ ID";
}
?>
