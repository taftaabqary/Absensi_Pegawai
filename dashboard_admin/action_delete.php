<?php
include '../connection.php';
$employee_id = $_GET['id'];
$sql = "DELETE FROM users WHERE id=$employee_id ";

$result = $db->query($sql);

if ($result == TRUE) {
    header("Location:profile_pegawai.php?message=Data berhasil dihapus!");
} else {
    header("Location:profile_pegawai.php?message=Data tidak berhasil dihapus!");
}
