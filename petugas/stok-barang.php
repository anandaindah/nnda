<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
         <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Barang</h4>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <a href="?page=tambah-produk" class="btn btn-sm btn-primary">Tambah Produk</a>
                    </div>
                    <div class="form-group col-sm-6">
                        <form action="" method="post">
                            <input type="text" name="search" class="form-control" placeholder="search">
                        </form>
                    </div>
                </div>
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Terjual</th>
                                    <th>Pilihan</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (isset($_POST['search'])) {
                                    $nama = $_POST['search'];
                                    $no = 1;
                                    $sql = $koneksi->query("SELECT * FROM produk WHERE NamaProduk LIKE '%$nama%'");
                                    while ($data= $sql->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo "<img src='../foto/".$data['Foto']."'width='70' height='70'>"; ?></td>
                                    <td><?php echo $data['NamaProduk']?></td>
                                    <td>Rp. <?php echo number_format($data['Harga']); ?></td>
                                    <td><?php echo $data['Stok']?></td>
                                    <td><?php echo $data['Terjual']?></td>
                                    <td align="center" width="12%"><a href="?page=edit-produk&ProdukID=<?= $data['ProdukID']; ?>" class="badge badge-primary p-2" title="Edit"><i class="">Edit</i></a> | <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Nya!!!')" href="?page=hapus-produk&ProdukID=<?= $data['ProdukID']; ?>" class="badge badge-danger p-2 delete-data" title='Delete'><i class="">Hapus</i></a></td>
                                </tr>
                                <?php } 
                                } else {
                                    $no = 1;
                                    $sql = $koneksi->query("SELECT * FROM produk");
                                    while ($data= $sql->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo "<img src='../foto/".$data['Foto']."'width='70' height='70'>"; ?></td>
                                    <td><?php echo $data['NamaProduk']?></td>
                                    <td>Rp. <?php echo number_format($data['Harga']); ?></td>
                                    <td><?php echo $data['Stok']?></td>
                                    <td><?php echo $data['Terjual']?></td>
                                    <td align="center" width="12%"><a href="?page=edit-produk&ProdukID=<?= $data['ProdukID']; ?>" class="badge badge-primary p-2" title="Edit"><i class="">Edit</i></a> | <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Nya!!!')" href="?page=hapus-produk&ProdukID=<?= $data['ProdukID']; ?>" class="badge badge-danger p-2 delete-data" title='Delete'><i class="">Hapus</i></a></td>
                                </tr>
                                <?php }
                                }?>
                                
                                    
                                </tbody>
                            </table>
                        </div>
                <div>
            </div>
        </div>
    </div>
</div>
