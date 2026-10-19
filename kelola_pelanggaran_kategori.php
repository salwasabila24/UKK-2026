
<?php
// kelola_pelanggaran_kategori.php

include 'includes/cek_session.php';
include 'config/koneksi.php';

$sql = "SELECT * FROM t_pelanggaran_kategori ORDER BY id DESC";
$hasil = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kelola Kategori Pelanggaran</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- DataTables Bootstrap 5 -->
    <link href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap5.min.css"
          rel="stylesheet">

    <style>
        body {
            background-color: #f5f8fc;
            font-family: Arial, sans-serif;
            color: #334155;
        }

        main {
            min-height: 100vh;
        }

        .page-title {
            color: #243b53;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .page-subtitle {
            color: #64748b;
            margin-bottom: 25px;
        }

        .content-card {
            background: #ffffff;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 18px rgba(15, 23, 42, 0.06);
            border: 1px solid #e8eef5;
        }

        .table thead th {
            background-color: #e7f1ff;
            color: #24476b;
            white-space: nowrap;
            font-size: 14px;
            vertical-align: middle;
        }

        .table tbody td {
            vertical-align: middle;
            font-size: 14px;
        }

        .table tbody tr:hover td {
            background-color: #f8fbff;
        }

        .badge-status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-aktif {
            background-color: #dcfce7;
            color: #166534;
        }

        .status-nonaktif {
            background-color: #e2e8f0;
            color: #475569;
        }

        .btn {
            border-radius: 7px;
            font-size: 13px;
        }

        .action-buttons {
            display: flex;
            gap: 6px;
            white-space: nowrap;
        }

        .description-cell {
            min-width: 180px;
            max-width: 300px;
            white-space: normal;
            overflow-wrap: anywhere;
        }

        .dataTables_wrapper .dataTables_filter input,
        .dataTables_wrapper .dataTables_length select {
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            padding: 6px 10px;
            margin-bottom: 10px;
        }

        .dataTables_wrapper .dataTables_filter input:focus,
        .dataTables_wrapper .dataTables_length select:focus {
            border-color: #86b7fe;
            outline: 0;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.12);
        }

        .dt-info {
            color: #64748b;
            font-size: 13px;
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .content-card {
                padding: 15px;
            }

            main {
                padding: 16px !important;
            }
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <?php include 'layout/sidebar.php'; ?>

        <!-- KONTEN UTAMA -->
        <main class="col-md-9 col-lg-10 p-4">

            <div class="d-flex flex-wrap justify-content-between
                        align-items-center gap-3 mb-4">

                <div>
                    <h1 class="page-title">Kelola Kategori Pelanggaran</h1>
                    <p class="page-subtitle mb-0">
                        Kelola data kategori pelanggaran siswa.
                    </p>
                </div>

                <div class="d-flex gap-2 flex-wrap">
                    <a href="dashboard.php" class="btn btn-outline-secondary">
                        Kembali ke Dashboard
                    </a>

                    <a href="tambah_pelanggaran_kategori.php"
                       class="btn btn-primary">
                        + Tambah Kategori
                    </a>
                </div>

            </div>

            <div class="content-card">

                <div class="d-flex justify-content-between
                            align-items-center mb-3">
                    <h5 class="fw-bold mb-0" style="color: #243b53;">
                        Data Kategori Pelanggaran
                    </h5>
                </div>

                <div class="table-responsive">
                    <table id="tabelKategori"
                           class="table table-bordered table-hover align-middle w-100">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th>Status Aktif</th>
                                <th>Dibuat</th>
                                <th>Diubah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if ($hasil && mysqli_num_rows($hasil) > 0) { ?>
                                <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>

                                    <tr>
                                        <td>
                                            <?php echo (int) $row['id']; ?>
                                        </td>

                                        <td class="fw-semibold">
                                            <?php
                                            echo htmlspecialchars(
                                                $row['nama'] ?? '',
                                                ENT_QUOTES,
                                                'UTF-8'
                                            );
                                            ?>
                                        </td>

                                        <td class="description-cell">
                                            <?php
                                            echo htmlspecialchars(
                                                $row['deskripsi'] ?? '',
                                                ENT_QUOTES,
                                                'UTF-8'
                                            );
                                            ?>
                                        </td>

                                        <td>
                                            <?php if ((int) $row['status_aktif'] === 1) { ?>
                                                <span class="badge-status status-aktif">
                                                    Aktif
                                                </span>
                                            <?php } else { ?>
                                                <span class="badge-status status-nonaktif">
                                                    Tidak Aktif
                                                </span>
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <?php
                                            echo htmlspecialchars(
                                                $row['created_at'] ?? '-',
                                                ENT_QUOTES,
                                                'UTF-8'
                                            );
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                            echo htmlspecialchars(
                                                $row['updated_at'] ?? '-',
                                                ENT_QUOTES,
                                                'UTF-8'
                                            );
                                            ?>
                                        </td>

                                        <td>
                                            <div class="action-buttons">
                                                <a
                                                    href="edit_pelanggaran_kategori.php?id=<?php echo (int) $row['id']; ?>"
                                                    class="btn btn-warning btn-sm">
                                                    Edit
                                                </a>

                                                <a
                                                    href="hapus_pelanggaran_kategori.php?id=<?php echo (int) $row['id']; ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus kategori pelanggaran ini?');">
                                                    Hapus
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                <?php } ?>
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

<!-- Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function () {
    $('#tabelKategori').DataTable({
        pageLength: 10,

        lengthMenu: [5, 10, 25, 50, 100],

        order: [[0, 'desc']],

        columnDefs: [
            {
                targets: 6,
                orderable: false,
                searchable: false
            }
        ],

        language: {
            search: 'Cari:',
            searchPlaceholder: 'Cari kategori pelanggaran...',
            lengthMenu: 'Tampilkan _MENU_ data',
            info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data kategori',
            infoEmpty: 'Menampilkan 0 sampai 0 dari 0 data kategori',
            infoFiltered: '(difilter dari _MAX_ total data)',
            zeroRecords: 'Kategori pelanggaran tidak ditemukan',
            emptyTable: 'Belum ada data kategori pelanggaran',

            paginate: {
                first: 'Pertama',
                last: 'Terakhir',
                next: 'Berikutnya',
                previous: 'Sebelumnya'
            }
        }
    });
});
</script>

</body>
</html>
