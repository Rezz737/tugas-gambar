<?php include("config.php"); 
$id ='';
$nama = '';
$ukuran = '';
$jenis = '';

if(isset($_GET['edit'])){
  $id =$_GET['edit'];
  $sql ="SELECT * FROM gambar WHERE id_gambar='$id';";
  $query = mysqli_query($db, $sql);
  $result =mysqli_fetch_assoc($query);
  $id = $result['id_gambar'];
  $nama = $result['nama'];
  $ukuran = $result['ukuran'];
  $jenis = $result['tipe'];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 1 Lagos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="halaman.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> Data Guru SMK Negeri 1 Lagos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="halaman.php">Home</a>
        <a class="nav-link" href="index.php">Data siswa</a>
        <a class="nav-link" href="kelola1.php">Data guru</a>
        <a class="nav-link" href="data_upload.php">Data upload</a>
      </div>
    </div>
  </div>
</nav>
<div class="container mt-4">
    <h2>form upload file</h2><br>
    <form method="POST" enctype="multipart/form-data" action="upload.php">
        <div class="mb-3">
            <label for="foto" class="form-label">foto:</label>
            <input type="hidden" name="id_gambar" value ="<?php echo $id;?>" />
            <input type="file" class="form-control" name="image"/>
        </div>
        <div class="mb-3 row mt-4">
        <?php
    if(isset($_GET['edit'])){
      ?>
      <button type="submit" name="save" value="edit" class="btn btn-primary">
        simpan perubahan
    </button>
    <?php
    }else{
      ?>
      <button type="submit" name="save" value="add" class="btn btn-primary">
        Daptar
    </button>
    <?php
    }
    ?>
            </div>
    </form>
</div>
</body>
</html>