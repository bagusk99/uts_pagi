<?php
    include_once("config.php");

    $dosen_wali = mysqli_query($mysqli, "SELECT * FROM dosen_wali");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penambahan data</title>
</head>
<body>
    <h1>Form Penambahan data</h1>
    <form action="store.php" method="post">
        <label for="">Nama</label>
        <input type="text" name="inputan_nama">
        <br>
        <br>
        <label for="">Hobi</label>
        <input type="text" name="inputan_hobi">
        <br>
        <br>
        <label for="">Dosen Wali</label>
        <select name="inputan_dosen_wali" id="">
        <?php  
            while($dosen_wali_row = mysqli_fetch_array($dosen_wali)) {         
                echo "<option value='{$dosen_wali_row['id']}'>{$dosen_wali_row['nama']}</option>";
            }
        ?>
        </select>
        <br>
        <br>
        <button>Simpan</button>
        <a href="index.php">Kembali</a>
    </form>
</body>
</html>