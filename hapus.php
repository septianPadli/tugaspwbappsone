<?php
    session_start();

    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    require 'functions.php';

    $id = $_GET["id"];
    $results1 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM anggota"));    
    mysqli_query($conn, "DELETE FROM anggota WHERE id_anggota = $id");
    $results2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM anggota"));    

    if ($results1 > $results2) {
        echo "
                <script>
                    alert('Data Berhasil Dihapus!');
                    document.location.href = 'data_anggota.php';
                </script>
            ";
    } else {
        echo "
        <script>
            alert('Data Gagal Dihapus!');
            document.location.href = 'data_anggota.php';
        </script>";
    }

    function hapus($id){
        global $conn;

        $namaHapusGambar = query("SELECT gambar FROM siswa WHERE id = $id")[0];
        $hapusGambar = implode($namaHapusGambar);
        $targetHapusGambar = 'img/' . $hapusGambar;
        
        if (file_exists($targetHapusGambar)) {
            unlink($targetHapusGambar);
        }

        mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");
        return mysqli_affected_rows($conn);
    }
?>