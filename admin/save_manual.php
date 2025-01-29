<?php
session_start();
include('config/condb.php'); // ใช้ $conn สำหรับเชื่อมต่อฐานข้อมูล

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['file']['tmp_name'];
        $fileSize = round(filesize($fileTmpPath) / 1024); // ขนาดไฟล์ใน KB
        $uploadDate = date('Y-m-d'); // วันที่อัปโหลด

        // อ่านไฟล์ในรูปแบบไบนารี
        $fileData = file_get_contents($fileTmpPath);

        try {
            // เตรียมคำสั่ง SQL
            $sql = "INSERT INTO manuals (name, upload_date, file_size, file_data) VALUES (:name, :upload_date, :file_size, :file_data)";
            $stmt = $conn->prepare($sql);

            // ผูกค่าพารามิเตอร์
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':upload_date', $uploadDate);
            $stmt->bindParam(':file_size', $fileSize);
            $stmt->bindParam(':file_data', $fileData, PDO::PARAM_LOB);

            // Execute และตรวจสอบผลลัพธ์
            if ($stmt->execute()) {
                $_SESSION['success'] = "เพิ่มคู่มือสำเร็จ";
                header("Location: manual.php");
                exit();
            } else {
                // Debug ข้อผิดพลาด
                $errorInfo = $stmt->errorInfo();
                die("เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . $errorInfo[2]);
            }
        } catch (PDOException $e) {
            die("เกิดข้อผิดพลาด: " . $e->getMessage());
        }
    } else {
        // ตรวจสอบว่าเกิดข้อผิดพลาดอะไรในไฟล์
        $error = $_FILES['file']['error'];
        die("เกิดข้อผิดพลาดในการอัปโหลดไฟล์: " . $error);
    }
} else {
    die("คำขอไม่ถูกต้อง");
}

