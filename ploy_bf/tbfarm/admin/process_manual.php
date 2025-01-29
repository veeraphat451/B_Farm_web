<?php
include('config/condb.php');

if (isset($_POST['add_manual'])) {
  $name = $_POST['manual_name'];
  $file = $_FILES['file_upload'];
  $file_path = "uploads/" . basename($file['name']);
  move_uploaded_file($file['tmp_name'], $file_path);

  $sql = "INSERT INTO manuals (manual_name, file_path, file_size, upload_date) VALUES (:name, :path, :size, NOW())";
  $query = $conn->prepare($sql);
  $query->execute(['name' => $name, 'path' => $file['name'], 'size' => round($file['size'] / 1024)]);
  header("Location: index.php");
}

if (isset($_POST['edit_manual'])) {
  $id = $_POST['id'];
  $name = $_POST['manual_name'];
  $file_path = $_FILES['file_upload']['name'] ? "uploads/" . basename($_FILES['file_upload']['name']) : null;

  if ($file_path) {
    move_uploaded_file($_FILES['file_upload']['tmp_name'], $file_path);
    $sql = "UPDATE manuals SET manual_name = :name, file_path = :path, file_size = :size WHERE id = :id";
    $params = ['name' => $name, 'path' => $_FILES['file_upload']['name'], 'size' => round($_FILES['file_upload']['size'] / 1024), 'id' => $id];
  } else {
    $sql = "UPDATE manuals SET manual_name = :name WHERE id = :id";
    $params = ['name' => $name, 'id' => $id];
  }
  $query = $conn->prepare($sql);
  $query->execute($params);
  header("Location: index.php");
}
?>
