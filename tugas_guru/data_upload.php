<?php
include("config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SK Negeri 1 Lagos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SK Negeri 1 Lagos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="index.php">Home</a>
                    <a class="nav-link" href="form-daftar.php">Pendaftaran</a>
                    <a class="nav-link" href="data-guru.php">Data Guru</a>
                    <a class="nav-link" href="data_upload.php">Data Upload</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2>Data Guru</h2><br>
        <a class="btn btn-primary" href="form-upload.php" role="button">Tambah Data</a>

        <br><br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Ukuran</th>
                    <th>Tipe</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM gambar"; // Tampilkan semua data gambar
                $sql = mysqli_query($db, $query); // Eksekusi query

                $row = mysqli_num_rows($sql); // Ambil jumlah data

                if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                    while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi query
                        echo "<tr>";
                        echo "<td>" . $data['id_gambar'] . "</td>";
                        echo "<td><img src='image/" . $data['nama'] . "' width='100' height='100'></td>";
                        echo "<td>" . $data['nama'] . "</td>";
                        echo "<td>" . $data['ukuran'] . "</td>";
                        echo "<td>" . $data['tipe'] . "</td>";
                        echo "<td>
                                <a href='upload.php?edit=" . $data['id_gambar'] . "' class='btn btn-warning'>Edit</a>
                                <a href='upload.php?hapus=" . $data['id_gambar'] . "' class='btn btn-danger'>Delete</a>
                            </td>";
                        echo "</tr>";
                    }
                } else { // Jika data tidak ada
                    echo "<tr><td colspan='6'>Data tidak ada</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
