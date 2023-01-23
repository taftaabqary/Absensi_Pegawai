<?php
include "../connection.php";
session_start();
date_default_timezone_set("Asia/Jakarta");
$employee_id = $_SESSION['employee_id'];
$tgl = date('Y-m-d');
$clock_in = date('H:i:s');


if (isset($_POST['absen'])) {
    $check_absen = "SELECT * FROM attendances WHERE employee_id = $employee_id AND tgl='$tgl'";
    $check = $db->query($check_absen);

    if ($check->num_rows > 0) {
        header("Location:index.php?message=Anda sudah absen hari ini !");
    } else {
        $sql = "INSERT INTO attendances (id,employee_id,tgl,clock_in,clock_out) VALUES(NULL,$employee_id,'$tgl','$clock_in',NULL)";
        $result = $db->query($sql);

        if ($result === TRUE) {
            header("Location:index.php?message=Absen berhasil dilakukan");
        } else {
            header("Location:index.php?message=Absensi gagal");
        }
    }
}
