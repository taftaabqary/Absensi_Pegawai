<?php
include '../connection.php';

$id = $_POST['id'];
$employee_id = $_POST['employee_id'];
$fullname = $_POST['fullname'];
$role = $_POST['role'];
$password = $_POST['password'];

$passwords = password_hash($password, PASSWORD_DEFAULT);


$sql = "UPDATE users set employee_id=$employee_id,fullname='$fullname',role='$role',password='$passwords' WHERE id=$id";
$result = $db->query($sql);

if ($result == TRUE) {
    header("Location:profile_pegawai.php?message=Data berhasil diedit!");
} else {
    header("Location:profile_pegawai.php?message=Data tidak berhasil diedit!");
}
