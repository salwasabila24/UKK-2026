
<?php
// penempatan_siswa.php

include 'includes/cek_session.php';
include 'config/koneksi.php';

// Ambil daftar siswa aktif
$siswa = mysqli_query(
    $koneksi,
    "SELECT id, nis, nama
     FROM t_siswa
     WHERE status_aktif = 1
     ORDER BY nama ASC"
);

// Ambil daftar tahun ajaran aktif
$tahun = mysqli_query(
    $koneksi,
    "SELECT id, nama
     FROM t_tahun_ajaran
     WHERE status_aktif = 1
     ORDER BY id DESC"
);

// Ambil daftar kelas aktif
$kelas = mysqli_query(
    $koneksi,
    "SELECT id, nama, tingkat, jurusan
     FROM t_kelas
     WHERE status_aktif = 1
     ORDER BY nama ASC"
);

// Ambil data penempatan siswa
$sql = "SELECT
            ks.id,
            s.nis,
            s.nama AS nama_siswa,
            ta.nama AS tahun_ajaran,
            k.nama AS nama_kelas,
            k.tingkat,
            k.jurusan,
            ks.tanggal_mulai,
            ks.tanggal_selesai,
            ks.status_aktif
        FROM t_kelas_siswa ks
        LEFT JOIN t_siswa s ON ks.siswa_id = s.id
        LEFT JOIN t_tahun_ajaran ta ON ks.tahun_ajaran_id = ta.id
        LEFT JOIN t_kelas k ON ks.kelas_id = k.id
        ORDER BY ks.id DESC";

