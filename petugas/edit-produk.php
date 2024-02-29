<?php
$id = $_GET['ProdukID'];
$sql = $koneksi->query("SELECT * FROM produk WHERE ProdukID = '$id'");
$data = $sql->fetch_assoc();

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $target = "../foto/";
    $time = date("dmYHis");
    $type = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
    $targetfile = $target . $time . '.' . $type;
    $filename = $time . '.' . $type;

    if ($_FILES['foto']['name'] !='') {
        move_uploaded_file($_FILES['foto']['tmp_name'], $targetfile);
        $fotlam = $data['Foto'];
        unlink("../foto/".$fotlam);
        $sql = $koneksi->query("UPDATE produk SET NamaProduk='$nama', Harga='$harga', Stok='$stok', Foto='$filename' WHERE ProdukID='$id'");
        echo "<script>alert('Berhasil mengubah data barang');window.location.href='?page=stok-barang';</script>";
    } else {
        $sql = $koneksi->query("UPDATE produk SET NamaProduk='$nama', Harga='$harga', Stok='$stok' WHERE ProdukID='$id'");
        echo "<script>alert('Berhasil mengubah data barang');window.location.href='?page=stok-barang';</script>";
    }
    
}
?>

    <div class="card well">
        <div class="container mt-5">
            <h2>Tambah Barang Baru</h2>
            <form action="" method="post" class="col-md-10" enctype="multipart/form-data">
            <div class="mb-3 mt-3">
                <label for="harga" class="form-label">Nama Barang<span style="color: red;">*</span></label>
                <input value="<?php echo $data['NamaProduk'] ?>" type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama" required>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="harga" class="form-label">Harga Barang<span style="color: red;">*</span></label>
                    <input value="<?php echo $data['Harga'] ?>" type="text" id="harga" name="harga" class="form-control" placeholder="Masukkan harga" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="stok" class="form-label">Stok Barang<span style="color: red;">*</span></label>
                    <input value="<?php echo $data['Stok'] ?>" type="text" id="stok" name="stok" class="form-control" placeholder="Masukkan stok" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Barang<span style="color: red;">*</span></label>
                <p><?php echo"<img src='../foto/".$data['Foto']."' width='70' height='70'></img>"; ?></p>
                <input type="file" id="foto" name="foto" class="form-control" placeholder="Masukkan foto">
                <p style="color: purple;">Hanya bisa menginput foto dengan ekstensi JPG, PNG, JPEG, SVG</p>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Edit barang</button>
            </form>
        </div>
    </div>