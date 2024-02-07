<?php
include "config.php";

// Periksa apakah 'save' telah diset
if(isset($_POST['save'])) {
    // Jika 'save' telah diset, periksa nilai 'save'
    if ($_POST['save'] == 'add') {
        $nama = $_FILES['gambar']['name'];
        $ukuran = $_FILES['gambar']['size'];
        $tipe = $_FILES['gambar']['type'];
        $tmp_file = $_FILES['gambar']['tmp_name'];

        $path = "image/" . $nama;

        if (move_uploaded_file($tmp_file, $path)) {
            $query = "INSERT INTO gambar (nama, ukuran, tipe) VALUES('$nama', '$ukuran', '$tipe')";
            $sql = mysqli_query($db, $query);

            if($sql) {
                header("location: data_upload.php");
            } else {
                echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
                echo "<br><a href='form-upload.php'>Kembali Ke Form</a>";
            }
        } else {
            echo "Maaf, Gambar gagal untuk diupload.";
            echo "<br><a href='form-upload.php'>Kembali Ke Form</a>";
        }
    } elseif ($_POST['save'] == 'edit') {
        $id = $_POST['id_gambar'];

        $nama_file = $_FILES['gambar']['name'];
        $ukuran_file = $_FILES['gambar']['size'];
        $tipe_file = $_FILES['gambar']['type'];
        $tmp_file = $_FILES['gambar']['tmp_name'];

        $path = "image/" . $nama_file;

        $sql = "UPDATE gambar SET nama='" . $nama_file . "', ukuran='" . $ukuran_file . "', tipe='" . $tipe_file . "' WHERE id_gambar='$id'";
        $query = mysqli_query($db, $sql);
        if ($query) {
            header('Location: data_upload.php?status=sukses');
        } else {
            header('Location: data_upload.php?status=gagal');
        }
    }
}

if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];

    $sql ="DELETE FROM gambar WHERE id_gambar ='$id';";
    $query = mysqli_query($db, $sql);
    if( $query ) {
        header('Location: data_upload.php?status=sukses');
    } else {
        header('Location: data_upload.php?status=gagal');
    }
}
?>
