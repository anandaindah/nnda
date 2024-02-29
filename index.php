<?php
include("koneksi/koneksi.php");
include("header.php");
?>
<body>
    <div class="main-content">
        <div class="card-container">
            <?php
                $sql = $koneksi->query("SELECT * FROM produk");
                while ($data= $sql->fetch_assoc()) {
            ?>
            <div class="card" style='width :18rem; margin: 10px;'>
                <?php echo "<img class='card-img-top' src='foto/" . $data['Foto'] . "' width='230' height='150'>"?>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $data['NamaProduk']?></h5>
                    <p class="card-text">Harga: RP.<?php echo number_format($data['Harga']) ?></p>
                    <p class="card-text">Stok: <?php echo $data['Stok']?></p>
                    <a href="transaksi.php" class="btn btn-md btn-primary float-end">Buy

                    
                    </a>
                </div>
        </div>
        <?php } ?>
        </div>
    </div>
</body>