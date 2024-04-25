<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&family=Oleo+Script:wght@700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="image/logoAngkasa.png">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">

    <title>AngkasaConnect</title>
</head>

<body>
    <section class="login flex-row">
        <div class="left-img">
            <img src="image/Group 42.png" alt="">
        </div>
        <div class="right-form">
            <span class="text-logo flex-row">AngkasaConnect</span>

            <form method="POST" action="">
                <div style="margin-top: 0px;" class="input-box flex-row">
                    <input placeholder="Username" type="text" name="user" id="nis" required>
                </div>

                <div class="input-box flex-row">
                    <input style="width: 76%;" placeholder="Password" type="password" name="pass" id="password" required>
                    <span class="toggle-password" onclick="togglePassword()">
                        <i style="font-size: 18px; padding-right: 5px;" class="bi bi-eye" id="toggleIcon"></i>
                    </span>
                </div>

                <button type="submit" name="submit" value="Login">LOGIN</button>
            </form>

            <script>
                function togglePassword() {
                    var passwordField = document.getElementById("password");
                    var toggleIcon = document.getElementById("toggleIcon");

                    if (passwordField.type === "password") {
                        passwordField.type = "text";
                        toggleIcon.classList.remove("bi-eye");
                        toggleIcon.classList.add("bi-eye-slash");
                    } else {
                        passwordField.type = "password";
                        toggleIcon.classList.remove("bi-eye-slash");
                        toggleIcon.classList.add("bi-eye");
                    }
                }
            </script>
            <?php
            if (isset($_POST['submit'])) {
                session_start();
                include 'db.php';

                $user = mysqli_real_escape_string($conn, $_POST['user']);
                $pass = mysqli_real_escape_string($conn, md5($_POST['pass']));

                $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '" . $user . "'AND password = '" . $pass . "'");
                if (mysqli_num_rows($cek) > 0) {
                    $d = mysqli_fetch_object($cek);
                    $_SESSION['status_login'] = true;
                    $_SESSION['a_global'] = $d;
                    $_SESSION['id'] = $d->admin_id;
                    echo '<script>window.location="dashboard.php"</script>';
                } else {
                    echo '<script>alert("Username atau password anda salah")</script>';
                }
            }
            ?>


            <div class="or flex-row">
                <hr><span>Atau</span>
                <hr>
            </div>

            <div class="other flex-col">
                <a style="margin-bottom: 10px;" href="registrasi.php">Belum Punya akun?</a>
                <a href="javascript:window.history.go(-1);">Kembali</a>
            </div>
        </div>
    </section>
</body>

</html>