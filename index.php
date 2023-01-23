<?php
session_start();
if (isset($_SESSION['status'])) {
    header("Location:dashboard/index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>LOGIN SISTEM ABSENSI</title>
</head>

<body>
    <div class="container">
        <section class="wrapper">
            <h2 class="title">LOGIN CAFE SENJA ☕</h2>
            <!-- Notifikasi Login -->
            <?php
            if (isset($_GET['message'])) {
                $msg = $_GET['message'];
                echo "<div class='notif-login'</div>$msg</div>";
            }
            ?>
            <!-- End Notifikasi Login -->

            <div>
                <form action="login.php" method="POST" class="form-login">
                    <label for="">Masukkan Nomer Induk Pegawai</label>
                    <input type="number" placeholder="Masukkan Nomer Induk" id="nip" name="nip" class="input-login" required autocomplete="off">

                    <label for="">Masukkan Password</label>
                    <input type="password" placeholder="******" id="password" name="password" class="input-login" required>
                    <button class="button-login" name="login">LOGIN</button>
                </form>
            </div>
        </section>
    </div>
</body>

</html>