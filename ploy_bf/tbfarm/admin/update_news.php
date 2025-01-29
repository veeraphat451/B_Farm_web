<?php
session_start();
include('config/condb.php'); // ใช้การเชื่อมต่อ $db จาก pg_connect

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่าจากฟอร์ม
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    try {
        // ตรวจสอบการอัปโหลดไฟล์ใหม่
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/news/';
            $fileName = basename($_FILES['image']['name']);
            $filePath = $uploadDir . uniqid('news_', true) . '.' . pathinfo($fileName, PATHINFO_EXTENSION);

            // สร้างโฟลเดอร์ถ้ายังไม่มี
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // ย้ายไฟล์ใหม่ไปยังโฟลเดอร์
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
                die("เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ");
            }

            // ดึงไฟล์เก่าออกจากฐานข้อมูลและลบออกจากโฟลเดอร์
            $checkSql = "SELECT image_path FROM news WHERE id = $1";
            $checkResult = pg_query_params($db, $checkSql, [$id]);
            if ($checkResult) {
                $oldImage = pg_fetch_result($checkResult, 0, 'image_path');
                if ($oldImage && file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }

            // อัปเดตข้อมูลพร้อมไฟล์ใหม่
            $sql = "UPDATE news SET title = $1, content = $2, image_path = $3 WHERE id = $4";
            $params = [$title, $content, $filePath, $id];
        } else {
            // อัปเดตเฉพาะข้อมูล (ไม่มีไฟล์ใหม่)
            $sql = "UPDATE news SET title = $1, content = $2 WHERE id = $3";
            $params = [$title, $content, $id];
        }

        $result = pg_query_params($db, $sql, $params);

        if ($result) {
            $_SESSION['success'] = "อัปเดตข่าวสารสำเร็จ";
            header("Location: news_dashboard.php");
            exit();
        } else {
            die("เกิดข้อผิดพลาดในการอัปเดตข้อมูล: " . pg_last_error($db));
        }
    } catch (Exception $e) {
        die("เกิดข้อผิดพลาด: " . $e->getMessage());
    }
} else {
    die("คำขอไม่ถูกต้อง");
}
?>
