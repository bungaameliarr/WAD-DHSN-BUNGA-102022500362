<?php
include 'koneksi.php';

$id =$_GET['id'];

mysqli_query($conn, "DELETE FROM `Data_Armada_Kendaraan` WHERE id_armada = '$id'");

header("Location: index.php");
exit();
?>