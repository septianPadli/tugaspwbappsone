<?php
    require 'functions.php';
    require_once('templates/header.php');

    function tambah($data){
        global $conn;
        
        // ambil data dari tiap element form
        $nis = htmlspecialchars($data["nis"]);
        $nama = htmlspecialchars($data["nama"]);
        $angkatan = htmlspecialchars($data["angkatan"]);
        $jabatan = htmlspecialchars($data["jabatan"]);

        // query insert data
        $query = "INSERT INTO anggota
                    VALUES
                ('', '$nis', '$nama', '$angkatan', '$jabatan')
                ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    if (isset($_POST['submit'])) {

        // cek berhasil atau tidak
        if (tambah($_POST) > 0) {
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href = 'data_anggota.php';
                </script>
            ";
        } else {
            echo "
            <script>
                alert('Data Gagal Ditambahkan!');
            </script>";
        }
    }
?>

    <div class="w-100 padding-x-45 padding-top-50">
        <h1 class="text-center">Tambah Data</h1>
        <div class="width-45 mx-auto shadow-md p-5 rounded-4">
            <form action="" method="POST">
                <div class="form-floating rounded-1 mb-3">
                    <input type="text" class="form-control" id="nis" name="nis" placeholder="nis">
                    <label for="nis">NIS</label>
                </div>
                <div class="form-floating rounded-1 mb-3">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
                    <label for="nama">Nama</label>
                </div>
                <div class="form-floating rounded-1 mb-3">
                    <input type="text" class="form-control" id="angkatan" name="angkatan" placeholder="angkatan">
                    <label for="angkatan">Angkatan</label>
                </div>
                <div class="form-floating rounded-1 mb-3">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="jabatan">
                    <label for="jabatan">Jabatan</label>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" name="submit" class="btn btn-primary rounded-pill px-4">Tambah Data</button>
                </div>
            </form>
        </div>
    </div>

<?php
    require_once('templates/footer.php');
?>