$hasil = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Penempatan Siswa</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- DataTables Bootstrap 5 -->
    <link href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap5.css"
          rel="stylesheet">

    <style>
        body {
            background-color: #f5f8fc;
        }

        .content-card {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
        }

        .page-title {
            font-weight: 700;
            color: #243b53;
        }

        .section-title {
            color: #243b53;
            font-weight: 650;
            font-size: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            padding: 10px 12px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.12);
        }

        .table thead th {
            background-color: #e7f1ff;
            color: #24476b;
            white-space: nowrap;
            vertical-align: middle;
        }

        .table tbody td {
            vertical-align: middle;
        }

        .table {
            margin-top: 15px !important;
        }

        .btn {
            border-radius: 7px;
        }

        .status-aktif {
            background-color: #d1fae5;
            color: #047857;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-nonaktif {
            background-color: #e5e7eb;
            color: #4b5563;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .table-responsive {
            width: 100%;
        }

        .required-mark {
            color: #dc3545;
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <?php include 'layout/sidebar.php'; ?>

        <!-- KONTEN UTAMA -->
        <main class="col-md-9 col-lg-10 p-4">

            <!-- HEADER HALAMAN -->
            <div class="d-flex flex-wrap justify-content-between
                        align-items-center gap-3 mb-4">

                <div>
                    <h2 class="page-title mb-1">Penempatan Siswa</h2>
                    <p class="text-muted mb-0">
                        Atur penempatan siswa berdasarkan tahun ajaran dan kelas.
                    </p>
                </div>

            </div>

            <!-- KEMBALI KE DASHBOARD -->
            <div class="mb-3">
                <a href="dashboard.php"
                   class="btn btn-outline-secondary btn-sm">
                    &larr; Kembali ke Dashboard
                </a>
            </div>

            <!-- NOTIFIKASI SUKSES -->
            <?php if (isset($_SESSION['pesan_sukses'])) { ?>

                <div class="alert alert-success alert-dismissible fade show"
                     role="alert">

                    <?php
                    echo htmlspecialchars($_SESSION['pesan_sukses']);
                    unset($_SESSION['pesan_sukses']);
                    ?>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Tutup"></button>
                </div>

            <?php } ?>

            <!-- NOTIFIKASI ERROR -->
            <?php if (isset($_SESSION['pesan_error'])) { ?>

                <div class="alert alert-danger alert-dismissible fade show"
                     role="alert">

                    <?php
                    echo htmlspecialchars($_SESSION['pesan_error']);
                    unset($_SESSION['pesan_error']);
                    ?>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Tutup"></button>
                </div>

            <?php } ?>

            <!-- FORM PENEMPATAN SISWA -->
            <div class="content-card">

                <h3 class="section-title mb-4">
                    Form Penempatan Siswa
                </h3>

                <form action="proses_simpan_penempatan.php" method="POST">

                    <div class="row g-3">

                        <!-- SISWA -->
                        <div class="col-md-6">

                            <label for="siswa_id" class="form-label">
                                Siswa <span class="required-mark">*</span>
                            </label>

                            <select name="siswa_id"
                                    id="siswa_id"
                                    class="form-select"
                                    required>

                                <option value="">-- Pilih Siswa --</option>

                                <?php while ($s = mysqli_fetch_assoc($siswa)) { ?>

                                    <option value="<?php echo htmlspecialchars($s['id']); ?>">
                                        <?php
                                        echo htmlspecialchars(
                                            $s['nis'] . ' - ' . $s['nama']
                                        );
                                        ?>
                                    </option>

                                <?php } ?>

                            </select>
                        </div>

                        <!-- TAHUN AJARAN -->
                        <div class="col-md-6">

                            <label for="tahun_ajaran_id" class="form-label">
                                Tahun Ajaran <span class="required-mark">*</span>
                            </label>

                            <select name="tahun_ajaran_id"
                                    id="tahun_ajaran_id"
                                    class="form-select"
                                    required>

                                <option value="">-- Pilih Tahun Ajaran --</option>

                                <?php while ($ta = mysqli_fetch_assoc($tahun)) { ?>

                                    <option value="<?php echo htmlspecialchars($ta['id']); ?>">
                                        <?php echo htmlspecialchars($ta['nama']); ?>
                                    </option>

                                <?php } ?>

                            </select>
                        </div>

                        <!-- KELAS -->
                        <div class="col-md-6">

                            <label for="kelas_id" class="form-label">
                                Kelas <span class="required-mark">*</span>
                            </label>

                            <select name="kelas_id"
                                    id="kelas_id"
                                    class="form-select"
                                    required>

                                <option value="">-- Pilih Kelas --</option>

                                <?php while ($k = mysqli_fetch_assoc($kelas)) { ?>

                                    <option value="<?php echo htmlspecialchars($k['id']); ?>">
                                        <?php
                                        echo htmlspecialchars(
                                            $k['nama'] . ' - Tingkat ' .
                                            $k['tingkat'] . ' - ' .
                                            $k['jurusan']
                                        );
                                        ?>
                                    </option>

                                <?php } ?>

                            </select>
                        </div>

                        <!-- STATUS -->
                        <div class="col-md-6">

                            <label for="status_aktif" class="form-label">
                                Status <span class="required-mark">*</span>
                            </label>

                            <select name="status_aktif"
                                    id="status_aktif"
                                    class="form-select"
                                    required>

                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>

                            </select>
                        </div>

                        <!-- TANGGAL MULAI -->
                        <div class="col-md-6">

                            <label for="tanggal_mulai" class="form-label">
                                Tanggal Mulai <span class="required-mark">*</span>
                            </label>

                            <input type="date"
                                   name="tanggal_mulai"
                                   id="tanggal_mulai"
                                   class="form-control"
                                   required>
                        </div>

                        <!-- TANGGAL SELESAI -->
                        <div class="col-md-6">

                            <label for="tanggal_selesai" class="form-label">
                                Tanggal Selesai <span class="required-mark">*</span>
                            </label>

                            <input type="date"
                                   name="tanggal_selesai"
                                   id="tanggal_selesai"
                                   class="form-control"
                                   required>
                        </div>

                        <!-- TOMBOL SIMPAN -->
                        <div class="col-12 mt-4">

                            <button type="submit" class="btn btn-primary px-4">
                                Simpan Penempatan
                            </button>

                            <button type="reset"
                                    class="btn btn-outline-secondary px-4">
                                Reset
                            </button>

                        </div>

                    </div>

                </form>

            </div>

            <!-- TABEL DATA PENEMPATAN -->
            <div class="content-card">

                <h3 class="section-title mb-3">
                    Data Penempatan Siswa
                </h3>

                <p class="text-muted mb-3">
                    Daftar siswa beserta tahun ajaran, kelas, dan periode penempatannya.
                </p>

                <div class="table-responsive">

                    <table id="tabelPenempatan"
                           class="table table-striped table-bordered table-hover align-middle w-100">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Tahun Ajaran</th>
                                <th>Kelas</th>
                                <th>Tingkat</th>
                                <th>Jurusan</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php
                            $no = 1;

                            while ($row = mysqli_fetch_assoc($hasil)) {
                            ?>

                                <tr>

                                    <td><?php echo $no++; ?></td>

                                    <td>
                                        <?php echo htmlspecialchars($row['nis'] ?? '-'); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($row['nama_siswa'] ?? '-'); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($row['tahun_ajaran'] ?? '-'); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($row['nama_kelas'] ?? '-'); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($row['tingkat'] ?? '-'); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($row['jurusan'] ?? '-'); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($row['tanggal_mulai'] ?? '-'); ?>
                                    </td>

                                    <td>
                                        <?php echo htmlspecialchars($row['tanggal_selesai'] ?? '-'); ?>
                                    </td>

                                    <td>
                                        <?php if ($row['status_aktif'] == 1) { ?>

                                            <span class="status-aktif">
                                                Aktif
                                            </span>

                                        <?php } else { ?>

                                            <span class="status-nonaktif">
                                                Tidak Aktif
                                            </span>

                                        <?php } ?>
                                    </td>

                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </main>

    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap 5 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>

<!-- Integrasi DataTables Bootstrap 5 -->
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap5.js"></script>

<!-- Konfigurasi DataTables -->
<script>
$(document).ready(function () {

    $('#tabelPenempatan').DataTable({

        // Jumlah data awal
        pageLength: 10,

        // Pilihan jumlah data
        lengthMenu: [5, 10, 25, 50, 100],

        // Urutkan berdasarkan nomor/ID terbaru
        order: [[0, 'desc']],

        // Bahasa Indonesia
        language: {
            search: "Cari:",
            searchPlaceholder: "Cari nama siswa, NIS, kelas...",

            lengthMenu: "Tampilkan _MENU_ data",

            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data penempatan",

            infoEmpty: "Menampilkan 0 sampai 0 dari 0 data penempatan",

            infoFiltered: "(difilter dari _MAX_ total data)",

            zeroRecords: "Data penempatan tidak ditemukan",

            emptyTable: "Belum ada data penempatan siswa",

            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "Berikutnya",
                previous: "Sebelumnya"
            }
        }

    });

});
</script>

</body>
</html>
