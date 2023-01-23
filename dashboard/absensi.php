<table class="table table-striped table-dark table-hover">
    <tr>
        <th>Tanggal</th>
        <th>Jam Masuk</th>
        <th>Jam Keluar</th>
        <th>Performances</th>
    </tr>

    <?php
    include "../connection.php";

    date_default_timezone_set("Asia/Jakarta");
    $tgl = date('Y-m-d');
    $time = date("H:i:s");
    $employee_id = $_SESSION['employee_id'];

    $sql = "SELECT * FROM attendances WHERE employee_id = $employee_id";
    $result = $db->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['tgl'] . "</td>";
        echo "<td>" . $row['clock_in'] . "</td>";

        if (empty($row['clock_out']) && !empty($row['clock_in']) && $tgl == $row['tgl']) {
            echo "<td>
        <form action='' method='POST' onsubmit='return alert(`Terima kasih sudah bekerja hari ini`)'>
        <button type='submit' name='keluar' class='btn btn-outline-warning btn-sm'>ABSEN KELUAR</button>
        </form>
        </td>";
        } else {
            echo "<td>" . $row['clock_out'] . "</td>";
        }

        echo "<td> 😛</td>";
        echo "</tr>";
    }

    ?>
</table>

<form action="action.php" method="post">
    <button type="submit" name="absen" class="btn btn-outline-success">ABSEN MASUK</button>
</form>

<?php
if (isset($_POST['keluar'])) {
    $update = "UPDATE attendances SET clock_out ='$time' WHERE employee_id=$employee_id AND tgl='$tgl'";

    $clock_out = $db->query($update);
    if ($clock_out == TRUE) {
        session_start();
        session_destroy();
        header("Location:../index.php");
    }
}
?>