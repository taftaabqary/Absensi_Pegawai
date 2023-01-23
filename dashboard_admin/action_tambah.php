<?php
include '../connection.php';

$employee_id = $_POST['employee_id'];
$fullname = $_POST['fullname'];
$role = $_POST['role'];
$password = mysqli_escape_string($db, $_POST['password']);

//enkripsi password
$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users(id,employee_id,fullname,role,password) VALUES(NULL,$employee_id,'$fullname','$role','$password')";

$result = $db->query($sql);

if ($result === TRUE) {
    header("Location:index.php?message=Data User berhasil ditambah!");
} else {
    header("Location:index.php?message=Data user gagal ditambah!");
}

// 101 -> pass : taftaganteng
// 102 -> pass : anicantik123
// 103 -> pass : nusaduart3
// 104 -> pass : 123
// 105 -> pass : tafta123
// 106 -> pass : taftaimut  
