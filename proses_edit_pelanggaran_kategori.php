
<?php
<<<<<<< HEAD
// edit_pelanggaran_kategori.php
=======
// proses_edit_pelanggaran_kategori.php
>>>>>>> ae522cf4adc4ed5a4e72b80992dc0618c43cf223

include 'includes/cek_session.php';
include 'config/koneksi.php';

<<<<<<< HEAD
$id = $_GET['id'];

$sql = "SELECT * FROM t_pelanggaran_kategori WHERE id = '$id'";
$hasil = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($hasil);

if (!$data) {
    die("Data kategori pelanggaran tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Kategori Pelanggaran</title>
</head>

<body>

    <h1>Edit Kategori Pelanggaran</h1>

    <form action="proses_edit_pelanggaran_kategori.php" method="POST">

        <input type="hidden" name="id"
               value="<?php echo $data['id']; ?>">

        <table>

            <tr>
                <td>Nama Kategori</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama"
                           value="<?php echo htmlspecialchars($data['nama']); ?>"
                           required>
                </td>
            </tr>

            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td>
                    <textarea name="deskripsi" rows="4" cols="30"><?php
                        echo htmlspecialchars($data['deskripsi'] ?? '');
                    ?></textarea>
                </td>
            </tr>

            <tr>
                <td>Status Aktif</td>
                <td>:</td>
                <td>
                    <select name="status_aktif" required>

                        <option value="1"
                            <?php
                            if ($data['status_aktif'] == 1) {
                                echo 'selected';
                            }
                            ?>>
                            Aktif
                        </option>

                        <option value="0"
                            <?php
                            if ($data['status_aktif'] == 0) {
                                echo 'selected';
                            }
                            ?>>
                            Tidak Aktif
                        </option>

                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="3">
                    <input type="submit" value="Update">
                </td>
            </tr>

        </table>

    </form>

    <p>
        <a href="kelola_pelanggaran_kategori.php">
            Kembali ke Kelola Kategori Pelanggaran
        </a>
    </p>

</body>
</html>
=======
$id = $_POST['id'];
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
$status_aktif = $_POST['status_aktif'];

$sql = "UPDATE t_pelanggaran_kategori SET
        nama = '$nama',
        deskripsi = '$deskripsi',
        status_aktif = '$status_aktif',
        updated_at = CURRENT_TIMESTAMP
        WHERE id = '$id'";

if (mysqli_query($koneksi, $sql)) {

    header("Location: kelola_pelanggaran_kategori.php");
    exit;

} else {

    echo "Gagal mengubah data kategori pelanggaran: "
         . mysqli_error($koneksi);

}
?>
>>>>>>> ae522cf4adc4ed5a4e72b80992dc0618c43cf223
