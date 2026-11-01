<?php
// konfirmasi_hapus_jenis_pelanggaran.php

include 'includes/cek_session.php';
include 'config/koneksi.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    $_SESSION['pesan_error'] = 'ID jenis pelanggaran tidak valid.';
    header('Location: kelola_jenis_pelanggaran.php');
    exit;
}

// Ambil data jenis pelanggaran
$stmt = mysqli_prepare(
    $koneksi,
    "SELECT nama, kode, poin FROM t_pelanggaran WHERE id = ?"
);

mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$hasil = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($hasil);

mysqli_stmt_close($stmt);

if (!$data) {
    $_SESSION['pesan_error'] = 'Data jenis pelanggaran tidak ditemukan.';
    header('Location: kelola_jenis_pelanggaran.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hapus Jenis Pelanggaran</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <?php include 'layout/sidebar.php'; ?>

        <main class="col-md-9 col-lg-10 p-4">

            <h2 class="mb-4">Hapus Jenis Pelanggaran</h2>

            <div class="card border-danger shadow-sm">

                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">Konfirmasi Penghapusan</h5>
                </div>

                <div class="card-body">

                    <div class="alert alert-warning">
                        <strong>Perhatian!</strong>
                        Data yang sudah dihapus tidak dapat dikembalikan.
                        Pastikan kamu ingin menghapus data ini.
                    </div>

                    <h5 class="mb-3">Detail Jenis Pelanggaran</h5>

                    <table class="table table-bordered">
                        <tr>
                            <th width="30%">Nama Pelanggaran</th>
                            <td><?= htmlspecialchars($data['nama']); ?></td>
                        </tr>

                        <tr>
                            <th>Kode Pelanggaran</th>
                            <td><?= htmlspecialchars($data['kode'] ?? '-'); ?></td>
                        </tr>

                        <tr>
                            <th>Poin</th>
                            <td><?= (int) $data['poin']; ?></td>
                        </tr>
                    </table>

                    <div class="mt-4">
                        <a href="hapus_jenis_pelanggaran.php?id=<?= (int) $id; ?>"
                            class="btn btn-danger"
                            onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?');">
                            Hapus Data
                        </a>

                        <a href="kelola_jenis_pelanggaran.php"
                            class="btn btn-secondary">
                            Batal
                        </a>
                    </div>

                </div>
            </div>

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
