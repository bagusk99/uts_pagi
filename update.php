<?php

include_once("config.php");

$id = $_GET['id'];

$nama = $_POST['inputan_nama'];
$hobi = $_POST['inputan_hobi'];
$id_dosen_wali = $_POST['inputan_dosen_wali'];

mysqli_query($mysqli, "UPDATE mahasiswa SET nama='$nama',hobi='$hobi',id_dosen_wali='$id_dosen_wali' WHERE id=$id");

header('Location: index.php');