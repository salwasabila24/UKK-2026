<?php
// kelola_siswa.php
include 'includes/cek_session.php';
include 'config/koneksi.php';

$sql   ="SELECT * FROM t_siswa ORDER BY nama ASC";
$hasil = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html>
    <head>
<<<<<<< HEAD
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <title>Kelola Siswa - Sistem Pelanggaran Siswa</title></head>
    <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <div class="container-fluid">
=======
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">   
        <title>Kelola Siswa - Sistem Pelanggaran Siswa</title>
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <div class="container-fluid">
>>>>>>> ae522cf4adc4ed5a4e72b80992dc0618c43cf223
    <div class="row">
        <!-- SIDEBAR -->
        <div class="col-md-3 col-lg-2 bg-dark min-vh-100 p-3">
            <h4 class="text-white mb-4">
                My Website
            </h4>
            <ul class="nav nav-pills flex-column">
                <li class="nav-item mb-2">
<<<<<<< HEAD
                    <a href="#" class="nav-link text-white">
=======
                    <a href="dashboard.php" class="nav-link text-white">
>>>>>>> ae522cf4adc4ed5a4e72b80992dc0618c43cf223
                        Dashboard
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="kelola_guru.php" class="nav-link text-white">
                        Kelola Guru
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="kelola_siswa.php" class="nav-link active">
                        Kelola Siswa
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="kelola_kelas.php" class="nav-link text-white">
                        Kelola Kelas
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="kelola_tahun_ajaran.php" class="nav-link text-white">
                        Kelola Tahun Ajaran
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="kelola_wali_kelas.php" class="nav-link text-white">
                        Kelola Wali Kelas
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="kelola_pelanggaran_kategori.php" class="nav-link text-white">
                        Kelola Pelanggaran Kategori
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="about_me.php" class="nav-link text-white">
                        About Me
                    </a>
                </li>
                <hr class="text-secondary">
                <li class="nav-item">
                    <a href="#" class="nav-link text-danger">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
        <!-- KONTEN -->
        <main class="col-md-9 col-lg-10 p-4">
            <h2>Dashboard</h2>
            <p>
                Selamat datang di halaman dashboard.
            </p>
            <div class="row">
        <h1>Kelola Siswa</h1>
        <p><a href="dashboard.php">Kembali ke Dashboard</a> | <a href="tambah_siswa.php">Tambah Siswa</a></p>
        <table class="table table-striped">
<<<<<<< HEAD

=======
>>>>>>> ae522cf4adc4ed5a4e72b80992dc0618c43cf223
            <tr>
        
                <th>NIS</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Status Aktif</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($hasil)){ ?>
            <tr>
                <td><?php echo $row['nis']; ?></td>
                <td><?php echo $row['nisn']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['jenis_kelamin']; ?></td>
                <td><?php echo $row['tanggal_lahir']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
                <td><?php if ($row['status_aktif'] == 1) {
                     echo "Aktif";
                } else {
                    echo "Tidak Aktif";
                }
                ?>
            </td>
               
                <td>
<<<<<<< HEAD
                    <a href="edit_siswa.php?id=<?php echo $row['id']; ?>">
                        <button type="button" class="btn btn-primary">Edit</button></a> |
=======
                    <a href="edit_siswa.php?id=<?php echo $row['id']; ?>"></a>
                    <button type="button" class="btn btn-primary">Edit</button> |
>>>>>>> ae522cf4adc4ed5a4e72b80992dc0618c43cf223
                    <a href="hapus_siswa.php?id=<?php echo $row['id']; ?>"
                    onclick="return confirm('Yakin hapus barang ini?');"></a>
                    <button class="btn btn-danger">Hapus</button>
                </td> 
            </tr>
        <?php } ?>
        </table>
    </body>
</html>