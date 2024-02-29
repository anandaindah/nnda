<?php

include_once("../koneksi/koneksi.php");

$id = $_GET['ProdukID'];

$result = $koneksi->query("DELETE FROM produk WHERE ProdukID=$id");

header("Location: index.php?page=stok-barang");
?>