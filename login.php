<?php
    require 'functions.php';
    require_once('templates/header.php');

    if (isset($_SESSION["login"])) {
        header("Location: index.php");
        exit;
    }

    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $results = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

        if (mysqli_num_rows($results) === 1) {
            $result = mysqli_fetch_assoc($results);
            $pw = $result['password'];
            if (password_verify($password, $pw)) {
                $_SESSION["login"] = true;

                header("Location: index.php");
                exit;
            } else {
                $logerror = true;
            }
        } else {
            $logerror = true;
        }
    }
?>
    <div class="w-100 padding-x-45 padding-top-50">
        <h1 class="text-center">Login</h1>
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
                <p class="mb-0 d-inline font-075">Belum Punya Akun?  </p><a href="register.php" class="mb-0 text-primary font-075 ">Daftar Sekarang</a>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" name="login" class="btn btn-primary rounded-pill px-4">Login</button>
                </div>
            </form>
        </div>
    </div>
<?php
    require_once('templates/footer.php')
?>