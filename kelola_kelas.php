
<?php
// kelola_kelas.php
include 'includes/cek_session.php';
include 'config/koneksi.php';

$sql = "SELECT * FROM t_kelas ORDER BY nama ASC";
$hasil = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Kelas</title>

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
        }

        .page-title {
            font-weight: 700;
            color: #243b53;
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

        .action-buttons {
            display: flex;
            gap: 6px;
            white-space: nowrap;
        }

        .status-aktif {
            background-color: #d1fae5;
            color: #047857;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-nonaktif {
            background-color: #e5e7eb;
            color: #4b5563;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .table-responsive {
            width: 100%;
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <?php include 'layout/sidebar.php'; ?>

        <!-- KONTEN UTAMA -->
        <main class="col-md-9 col-lg-10 p-4">

            <div class="content-card">

                <!-- JUDUL HALAMAN -->
                <div class="d-flex flex-wrap justify-content-between
                            align-items-center gap-3 mb-4">

                    <div>
                        <h2 class="page-title mb-1">Kelola Kelas</h2>
                        <p class="text-muted mb-0">
                            Kelola data kelas yang terdaftar di sistem.
                        </p>
                    </div>

                    <a href="tambah_kelas.php" class="btn btn-primary">
                        + Tambah Kelas
                    </a>

                </div>

                <!-- KEMBALI KE DASHBOARD -->
                <div class="mb-3">
                    <a href="dashboard.php"
                       class="btn btn-outline-secondary btn-sm">
                        &larr; Kembali ke Dashboard
                    </a>
                </div>

                <!-- TABEL DATA KELAS -->
                <div class="table-responsive">

                    <table id="tabelKelas"
                           class="table table-striped table-bordered table-hover align-middle w-100">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Kelas</th>
                                <th>Tingkat</th>
                                <th>Jurusan</th>
                                <th>Status Aktif</th>
                                <th>Dibuat</th>
                                <th>Diubah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>

                            <tr>

                                <td>
                                    <?php echo htmlspecialchars($row['id']); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($row['nama']); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($row['tingkat']); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($row['jurusan']); ?>
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

                                <td>
                                    <?php echo htmlspecialchars($row['created_at'] ?? ''); ?>
                                </td>

                                <td>
                                    <?php echo htmlspecialchars($row['updated_at'] ?? ''); ?>
                                </td>

                                <td>
                                    <div class="action-buttons">

                                        <a href="edit_kelas.php?id=<?php echo urlencode($row['id']); ?>"
                                           class="btn btn-warning btn-sm">
                                            Edit
                                        </a>

                                        <a href="hapus_kelas.php?id=<?php echo urlencode($row['id']); ?>"
                                           class="btn btn-danger btn-sm"
                                           onclick="return confirm('Yakin ingin menghapus data kelas ini?');">
                                            Hapus
                                        </a>

                                    </div>
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

<!-- Integrasi DataTables dengan Bootstrap 5 -->
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap5.js"></script>

<!-- Konfigurasi DataTables -->
<script>
$(document).ready(function () {

    $('#tabelKelas').DataTable({

        // Jumlah data awal
        pageLength: 10,

        // Pilihan jumlah data
        lengthMenu: [5, 10, 25, 50, 100],

        // Urutkan berdasarkan nama kelas
        order: [[1, 'asc']],

        // Kolom Aksi tidak dapat dicari atau diurutkan
        columnDefs: [
            {
                targets: 7,
                orderable: false,
                searchable: false
            }
        ],

        // Bahasa Indonesia
        language: {
            search: "Cari:",
            searchPlaceholder: "Cari nama kelas, jurusan...",

            lengthMenu: "Tampilkan _MENU_ data",

            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data kelas",

            infoEmpty: "Menampilkan 0 sampai 0 dari 0 data kelas",

            infoFiltered: "(difilter dari _MAX_ total data)",

            zeroRecords: "Data kelas tidak ditemukan",

            emptyTable: "Belum ada data kelas",

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
