<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan!'); window.location='index.php';</script>";
    exit();
}

$id =$_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM `Data_Armada_Kendaraan` WHERE id_armada = '$id'");
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='index.php';</script>";
    exit();
}

if (isset($_POST['update'])) {
    $id_form         =$_POST['id_armada'];
    $nomor_plat      =$_POST['nomor_plat'];
    $unit            =$_POST['unit'];
    $tahun_pembuatan =$_POST['tahun_pembuatan'];
    $merek           =$_POST['merek'];
    $tipe_transmisi  =$_POST['tipe_transmisi'];

    $query = "UPDATE `Data_Armada_Kendaraan` SET 
              nomor_plat = '$nomor_plat', 
              unit = '$unit', 
              tahun_pembuatan = '$tahun_pembuatan', 
              merek = '$merek', 
              transmisi = '$tipe_transmisi' 
              WHERE id_armada = '$id_form'";
    
    mysqli_query($conn,$query);

    echo "<script>alert('Data berhasil diubah!'); window.location='index.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rental Mobil - Edit Armada</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header-utama">
        <h1>Sistem Informasi Rental Mobil</h1>
        <p>Edit Data Kendaraan</p>
    </header>

    <nav class="menu-navigasi">
        <a href="index.php" class="link-menu">Kembali ke Beranda</a>
    </nav>

    <section class="kotak-konten">
        <h3>Edit Data Kendaraan</h3>

        <form action="" method="POST">
            <input type="hidden" name="id_armada" value="<?php echo $row['id_armada']; ?>">

            <p class="grup-input">
                <label for="plat" class="label-teks">Nomor Plat</label>
                <input type="text" id="plat" name="nomor_plat" class="kotak-input" value="<?php echo $row['nomor_plat']; ?>" required>
            </p>

            <p class="grup-input">
                <label for="unit" class="label-teks">Unit Kendaraan</label>
                <input type="text" id="unit" name="unit" class="kotak-input" value="<?php echo $row['unit']; ?>" required>
            </p>

            <p class="grup-input">
                <label for="tahun" class="label-teks">Tahun Pembuatan</label>
                <input type="number" id="tahun" name="tahun_pembuatan" class="kotak-input" value="<?php echo $row['tahun_pembuatan']; ?>" required>
            </p>

            <p class="grup-input">
                <label for="merek" class="label-teks">Merek Kendaraan</label>
                <input type="text" id="merek" name="merek" class="kotak-input" value="<?php echo $row['merek']; ?>" required>
            </p>

            <p class="grup-input">
                <label for="transmisi" class="label-teks">Tipe Transmisi</label>
                <select id="transmisi" name="tipe_transmisi" class="kotak-select" required>
                    <option value="Manual" <?php if($row['transmisi'] == 'Manual') echo 'selected'; ?>>Manual</option>
                    <option value="Automatic" <?php if($row['transmisi'] == 'Automatic') echo 'selected'; ?>>Automatic</option>
                </select>
            </p>

            <button type="submit" name="update" class="tombol-simpan">Perbarui Data</button>
        </form>
    </section>

</body>
</html>