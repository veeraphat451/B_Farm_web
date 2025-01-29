<?php
session_start();
include('config/condb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $manual_name = $_POST['manual_name'];

    // ตรวจสอบการอัปโหลดไฟล์
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $filePath = $uploadDir . basename($_FILES['file']['name']);

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (!move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
            die("เกิดข้อผิดพลาดในการอัปโหลดไฟล์");
        }

        // อัปเดตข้อมูลพร้อมไฟล์ใหม่
        $sql = "UPDATE manuals SET manual_name = :manual_name, file_path = :file_path WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':manual_name', $manual_name);
        $stmt->bindParam(':file_path', $filePath);
        $stmt->bindParam(':id', $id);
    } else {
        // อัปเดตเฉพาะชื่อ
        $sql = "UPDATE manuals SET manual_name = :manual_name WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':manual_name', $manual_name);
        $stmt->bindParam(':id', $id);
    }

    if ($stmt->execute()) {
        $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
        header("Location: manual.php");
        exit();
    } else {
        die("เกิดข้อผิดพลาดในการอัปเดตข้อมูล");
    }
} else {
    die("คำขอไม่ถูกต้อง");
}
?>
