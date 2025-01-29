<?php
session_start();
include('config/condb.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // ตรวจสอบว่ามีข้อมูลในฐานข้อมูลก่อนลบ
        $checkSql = "SELECT file_path FROM manuals WHERE id = :id";
        $checkStmt = $pdo->prepare($checkSql);
        $checkStmt->bindParam(':id', $id, PDO::PARAM_INT);
        $checkStmt->execute();
        $manual = $checkStmt->fetch();

        if ($manual) {
            // ลบไฟล์ในโฟลเดอร์ (ถ้ามี)
            if (!empty($manual['file_path']) && file_exists($manual['file_path'])) {
                unlink($manual['file_path']); // ลบไฟล์
            }

            // ลบข้อมูลในฐานข้อมูล
            $sql = "DELETE FROM manuals WHERE id = :id";
            $stmt = $pdo->prepare($sql);

            if ($stmt === false) {
                $errorInfo = $pdo->errorInfo();
                die("เกิดข้อผิดพลาดในคำสั่ง SQL: " . $errorInfo[2]);
            }

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $_SESSION['success'] = "ลบข้อมูลสำเร็จ";
                header("Location: manual.php");
                exit();
            } else {
                die("เกิดข้อผิดพลาดในการลบข้อมูล");
            }
        } else {
            die("ไม่พบข้อมูลที่ต้องการลบ");
        }
    } catch (PDOException $e) {
        die("เกิดข้อผิดพลาด: " . $e->getMessage());
    }
} else {
    die("คำขอไม่ถูกต้อง");
}
?>
