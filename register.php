<?php
    require 'functions.php';
    require_once('templates/header.php');

    function tambahadmin($data){
        global $conn;
        
        // ambil data dari tiap element form
        $username = htmlspecialchars($data["username"]);
        $password = password_hash(htmlspecialchars($data["password"]), PASSWORD_DEFAULT);
        $passwordconf = password_hash(htmlspecialchars($data["passwordconfirm"]), PASSWORD_DEFAULT);

        // query insert data
        $query = "INSERT INTO admin
                    VALUES
                ('', '$username', '$password')
                ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
    
    if (isset($_SESSION["login"])) {
        header("Location: index.php");
        exit;
    }

    if (isset($_POST["register"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $passwordconf = $_POST["passwordconfirm"];

        $results = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

        if (mysqli_num_rows($results) === 1) {
            echo "
                <script>
                    alert('Username Sudah Ada');
                </script>
            ";
        } else {
            if ($password == $passwordconf) {
                if (tambahadmin($_POST) > 0) {
                    echo "
                        <script>
                            alert('Data Berhasil Ditambahkan!');
                            document.location.href = 'login.php';
                        </script>
                    ";
                } else {
                    echo "
                    <script>
                        alert('Data Gagal Ditambahkan!');
                    </script>";
                }
            } else {
                echo "
                <script>
                    alert('Password Tidak Terkonfirmasi');
                </script>";
            }
        }
    }
?>
    <div class="w-100 padding-x-45 padding-top-50">
        <h1 class="text-center">Register</h1>
        <div class="width-40 mx-auto shadow-md p-5 rounded-4">
            <form action="" method="POST">
                <div class="form-floating rounded-1 mb-3">
                    <input type="text" class="form-control
                    <?php if (isset($logerror)) { echo "is-invalid"; }?>" id="username" name="username" placeholder="name@example.com">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating rounded-1 mb-3">
                    <input type="password" class="form-control
                    <?php if (isset($logerror)) { echo "is-invalid"; }?>" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
                    <div id="password" class="invalid-feedback">
                        Username atau Password anda salah!
                    </div>
                </div>
                <div class="form-floating rounded-1 mb-3">
                    <input type="password" class="form-control
                    <?php if (isset($logerror)) { echo "is-invalid"; }?>" id="passwordconfirm" name="passwordconfirm" placeholder="Konfirmasi Password">
                    <label for="passwordconfirm">Konfirmasi Password</label>
                    <div id="passwordconfirm" class="invalid-feedback">
                        Username atau Password anda salah!
                    </div>
                </div>
                <p class="mb-0 d-inline font-075">Sudah Punya Akun?  </p><a href="Login.php" class="mb-0 text-primary font-075 ">Masuk Sekarang</a>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" name="register" class="btn btn-primary rounded-pill px-4">Login</button>
                </div>
            </form>
        </div>
    </div>
<?php
    require_once('templates/footer.php')
?>