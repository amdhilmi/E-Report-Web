<?php
    include('connect.php');

    $id = $_GET['id'];

    $queryData = "SELECT * FROM profiles WHERE id = $id";

    $result = mysqli_query($koneksi, $queryData);

    while($loop = mysqli_fetch_assoc($result)) {
        $data = $loop;
    }

    if(isset($_POST['btn'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tanggal = $_POST['tanggal'];
        $judul = $_POST['judul'];
        $laporan = $_POST['laporan'];

        $result = mysqli_query(
            $koneksi,
            "UPDATE profiles SET
             nama='$nama', alamat='$alamat', tanggal='$tanggal', judul='$judul', laporan='$laporan'
            WHERE id=$id"
        );

        if($result) {
            echo "<script>
                alert ('Data Berhasil Di Update')
                document.location.href='index.php'
            </script>";
        } else {
          echo "<script>
                alert('Data Gagal Di Update')
            </script>";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="edit.css">
    <title>EDIT</title>
</head>
<body>

    <h1>Edit Data <?= $data['nama'] ?>?</h1>

    <a href="hasil.php" style="justify-content: center; align-items: center; display: flex;">CANCEL</a>

    </br>

    <form action="" method="post">
        <div class="container">
            <div class="label">
    <div class="nta">
    <label for="">Nama</label>
        <input type="text" name="nama" id="nama" value="<?= $data['nama']?>" class="nama">
    <label for="">Tanggal</label>
        <input type="date" name="tanggal" id="date" value="<?= $data['tanggal']?>" class="tanggal">
    <div>
        <label for="">Alamat</label>
        <input type="text" name="alamat" id="alamat" value="<?= $data['alamat']?>" class="asal">
    </div>
</div>
    <div class="judul">
        <input type="text" name="judul" id="jp" value="<?= $data['judul']?>">
    </div>
    <div>
        <textarea type="text" name="laporan" class="am" id="am" value="<?= $data['laporan']?>" class="am"></textarea>
    </div>
    <div class="buttonS">
   <button type="submit" name="btn">Submit</button>
   </div>
</div>
</div>
</div>
</div>
</form>

</body>
</html>