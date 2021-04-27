<?php

include_once("config.php");

$nama = $_POST['inputan_nama'];
$hobi = $_POST['inputan_hobi'];
$id_dosen_wali = $_POST['inputan_dosen_wali'];

mysqli_query($mysqli, "INSERT INTO mahasiswa (nama,hobi,id_dosen_wali) VALUES('$nama','$hobi', $id_dosen_wali)");

header('Location: index.php');