<?php
include("header.php");
?>
<body>
<div class="p-4 main-content">
    <a href="transaksi.php" class="btn btn-md btn-primary float-end">Tambah Transaksi+</a>
    <div class="card mt-5">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nama Pemesan</th>
                        <th>No Meja</th>
                        <th>Menu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include("koneksi/koneksi.php");
                        $sql = $koneksi->query("SELECT * FROM penjualan ORDER BY PenjualanID DESC LIMIT 1");
                        while ($data= $sql->fetch_assoc()) {
                    ?>        
                    <tr>
                        <td><?php echo $data['PenjualanID']?></td>
                        <td><?php echo $data['TanggalPenjualan']?></td>
                        <td>
                        <?php
                                $sql2 = $koneksi->query("SELECT * FROM pelanggan WHERE PelangganID = '".$data['PenjualanID']."'");
                                while ($data2= $sql2->fetch_assoc()) {
                                    echo $data2['NamaPelanggan'];
                        ?>
                        </td>

                        <td>
                            <?php
                            echo $data2['NoMeja'];
                            ?>
                        </td>
                            <?php
                                }
                            ?>
                        
                        <td>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Produk</th>
                                        <th class="col-1">Jumlah</th>
                                        <th class="col-1">Harga</th>
                                        <th class="col-1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql3 = $koneksi->query("SELECT * FROM detailpenjualan WHERE DetailID = '" . $data['PenjualanID'] . "'");                            
                                        $totalharga = 0;
                                        while ($data3= $sql3->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php
                                                $sql4 = $koneksi->query("SELECT * FROM produk WHERE ProdukID = '" . $data3['ProdukID'] . "' ");
                                                while ($data4= $sql4->fetch_assoc()) {
                                                    echo $data4['NamaProduk'];
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $data3['JumlahProduk']?> Pcs</td>
                                        <td>RP.<?php echo number_format($data3['Subtotal']) ?></td>
                                        <td><?php echo"<a href='hapus-menu.php?id=$data3[PenjualanID]' class='btn btn-sm btn-danger'>Hapus</a>" ?></td>
                                    </tr>
                                    <?php
                                        $totalproduk = $data3['JumlahProduk'] * $data3['Subtotal'];
                                        $totalharga += $totalproduk;
                                        }
                                    ?>
                                    <tr>
                                        <td colspan='2'><strong>Total Harga:</strong></td>
                                        <td colspan='2'><strong>RP.<?php echo number_format("$totalharga") ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
            <a href="cetak-transaksi.php" target="_blank" class="btn btn-md btn-primary float-end">Cetak Transaksi </a>
        </div>
    </div>
</div>
</body>