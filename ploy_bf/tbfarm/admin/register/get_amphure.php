<?php
// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "b_farm";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// รับ province_id จากพารามิเตอร์ GET
$province_id = $_GET['province_id'];

// ดึงข้อมูลอำเภอ
$sql = "SELECT id, name_th AS amphure_name FROM amphures WHERE province_id = :province_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':province_id', $province_id);
$stmt->execute();
$amphures = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ส่งข้อมูลเป็น JSON
echo json_encode($amphures);
?>
