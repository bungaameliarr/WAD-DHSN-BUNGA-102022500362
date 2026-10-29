<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rental Mobil - Armada</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header-utama">
        <h1>Sistem Informasi Rental Mobil</h1>
        <p>Modul Armada Kendaraan</p>
    </header>

    <nav class="menu-navigasi">
        <a href="index.php" class="link-menu link-aktif">Armada Kendaraan</a>
    </nav>

    <section class="kotak-konten">
        <h3>Tambah Data Kendaraan</h3>

        <form action="create.php" method="POST">
            <p class="grup-input">
                <label for="plat" class="label-teks">Nomor Plat</label>
                <input type="text" id="plat" name="nomor_plat" class="kotak-input" required>
            </p>

            <p class="grup-input">
                <label for="unit" class="label-teks">Unit Kendaraan</label>
                <input type="text" id="unit" name="unit" class="kotak-input" required>
            </p>

            <p class="grup-input">
                <label for="tahun" class="label-teks">Tahun Pembuatan</label>
                <input type="number" id="tahun" name="tahun_pembuatan" class="kotak-input" required>
            </p>

            <p class="grup-input">
                <label for="merek" class="label-teks">Merek Kendaraan</label>
                <input type="text" id="merek" name="merek" class="kotak-input" required>
            </p>

            <p class="grup-input">
                <label for="transmisi" class="label-teks">Tipe Transmisi</label>
                <select id="transmisi" name="tipe_transmisi" class="kotak-select" required>
                    <option value="">-- Pilih Transmisi --</option>
                    <option value="Manual">Manual</option>
                    <option value="Automatic">Automatic</option>
                </select>
            </p>

            <button type="submit" name="create" class="tombol-simpan">Simpan Data</button>
        </form>
    </section>

    <section class="kotak-konten">
        <h3>Data Armada Kendaraan</h3>

        <table class="tabel-data">
            <tr class="header-tabel">
                <th>NO</th>
                <th>NOMOR PLAT</th>
                <th>UNIT</th>
                <th>TAHUN PEMBUATAN</th>
                <th>MEREK</th>
                <th>TRANSMISI</th> 
                <th>AKSI</th>
            </tr>

            <?php
            $no = 1;
            $data = mysqli_query($conn, "SELECT * FROM `Data_Armada_Kendaraan`");
            while ($row = mysqli_fetch_assoc($data)) :
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><strong><?php echo $row['nomor_plat']; ?></strong></td>
                <td><?php echo $row['unit']; ?></td>
                <td><?php echo $row['tahun_pembuatan']; ?></td>
                <td><?php echo $row['merek']; ?></td>
                <td><?php echo $row['transmisi']; ?></td> 
                <td>
                    <a href="edit.php?id=<?php echo $row['id_armada']; ?>" style="color: purple; text-decoration: none; font-weight: bold;">Edit</a> | 
                    <a href="delete.php?id=<?php echo $row['id_armada']; ?>" style="color: red; text-decoration: none; font-weight: bold;" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>

        </table>
    </section>

</body>
</html>