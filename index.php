<?php
// Create database connection using config file
include_once("config.php");

$found = '';

$name = $_GET['pencarian_nama'] ?? null;

if ($name) {
    $query_mahasiswa = mysqli_query($mysqli, "SELECT * FROM mahasiswa WHERE nama = '$name'");
    $mahasiswa = mysqli_fetch_array($query_mahasiswa, MYSQLI_ASSOC);

    if ($mahasiswa['nama']) {
        $found = 'Data ditemukan';
    }
}

 
// Fetch all users data from database
$result = mysqli_query(
    $mysqli, "SELECT mahasiswa.*, dosen_wali.nama as nama_dosen_wali 
        FROM mahasiswa
        LEFT JOIN dosen_wali on dosen_wali.id = mahasiswa.id_dosen_wali
    "
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UTS PAGI</title>
</head>
<body>
    <a href="create.php">Tambah Data</a>
    <table border="1" cellpadding="5">
        <tr>
            <th>Nama</th>
            <th>Hobi</th>
            <th>Nama Dosen Wali</th>
            <th>Aksi</th>
        </tr>
        <?php  
            while($mahasiswa_row = mysqli_fetch_array($result)) {         
                echo "<tr>";
                echo "<td>".$mahasiswa_row['nama']."</td>";
                echo "<td>".$mahasiswa_row['hobi']."</td>";
                echo "<td>".$mahasiswa_row['nama_dosen_wali']."</td>";
                echo "<td>
                        <a href='edit.php?id=$mahasiswa_row[id]'>Ubah</a> | <a href='delete.php?id=$mahasiswa_row[id]'>Hapus</a>
                    </td>";        
                echo "</tr>";
            }
        ?>
    </table>

    <form action="search.php" style="margin-top:20px">
        <label for="">Cari:</label>
        <br>
        <input type="text" name="pencarian_nama">
        <button>Cari</button>
    </form>

    <h2 style="color: green"><?= $found ?></h2>
</body>
</html>