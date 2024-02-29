<div class="row">
    <div class="col-md-8">
        <div class="card well">
            <div class="card-header">
                <h3 class="">Tambah User</h3>
            </div>
            <div class="card-body">
	                <form action="" method="POST">
	                    <div class="mb-3 mt-3">
	                        <label for="nama" class="form-label">Nama:</label>
	                        <input type="text" class="form-control" id="nama" placeholder="Enter Name" name="Username">
	                    </div>
	                    <div class="mb-3">
	                        <label for="pwd" class="form-label">Password:</label>
	                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="Password">
	                    </div>
	                    <div class="mb-3">
	                        <label for="level" class="form-label">Level:</label>
	                        <select class="form-control" name="Level" id="level">
	                            <option value="">Pilih Level</option>
	                            <option value="admin">Admin</option>
	                            <option value="petugas">Petugas</option>
	                        </select>
	                    </div>
	                    <p></p>
	                    <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
	                </form>
	        </div>
	    </div>
	</div>
</div>
	
<?php
    include_once("../koneksi/koneksi.php");
    if(isset($_POST['submit'])) {
        $name = $_POST['Username'];
        $level = $_POST['Level'];
        $password = md5($_POST['Password']);

        $result = $koneksi->query("INSERT INTO user (Username, Password, Level) VALUES('$name','$password','$level')");
	
        echo "User added successfully. <a href='index.php?page=user'>View Users</a>";
        echo"<script>alert('Berhasil Menambahkan Data')</script>";
    }
	
?>