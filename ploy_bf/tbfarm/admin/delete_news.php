<?php
include 'config/condb.php'; // ใช้การเชื่อมต่อ $db จาก pg_connect

// รับค่า id จาก URL
$id = $_GET['id'];

try {
    // ลบข้อมูลข่าวสาร
    $query = "DELETE FROM news WHERE id = $1";
    $result = pg_query_params($db, $query, [$id]);

    if ($result) {
        // กลับไปที่หน้าข่าวสาร
        header("Location: news_dashboard.php");
        exit();
    } else {
        throw new Exception("เกิดข้อผิดพลาดในการลบข่าวสาร: " . pg_last_error($db));
    }
} catch (Exception $e) {
    die("เกิดข้อผิดพลาด: " . $e->getMessage());
}
?>
