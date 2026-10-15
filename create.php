<?php
include 'koneksi.php';

if (isset($_POST['create'])) {
    $nomor_plat      =$_POST['nomor_plat'];
    $unit            =$_POST['unit'];
    $tahun_pembuatan =$_POST['tahun_pembuatan'];
    $merek           =$_POST['merek'];
    $tipe_transmisi  =$_POST['tipe_transmisi'];

    $query = "INSERT INTO `Data_Armada_Kendaraan` (nomor_plat, unit, tahun_pembuatan, merek, transmisi)
              VALUES ('$nomor_plat', '$unit', '$tahun_pembuatan', '$merek', '$tipe_transmisi')";
    
    mysqli_query($conn,$query);

    if (mysqli_affected_rows($conn) > 0) {
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Gagal menambah data: " . mysqli_error($conn) . "'); window.location='index.php';</script>";
    }
}
?>