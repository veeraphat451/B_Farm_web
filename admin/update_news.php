<?php
session_start();
include('config/condb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // รับค่าจากฟอร์ม
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    try {
        // ตรวจสอบการอัปโหลดไฟล์ใหม่
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/news/';
            $filePath = $uploadDir . basename($_FILES['image']['name']);

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // ย้ายไฟล์ใหม่ไปยังโฟลเดอร์
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
                die("เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ");
            }

            // ดึงไฟล์เก่าออกจากฐานข้อมูลและลบออกจากโฟลเดอร์
            $checkSql = "SELECT image_path FROM news WHERE id = :id";
            $checkStmt = $pdo->prepare($checkSql);
            $checkStmt->bindParam(':id', $id, PDO::PARAM_INT);
            $checkStmt->execute();
            $oldImage = $checkStmt->fetchColumn();

            if ($oldImage && file_exists($oldImage)) {
                unlink($oldImage);
            }

            // อัปเดตข้อมูลพร้อมไฟล์ใหม่
            $sql = "UPDATE news SET title = :title, content = :content, image_path = :image_path WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':image_path', $filePath);
        } else {
            // อัปเดตเฉพาะข้อมูล (ไม่มีไฟล์ใหม่)
            $sql = "UPDATE news SET title = :title, content = :content WHERE id = :id";
            $stmt = $pdo->prepare($sql);
        }

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $_SESSION['success'] = "อัปเดตข่าวสารสำเร็จ";
            header("Location: news_dashboard.php");
            exit();
        } else {
            die("เกิดข้อผิดพลาดในการอัปเดตข้อมูล");
        }
    } catch (PDOException $e) {
        die("เกิดข้อผิดพลาด: " . $e->getMessage());
    }
} else {
    die("คำขอไม่ถูกต้อง");
}
?>
