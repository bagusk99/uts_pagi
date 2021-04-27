<?php
    include_once("config.php");

    $id = $_GET['id'];

    $query_mahasiswa = mysqli_query($mysqli, "SELECT * FROM mahasiswa WHERE id = $id");
    $mahasiswa = mysqli_fetch_array($query_mahasiswa, MYSQLI_ASSOC);

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
    <form action="update.php?id=<?php echo $id ?>" method="post">
        <label for="">Nama</label>
        <input type="text" name="inputan_nama" value="<?php echo $mahasiswa['nama'] ?>">
        <br>
        <br>
        <label for="">Hobi</label>
        <input type="text" name="inputan_hobi" value="<?php echo $mahasiswa['hobi'] ?>">
        <br>
        <br>
        <label for="">Dosen Wali</label>
        <select name="inputan_dosen_wali" id="">
        <?php  
            while($dosen_wali_row = mysqli_fetch_array($dosen_wali)) {         
                $selected = '';
                if ($dosen_wali_row['id'] == $mahasiswa['id_dosen_wali']) {
                    $selected = 'selected';
                }
                echo "<option value='{$dosen_wali_row['id']}' {$selected}>{$dosen_wali_row['nama']}</option>";
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