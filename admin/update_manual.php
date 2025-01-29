<?php
session_start();
include('config/condb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];

    // ตรวจสอบการอัปโหลดไฟล์
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        $fileName = basename($_FILES['file']['name']);
        $filePath = $uploadDir . $fileName;

        // สร้างโฟลเดอร์ถ้ายังไม่มี
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // อัปโหลดไฟล์ใหม่
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
            $_SESSION['error'] = "เกิดข้อผิดพลาดในการอัปโหลดไฟล์";
            header("Location: edit_manual.php?id=$id");
            exit;
        }

        // คำนวณขนาดไฟล์ใหม่
        $fileSize = round(filesize($filePath) / 1024); // ขนาดไฟล์ใน KB

        // อัปเดตข้อมูลพร้อมไฟล์ใหม่และขนาดไฟล์
        $sql = "UPDATE manuals SET name = :name, file_path = :file_path, file_size = :file_size WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':file_path', $filePath);
        $stmt->bindParam(':file_size', $fileSize);
        $stmt->bindParam(':id', $id);
    } else {
        // อัปเดตเฉพาะชื่อคู่มือ
        $sql = "UPDATE manuals SET name = :name WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);
    }

    // ดำเนินการอัปเดต
    if ($stmt->execute()) {
        $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
        header("Location: manual.php");
        exit;
    } else {
        $_SESSION['error'] = "เกิดข้อผิดพลาดในการอัปเดตข้อมูล";
        header("Location: edit_manual.php?id=$id");
        exit;
    }
} else {
    die("คำขอไม่ถูกต้อง");
}
