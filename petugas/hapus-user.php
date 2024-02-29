<?php

include_once("../koneksi/koneksi.php");

$id = $_GET['UserID'];

$result = $koneksi->query("DELETE FROM user WHERE UserID=$id");

header("Location: index.php?page=user");
?>