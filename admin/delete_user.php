<?php
session_start();
include('config/condb.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // ตรวจสอบว่ามีข้อมูลในฐานข้อมูลก่อนลบ
        $checkSql = "SELECT * FROM users WHERE id = :id";
        $checkStmt = $conn->prepare($checkSql);
        $checkStmt->bindParam(':id', $id, PDO::PARAM_INT);
        $checkStmt->execute();
        $user = $checkStmt->fetch();

        if ($user) {
            // ลบข้อมูลในฐานข้อมูล
            $sql = "DELETE FROM users WHERE id = :id";
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                $errorInfo = $conn->errorInfo();
                die("เกิดข้อผิดพลาดในคำสั่ง SQL: " . $errorInfo[2]);
            }

            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $_SESSION['success'] = "ลบข้อมูลผู้ใช้สำเร็จ";
                header("Location: user.php"); // กลับไปยังหน้าจัดการผู้ใช้
                exit();
            } else {
                die("เกิดข้อผิดพลาดในการลบข้อมูลผู้ใช้");
            }
        } else {
            die("ไม่พบข้อมูลผู้ใช้ที่ต้องการลบ");
        }
    } catch (PDOException $e) {
        die("เกิดข้อผิดพลาด: " . $e->getMessage());
    }
} else {
    die("คำขอไม่ถูกต้อง");
}
?>
