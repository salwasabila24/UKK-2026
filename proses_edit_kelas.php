<?php
// proses_edit_guru.php
include 'includes/cek_session.php';
include 'config/koneksi.php';


$nama = $_POST['nama'];
$tingkat = $_POST['tingkat'];
$jurusan = $_POST['jurusan'];
$status_aktif = $_POST['status_aktif'];

$sql = "UPDATE t_kelas SET
        nama = '$nama',
        tingkat = '$tingkat',
        jurusan = '$jurusan',
        status_aktif = '$status_aktif',
        updated_at = CURRENT_TIMESTAMP
        WHERE id = '$id'";

$hasil = mysqli_query($koneksi, $sql);

if ($hasil) {
    header("Location: kelola_kelas.php");
    exit;
} else {
    echo "Gagal mengubah data kelas: " . mysqli_error($koneksi);
}
?>