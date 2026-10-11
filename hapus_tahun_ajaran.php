<?php
// hapus_tahun_ajaran.php
session_start();

include 'includes/cek_session.php';
include 'config/koneksi.php';

$id = $_GET['id'];

// Ambil nama tahun ajaran sebelum dihapus
$cek = mysqli_query(
    $koneksi,
    "SELECT nama FROM t_tahun_ajaran WHERE id = '$id'"
);

$data = mysqli_fetch_assoc($cek);

// Hapus data tahun ajaran
$sql = "DELETE FROM t_tahun_ajaran WHERE id = '$id'";

if (mysqli_query($koneksi, $sql)) {

    $id_user = $_SESSION['id_user'];
    $waktu = date('Y-m-d H:i:s');

    $aktivitas = "hapus tahun ajaran: " . $data['nama'];

    // Simpan aktivitas ke tabel log
    $log = "INSERT INTO t_log 
            (id_user, aktivitas, waktu) 
            VALUES 
            ('$id_user', '$aktivitas', '$waktu')";

    mysqli_query($koneksi, $log);
}

// Kembali ke halaman kelola tahun ajaran
header('Location: kelola_tahun_ajaran.php');
exit;
?>