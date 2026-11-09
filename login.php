<!-- login.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Pelanggaran Siswa</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">

            <div class="col-md-5 col-lg-4">

                <div class="card shadow border-0 rounded-lg">

                    <div class="card-body p-4">

                        <div class="text-center mb-4">

                            <div class="mb-3">
                                <span class="badge badge-primary p-3 rounded-circle">
                                    <h2 class="mb-0">PS</h2>
                                </span>
                            </div>

                            <h3 class="font-weight-bold text-primary">
                                Login
                            </h3>

                            <h5 class="text-dark">
                                Aplikasi Pelanggaran Siswa
                            </h5>

                            <p class="text-muted small">
                                Silakan masuk menggunakan akun Anda
                            </p>

                        </div>

                        <?php
                        session_start();

                        if (isset($_SESSION['pesan_error'])) {
                            echo '<div class="alert alert-danger text-center" role="alert">';
                            echo $_SESSION['pesan_error'];
                            echo '</div>';

                            unset($_SESSION['pesan_error']);
                        }
                        ?>

                        <form action="proses_login.php" method="POST">

                            <div class="form-group">
                                <label for="email" class="font-weight-bold">
                                    Email
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    id="email"
                                    placeholder="Masukkan email Anda"
                                    required
                                >
                            </div>

                            <div class="form-group">
                                <label for="password" class="font-weight-bold">
                                    Password
                                </label>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    id="password"
                                    placeholder="Masukkan password Anda"
                                    required
                                >
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary btn-block font-weight-bold">
                                    Login
                                </button>
                            </div>

                        </form>

                        <hr>

                        <div class="text-center">
                            <small class="text-muted">
                                Sistem Informasi Pelanggaran Siswa
                            </small>
                        </div>

                    </div>
                </div>

                <p class="text-center text-muted small mt-3">
                    &copy; 2026 Aplikasi Pelanggaran Siswa
                </p>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
