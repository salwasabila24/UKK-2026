
<?php
session_start();
include "config/koneksi.php";

$nama = "Salwa Sabilatul Barkah";
$kelas = "XII RPL";
$sekolah = "SMK Muhammadiyah Tasikmalaya";
$jurusan = "Rekayasa Perangkat Lunak";
$hobi = "Menonton Drakor";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Saya</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR -->
        <div class="col-md-3 col-lg-2 bg-dark min-vh-100 p-3">

            <h4 class="text-white mb-4">
                Pelanggaran Siswa
            </h4>

            <ul class="nav nav-pills flex-column">

                <li class="nav-item mb-2">
                    <a href="dashboard.php" class="nav-link text-white">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a href="kelola_siswa.php" class="nav-link text-white">
                        Data Siswa
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a href="kelola_guru.php" class="nav-link text-white">
                        Data Guru
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a href="kelola_kelas.php" class="nav-link text-white">
                        Data Kelas
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a href="kelola_tahun_ajaran.php" class="nav-link text-white">
                        Data Tahun Ajaran
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a href="kelola_walikelas.php" class="nav-link text-white">
                        Data Wali Kelas
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a href="penempatan_siswa.php" class="nav-link text-white">
                        Penempatan Siswa
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a href="kelola_pelanggaran_kategori.php" class="nav-link text-white">
                        Kategori Pelanggaran
                    </a>
                </li>

                <li class="nav-item mb-2">
                    <a href="about_me.php" class="nav-link active">
                        About Me
                    </a>
                </li>

                <hr class="text-secondary">

                <li class="nav-item">
                    <a href="logout.php" class="nav-link text-danger">
                        Logout
                    </a>
                </li>

            </ul>
        </div>

        <!-- KONTEN UTAMA -->
        <main class="col-md-9 col-lg-10 p-4">

            <!-- JUDUL DAN CAPTION -->
            <div class="mb-4">
                <h3 class="fw-bold text-dark">Tentang Saya</h3>

                <p class="text-secondary">
                    Halaman ini menampilkan informasi pribadi dan
                    latar belakang pendidikan pengembang aplikasi
                    Sistem Informasi Pelanggaran Siswa.
                </p>

                <div class="alert alert-primary" role="alert">
                    <h6 class="fw-bold mb-1">Profil Pengembang</h6>
                    <p class="mb-0">
                        "Terus belajar, mengembangkan keterampilan,
                        dan menciptakan solusi melalui teknologi
                        untuk masa depan yang lebih baik."
                    </p>
                </div>
            </div>

            <!-- CARD PROFIL -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-body p-4">

                    <div class="text-center mb-4">

                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3 p-4">
                            <h1 class="text-primary fw-bold mb-0">S</h1>
                        </div>

                        <h4 class="fw-bold mb-1">
                            <?php echo $nama; ?>
                        </h4>

                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            <?php echo $kelas; ?>
                        </span>

                        <p class="text-secondary mt-2 mb-0">
                            Pengembang Aplikasi
                        </p>

                    </div>

                    <hr>

                    <h5 class="fw-bold mb-3">
                        Informasi Pribadi
                    </h5>

                    <div class="row g-3">

                        <div class="col-md-6">
                            <div class="bg-light rounded-3 p-3 h-100">
                                <small class="text-secondary">Nama Lengkap</small>
                                <h6 class="fw-semibold mb-0 mt-1">
                                    <?php echo $nama; ?>
                                </h6>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="bg-light rounded-3 p-3 h-100">
                                <small class="text-secondary">Kelas</small>
                                <h6 class="fw-semibold mb-0 mt-1">
                                    <?php echo $kelas; ?>
                                </h6>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="bg-light rounded-3 p-3 h-100">
                                <small class="text-secondary">Sekolah</small>
                                <h6 class="fw-semibold mb-0 mt-1">
                                    <?php echo $sekolah; ?>
                                </h6>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="bg-light rounded-3 p-3 h-100">
                                <small class="text-secondary">Jurusan</small>
                                <h6 class="fw-semibold mb-0 mt-1">
                                    <?php echo $jurusan; ?>
                                </h6>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="bg-light rounded-3 p-3 h-100">
                                <small class="text-secondary">Hobi</small>
                                <h6 class="fw-semibold mb-0 mt-1">
                                    <?php echo $hobi; ?>
                                </h6>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <!-- DESKRIPSI DIRI -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">

                <div class="card-body p-4">

                    <h5 class="fw-bold text-primary mb-3">
                        Deskripsi Diri
                    </h5>

                    <p class="text-secondary mb-0">
                        Saya adalah seorang pelajar kelas XII jurusan
                        Rekayasa Perangkat Lunak di SMK Muhammadiyah
                        Tasikmalaya. Saya memiliki ketertarikan dalam
                        bidang teknologi, khususnya pengembangan website.
                        Saya senang mempelajari hal-hal baru mengenai
                        pemrograman dan ingin terus mengembangkan
                        kemampuan agar dapat menjadi seorang Web Developer.
                    </p>

                </div>
            </div>

            <!-- TOMBOL KEMBALI -->
            <a href="dashboard.php" class="btn btn-primary">
                Kembali ke Dashboard
            </a>

        </main>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
