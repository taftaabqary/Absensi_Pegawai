<?php
include "../connection.php";
include "../Users.php";
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location:../index.php?message=Anda telah Logout");
}

if ($_SESSION['role'] == "admin") {
    header("Location:../dashboard_admin/index.php");
}

if (!isset($_SESSION['status'])) {
    header("Location:../index.php?message=Anda belum Login");
}

$tgl = date('Y-m-d');

?>

<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Halaman Absensi</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">





    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-bg-dark">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-start mb-0 absensi">ABSENSI PEGAWAI☕</h3>
                <nav class="nav nav-masthead justify-content-center float-md-end">
                    <a class="nav-link fw-bold py-2 px-2 active" aria-current="page" href="#">Home</a>
                    <a class="nav-link fw-bold py-1 px-0" href="#">
                        <form action="" method="POST">
                            <button type="submit" name="logout" class="btn btn-outline-light">LOGOUT</button>
                        </form>
                    </a>
                </nav>
            </div>
        </header>

        <main class="px-3">
            <h1>Halo <?php echo $_SESSION['fullname']; ?></h1>
            <p class="lead">ID Employee Anda : <?php echo $_SESSION['employee_id'] ?></p>
            <p class="lead">Status Pegawai Anda: <?php echo ucfirst($_SESSION['role'])  ?></p>
            <?php
            if (isset($_GET['message'])) {
                echo "<b><i>" . $_GET['message'] . "</i></b>";
            }
            ?>
            <p class="lead">
                <!-- table absen -->
                <?php include 'absensi.php' ?>
                <!-- end table absen -->
            </p>
        </main>

        <footer class="mt-auto text-white-50">
            <p>Muhammad Althaaf Abqary</p>
            <p>Created by Love ♥</p>
        </footer>
    </div>



</body>

</html>