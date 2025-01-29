<?php
session_start();
include('config/condb.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $object = $_POST['object'];

    // อัปเดตข้อมูลผู้ใช้ในฐานข้อมูล
    $sql = "UPDATE users 
            SET first_name = :first_name, 
                last_name = :last_name, 
                email = :email, 
                tel = :tel, 
                object = :object 
            WHERE id = :id";
    $stmt = $conn->prepare($sql);

    // ผูกค่าพารามิเตอร์
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':object', $object);
    $stmt->bindParam(':id', $id);

    // ดำเนินการอัปเดต
    if ($stmt->execute()) {
        $_SESSION['success'] = "แก้ไขข้อมูลสำเร็จ";
        header("Location: user.php");
        exit;
    } else {
        $_SESSION['error'] = "เกิดข้อผิดพลาดในการอัปเดตข้อมูล";
        header("Location: edit_user.php?id=$id");
        exit;
    }
} else {
    die("คำขอไม่ถูกต้อง");
}
