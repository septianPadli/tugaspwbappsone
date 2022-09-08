<?php
    require 'functions.php';
    require_once('templates/header.php');

    $id = $_GET["id"];

    global $conn;
    $result = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM anggota WHERE id_anggota = $id"));

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    if(isset($_POST['ubah'])) {	
        $id = $_POST['id_anggota'];
        
        $nis = htmlspecialchars($_POST['nis']);
        $nama = htmlspecialchars($_POST['nama']);
        $angkatan = htmlspecialchars($_POST["angkatan"]);
        $jabatan = htmlspecialchars($_POST["jabatan"]);
            
        // update user data
        $result = mysqli_query($conn, "UPDATE anggota SET nis_anggota='$nis',nama_anggota='$nama',angkatan_anggota='$angkatan', jabatan_anggota = '$jabatan' WHERE id_anggota=$id");
        
        // Redirect to homepage to display updated user in list
        header("Location: data_anggota.php");
    }
?>

    <div class="w-100 padding-x-45 padding-top-50">
        <h1 class="text-center">Tambah Data</h1>
        <div class="width-45 mx-auto shadow-md p-5 rounded-4">
            <form action="" method="POST">
                <input type="hidden" class="form-control" id="id_anggota" name="id_anggota" placeholder="id_anggota" value="<?= $result["id_anggota"] ?>">
                <div class="form-floating rounded-1 mb-3">
                    <input type="text" class="form-control" id="nis" name="nis" placeholder="nis" value="<?= $result["nis_anggota"] ?>">
                    <label for="nis">NIS</label>
                </div>
                <div class="form-floating rounded-1 mb-3">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="<?= $result["nama_anggota"] ?>">
                    <label for="nama">Nama</label>
                </div>
                <div class="form-floating rounded-1 mb-3">
                    <input type="text" class="form-control" id="angkatan" name="angkatan" placeholder="angkatan" value="<?= $result["angkatan_anggota"] ?>">
                    <label for="angkatan">Angkatan</label>
                </div>
                <div class="form-floating rounded-1 mb-3">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="jabatan" value="<?= $result["jabatan_anggota"] ?>">
                    <label for="jabatan">Jabatan</label>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" name="ubah" class="btn btn-primary rounded-pill px-4">Ubah Data</button>
                </div>
            </form>
        </div>
    </div>

<?php
    require_once('templates/footer.php');
?>