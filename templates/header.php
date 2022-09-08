<?php
    include('functions.php');
    session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="http://localhost:8080/tugaspwb/tugasapps/assets/logo osis.png">
    <title>OSIS Neskar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/library/icaruslib-xl.css">
    <link rel="stylesheet" href="css/library/icaruslib-lg.css">
    <link rel="stylesheet" href="css/library/icaruslib-md.css">
    <link rel="stylesheet" href="css/library/icaruslib-sm.css">
    <link rel="stylesheet" href="css/library/icaruslib-xs.css">
    <link rel="stylesheet" href="css/library/icaruslib.css">
    <link rel="stylesheet" href="css/home.css">
</head>

<body>
    <nav class="navbar navbar-dark bg-primary navbar-expand-lg">
        <div class="container-md">
            <a class="navbar-brand" href="/tugaspwb/tugasapps/" class="">
                <img src="assets/logo osis.png" alt="" class="d-inline-block align-text-top height-5 align-bottom"> <span class="ms-3">OSIS Neskar</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-5 me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link white" aria-current="page" href="/tugaspwb/tugasapps/">Home</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link white" aria-current="page" href="/tugaspwb/tugasapps/anggota.php">Anggota</a>
                    </li>
                    <?php if (isset($_SESSION["login"])) : ?>
                        <li class="nav-item">
                            <a class="nav-link white" aria-current="page" href="/tugaspwb/tugasapps/tambah.php">Tambah Data</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <?php if (!isset($_SESSION["login"])) : ?>
                    <a href="/tugaspwb/tugasapps/login.php" class="btn btn-light text-primary rounded-pill px-4">
                        Login
                    </a>
                <?php endif; ?>
                <?php if (isset($_SESSION["login"])) : ?>
                    <a href="/tugaspwb/tugasapps/logout.php" class="btn btn-light text-primary rounded-pill px-4">
                            Logout
                    </a>
                <?php endif; ?>
                
            </div>
        </div>
    </nav>