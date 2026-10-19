<?php
// dasboard.php
include "includes/cek_session.php";
include "config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
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
            margin-bottom: 8px;
        }

        .page-subtitle {
            color: #64748b;
            margin-bottom: 28px;
        }

        .dashboard-card {
            background-color: #ffffff;
            border: 1px solid #e8eef5;
            border-radius: 15px;
            box-shadow: 0 4px 18px rgba(15, 23, 42, 0.06);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            height: 100%;
        }

        .dashboard-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 22px rgba(15, 23, 42, 0.09);
        }

        .dashboard-card .card-body {
            padding: 25px;
        }

        .card-title {
            color: #64748b;
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 18px;
        }

        .card-number {
            color: #243b53;
            font-size: 34px;
            font-weight: 700;
            margin-bottom: 0;
        }

        .card-accent {
            width: 45px;
            height: 4px;
            border-radius: 10px;
            background-color: #60a5fa;
            margin-bottom: 18px;
        }

        @media (max-width: 768px) {
            main {
                padding: 16px !important;
            }

            .dashboard-card .card-body {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <?php include "layout/sidebar.php"; ?>

        <!-- KONTEN -->
        <main class="col-md-9 col-lg-10 p-4">

            <h2 class="page-title">Dashboard</h2>

            <p class="page-subtitle">
                Selamat datang di halaman dashboard
            </p>

            <div class="row">

                <!-- CARD DATA SISWA -->
                <div class="col-md-4 mb-3">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <div class="card-accent"></div>

                            <h5 class="card-title">
                                Data Siswa
                            </h5>

                            <h2 class="card-number">
                                100
                            </h2>
                        </div>
                    </div>
                </div>

                <!-- CARD DATA GURU -->
                <div class="col-md-4 mb-3">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <div class="card-accent"></div>

                            <h5 class="card-title">
                                Data Guru
                            </h5>

                            <h2 class="card-number">
                                50
                            </h2>
                        </div>
                    </div>
                </div>

                <!-- CARD KELAS -->
                <div class="col-md-4 mb-3">
                    <div class="card dashboard-card">
                        <div class="card-body">
                            <div class="card-accent"></div>

                            <h5 class="card-title">
                                Kelas
                            </h5>

                            <h2 class="card-number">
                                21
                            </h2>
                        </div>
                    </div>
                </div>

            </div>

        </main>
    </div>
</div>

<!-- Bootstrap 5 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>