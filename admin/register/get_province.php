<?php
// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "b_farm";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// ดึงข้อมูลจังหวัด
$sql = "SELECT id, name_th FROM provinces";
$stmt = $conn->prepare($sql);
$stmt->execute();
$provinces = $stmt->fetchAll(PDO::FETCH_ASSOC);

// ส่งข้อมูลเป็น JSON
echo json_encode($provinces);
?>
