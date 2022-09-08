<?php
    require_once('templates/header.php');

    include('functions.php');

    if (!isset($_SESSION["login"])) {
        header("Location: data.php");
        exit;
    }

    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM anggota");
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

?>
    <div class="w-100 padding-x-45 padding-top-50">
        <h1 class="text-center margin-bottom-20">Daftar Anggota</h1>
        <table class="table table-primary table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nis</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Angkatan</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($rows as $row) : ?>
                <tr>
                    <th scope="row"><?= $i ?></th>
                    <td><?= $row["nis_anggota"] ?></td>
                    <td><?= $row["nama_anggota"] ?></td>
                    <td><?= $row["angkatan_anggota"] ?></td>
                    <td><?= $row["jabatan_anggota"] ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id_anggota"]; ?>" class="text-warning font-15"><i class="bi bi-pencil-square"></i></a><span class="mx-3">|</span>
                        <a href="hapus.php?id=<?= $row["id_anggota"]; ?>" class="text-danger font-15 " onclick="return confirm('yakin?');"><i class="bi bi-trash3"></i></a>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php
    require_once('templates/footer.php')
?>