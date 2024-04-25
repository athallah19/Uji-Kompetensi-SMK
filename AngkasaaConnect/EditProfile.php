<?php
error_reporting(0);
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id ='" . $_SESSION['id'] . "'");
$d = mysqli_fetch_object($query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Menentukan karakter set dan pengaturan tampilan halaman -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Menghubungkan dengan Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&family=Oleo+Script:wght@700&display=swap"
        rel="stylesheet">

    <!-- Menghubungkan dengan Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Menambahkan favicon -->
    <link rel="icon" type="image/png" href="image/logoAngkasa.png">

    <!-- Menghubungkan dengan file CSS untuk styling -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/form.css">

    <!-- Judul Halaman -->
    <title>Halaman Profile</title>
</head>

<body>
    <!-- Global Navigation Bar (GNB) -->
    <nav id="navbar" class="navbar gnb flex-row">
        <div class="gnb-content flex-row">
            <div class="flex-row">
                <a href="dashboard.php" class="text-logo">AngkasaConnect</a>
            </div>
            <a class="flex-row" href="Profile.php"><img class="nav-account-img" src="image/profile/default.jpeg"></a>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="sidebar">
        <header class="sidebar-header">
            <a class="logo" href="index.html">
                <img class="logo-img" src="image/logoAngkasa.png" />
                <h1 class="text-logo">AngkasaConnect</h1>
            </a>
        </header>

        <nav>
            <button>
                <a href="dashboard.php"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                        viewBox="0 0 28 28">
                        <path fill="#2e2e2e"
                            d="M12.592 3.495a2.25 2.25 0 0 1 2.816 0l7.75 6.218A2.25 2.25 0 0 1 24 11.468v11.28a2.25 2.25 0 0 1-2.25 2.25h-3a2.25 2.25 0 0 1-2.25-2.25v-6a.75.75 0 0 0-.75-.75h-3.5a.75.75 0 0 0-.75.75v6a2.25 2.25 0 0 1-2.25 2.25h-3A2.25 2.25 0 0 1 4 22.749v-11.28c0-.682.31-1.328.842-1.755zm1.877 1.17a.75.75 0 0 0-.938 0l-7.75 6.218a.75.75 0 0 0-.281.585v11.28c0 .415.336.75.75.75h3a.75.75 0 0 0 .75-.75v-6a2.25 2.25 0 0 1 2.25-2.25h3.5a2.25 2.25 0 0 1 2.25 2.25v6c0 .415.336.75.75.75h3a.75.75 0 0 0 .75-.75v-11.28a.75.75 0 0 0-.28-.585z" />
                    </svg>
                    <span>Home</span>
                </a>
            </button>
            <button><a href="search-login.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 512 512">
                        <path fill="none" stroke="#2e2e2e" stroke-miterlimit="10" stroke-width="32"
                            d="M221.09 64a157.09 157.09 0 1 0 157.09 157.09A157.1 157.1 0 0 0 221.09 64Z" />
                        <path fill="none" stroke="#2e2e2e" stroke-linecap="round" stroke-miterlimit="10"
                            stroke-width="32" d="M338.29 338.29L448 448" />
                    </svg><span>Cari</span></a>
            </button>
            <button>
                <a href="TambahPostingan.php"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                        viewBox="0 0 14 14">
                        <path fill="none" stroke="#2e2e2e" stroke-linecap="round" stroke-linejoin="round"
                            d="M7 4v6M4 7h6m.5-6.5h-7a3 3 0 0 0-3 3v7a3 3 0 0 0 3 3h7a3 3 0 0 0 3-3v-7a3 3 0 0 0-3-3" />
                    </svg>
                    <span>Buat</span>
                </a>
            </button>
            <button>
                <a href="Profile.php">
                    <img class="account-img-sidebar" src="image/profile/default.jpeg" alt="">
                    <span style="font-weight: bold;">My Profile</span>
                </a>
            </button>
            <button>
                <a href="logout.php" onclick="return confirm('Yakin Ingin Loggout ?')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                        <path fill="#2e2e2e"
                            d="M5 5h6c.55 0 1-.45 1-1s-.45-1-1-1H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h6c.55 0 1-.45 1-1s-.45-1-1-1H5z" />
                        <path fill="#2e2e2e"
                            d="m20.65 11.65l-2.79-2.79a.501.501 0 0 0-.86.35V11h-7c-.55 0-1 .45-1 1s.45 1 1 1h7v1.79c0 .45.54.67.85.35l2.79-2.79c.2-.19.2-.51.01-.7" />
                    </svg>
                    <span>Loggout</span>
                </a>
            </button>
            <!-- <p class="Copyright">Copyright © 2023
                <a style="font-size: 12px;" href="https://www.instagram.com/athallah_019/" target="_blank">
                    athallah_019
                </a><br>
                All Rights Reserved.
            </p> -->
        </nav>
    </aside>

    <!-- Konten Utama -->
    <main class="main">
        <!-- Galeri -->
        <div class="feed">
            <form class="form-box" action="" method="POST" enctype="multipart/form-data">

                <label style="font-weight: 600; margin-bottom: 8px;" for="nama">Nama Lengkap:</label>
                <div class=" input-wrap flex-row">
                    <svg style="padding-right: 10px;" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                        viewBox="0 0 32 32">
                        <path fill="#2e2e2e"
                            d="M12 4a5 5 0 1 1-5 5a5 5 0 0 1 5-5m0-2a7 7 0 1 0 7 7a7 7 0 0 0-7-7m10 28h-2v-5a5 5 0 0 0-5-5H9a5 5 0 0 0-5 5v5H2v-5a7 7 0 0 1 7-7h6a7 7 0 0 1 7 7zm0-26h10v2H22zm0 5h10v2H22zm0 5h7v2h-7z" />
                    </svg>
                    <input id="nama" style="padding: 12px 16px 12px 0px;" type="text" name="nama"
                        placeholder="Nama Lengkap (Wajib)" class="control" value="<?php echo $d->admin_name ?>"
                        required>
                </div>

                <label style="font-weight: 600; margin: 20px 0px 10px 0px;" for="user">Username:</label>
                <div class="input-wrap flex-row">
                    <svg style="padding-right: 10px;" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                        viewBox="0 0 24 24">
                        <g fill="none" stroke="#2e2e2e" stroke-width="1.5">
                            <circle cx="12" cy="6" r="4" />
                            <path d="M20 17.5c0 2.485 0 4.5-8 4.5s-8-2.015-8-4.5S7.582 13 12 13s8 2.015 8 4.5Z" />
                        </g>
                    </svg>
                    <input id="user" style="padding: 12px 16px 12px 0px;" type="text" name="user"
                        placeholder="Username (Wajib)" class="control" value="<?php echo $d->username ?>" required>
                </div>

                <label style="font-weight: 600; margin: 20px 0px 10px 0px;" for="hp">No telepon:</label>
                <div class="input-wrap flex-row">
                    <svg style=" padding-right: 10px;" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                        viewBox="0 0 32 32">
                        <g fill="none" stroke="#2e2e2e" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path
                                d="M3 12c0-7 7-7 13-7s13 0 13 7c0 8-7-1-7-1H10s-7 9-7 1m8 2s-5 5-5 14h20c0-9-5-14-5-14z" />
                            <circle cx="16" cy="21" r="4" />
                        </g>
                    </svg>
                    <input maxlength="13" id="hp" style="padding: 12px 16px 12px 0px;" type="number" name="hp"
                        placeholder="No telepon (Opsional)" class="control" value="<?php echo $d->admin_telp ?>">
                </div>

                <label style="font-weight: 600; margin: 20px 0px 10px 0px;" for="notelp">E-mail</label>
                <div class="input-wrap flex-row">
                    <svg style=" padding-right: 10px;" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                        viewBox="0 0 32 32">
                        <path fill="#2e2e2e"
                            d="M28 6H4a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h24a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2m-2.2 2L16 14.78L6.2 8ZM4 24V8.91l11.43 7.91a1 1 0 0 0 1.14 0L28 8.91V24Z" />
                    </svg>
                    <input id="notelp" style="padding: 12px 16px 12px 0px;" type="email" name="email"
                        placeholder="E-mail (Opsional)" class="control" value="<?php echo $d->admin_email ?>">
                </div>

                <label style="font-weight: 600; margin: 20px 0px 10px 0px;" for="bio">Biografi:</label>
                <div class="input-wrap flex-row">
                    <svg style="margin-bottom: auto; margin-top: 10px; padding-right: 10px;"
                        xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 56 56">
                        <path fill="#2e2e2e"
                            d="M25.2 25.176c2.976 0 5.46-1.992 5.46-5.156c0-3-2.039-4.97-4.828-4.97c-1.43 0-2.531.563-3.21 1.641c.726-3.328 3.233-5.53 6.632-5.671c.914-.047 1.57-.68 1.57-1.57c0-1.079-.867-1.641-2.039-1.641c-5.273 0-9.96 4.5-9.96 10.43c0 4.218 2.812 6.937 6.374 6.937m-14.345 0c2.977 0 5.461-1.992 5.461-5.156c0-3-2.062-4.97-4.851-4.97c-1.406 0-2.531.563-3.211 1.641c.726-3.328 3.258-5.507 6.656-5.671c.89-.047 1.57-.68 1.57-1.57c0-1.079-.89-1.641-2.062-1.641c-5.273 0-9.961 4.5-9.961 10.43c0 4.218 2.836 6.937 6.398 6.937M36.59 11.37h13.218c1.008 0 1.805-.773 1.805-1.781c0-.985-.797-1.758-1.804-1.758h-13.22a1.74 1.74 0 0 0-1.757 1.758c0 1.008.773 1.781 1.758 1.781m0 12.281h13.218c1.008 0 1.805-.773 1.805-1.78c0-.985-.797-1.759-1.804-1.759h-13.22a1.74 1.74 0 0 0-1.757 1.758c0 1.008.773 1.781 1.758 1.781M6.168 35.934h43.64a1.786 1.786 0 0 0 1.805-1.782c0-.984-.797-1.758-1.804-1.758H6.168c-1.008 0-1.781.774-1.781 1.758c0 .985.773 1.782 1.78 1.782m0 12.257h43.64c1.008 0 1.805-.773 1.805-1.757c0-.985-.797-1.782-1.804-1.782H6.168a1.766 1.766 0 0 0-1.781 1.782c0 .984.773 1.757 1.78 1.757" />
                    </svg>
                    <textarea id="bio" class="textarea-control" name="bio"
                        placeholder="Bio (Opsional)"><?php echo $d->admin_bio ?></textarea>
                </div>

                <label style="font-weight: 600; margin: 20px 0px 10px 0px;" for="almt">Alamat:</label>
                <div class="input-wrap flex-row">
                    <svg style=" margin-bottom: auto; margin-top: 10px; padding-right: 10px;"
                        xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 20 20">
                        <path fill="#2e2e2e"
                            d="m19.799 5.165l-2.375-1.83a1.997 1.997 0 0 0-.521-.237A2.035 2.035 0 0 0 16.336 3H9.5l.801 5h6.035c.164 0 .369-.037.566-.098s.387-.145.521-.236l2.375-1.832c.135-.091.202-.212.202-.334s-.067-.243-.201-.335M8.5 1h-1a.5.5 0 0 0-.5.5V5H3.664c-.166 0-.37.037-.567.099c-.198.06-.387.143-.521.236L.201 7.165C.066 7.256 0 7.378 0 7.5c0 .121.066.242.201.335l2.375 1.832c.134.091.323.175.521.235c.197.061.401.098.567.098H7v8.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-17a.5.5 0 0 0-.5-.5" />
                    </svg>
                    <textarea id="almt" class="textarea-control" name="alamat"
                        placeholder="Alamat (Opsional)"><?php echo $d->admin_address ?></textarea>
                </div>


                <div class="form-actions flex-row">
                    <button class="reset" type="button" onclick="clearForm()">
                        Clear
                    </button>
                    <button type="submit" name="submit">
                        Simpan!
                    </button>
                </div>
            </form>
            <?php
            if (isset($_POST['submit'])) {

                $nama = $_POST['nama'];
                $user = $_POST['user'];
                $hp = $_POST['hp'];
                $email = $_POST['email'];
                $bio = $_POST['bio'];
                $alamat = $_POST['alamat'];

                $update = mysqli_query($conn, "UPDATE tb_admin SET 
					                  admin_name = '" . $nama . "',
									  username = '" . $user . "',
									  admin_telp = '" . $hp . "',
									  admin_email = '" . $email . "',
									  admin_bio = '" . $bio . "',
									  admin_address = '" . $alamat . "'
									  WHERE admin_id = '" . $d->admin_id . "'");
                if ($update) {
                    echo '<script>alert("Ubah data berhasil")</script>';
                    echo '<script>window.location="profile.php"</script>';
                } else {
                    echo 'gagal ' . mysqli_error($conn);
                }

            }
            ?>

            <h3 style="margin-top: 50px;">Ubah password</h3>

            <form class="form-box" action="" method="POST">
                <label style="font-weight: 600; margin: 20px 0px 10px 0px;" for="pass">Password:</label>
                <div class="input-wrap flex-row">
                    <svg style=" padding-right: 10px;" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                        viewBox="0 0 32 32">
                        <path fill="none" stroke="#2e2e2e" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M16 24v-4m5-5V8a5 5 0 0 0-10 0v7M6 27V17a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2" />
                    </svg>
                    <input id="pass" style="padding: 12px 16px 12px 0px;" type="password" name="pass1"
                        placeholder="Password baru" class="control" required>
                </div>
                <label style="font-weight: 600; margin: 20px 0px 10px 0px;" for="pass">Password:</label>
                <div class="input-wrap flex-row">
                    <svg style=" padding-right: 10px;" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                        viewBox="0 0 32 32">
                        <path fill="none" stroke="#2e2e2e" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M16 24v-4m5-5V8a5 5 0 0 0-10 0v7M6 27V17a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2" />
                    </svg>
                    <input id="pass" style="padding: 12px 16px 12px 0px;" type="password" name="pass2"
                        placeholder="Konfirmasi Password Baru" class="control" required>
                </div>

                <div class="form-actions flex-row">
                    <button type="submit" name="ubah_password">
                        Ubah password!
                    </button>
                </div>
            </form>
            <?php
            if (isset($_POST['ubah_password'])) {

                $pass1 = md5($_POST['pass1']);
                $pass2 = md5($_POST['pass2']);

                if ($pass2 != $pass1) {
                    echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
                } else {
                    $u_pass = mysqli_query($conn, "UPDATE tb_admin SET 
									  password = '" . $pass1 . "'
									  WHERE admin_id = '" . $d->admin_id . "'");
                    if ($u_pass) {
                        echo '<script>alert("Ubah data berhasil")</script>';
                        echo '<script>window.location="profile.php"</script>';
                    } else {
                        echo 'gagal ' . mysqli_error($conn);
                    }
                }

            }
            ?>

        </div>

    </main>

    <!-- Bottom Navigation Bar -->
    <nav class="nav-bottom flex-row">
        <div class="nav-bottom-content flex-row">
            <a href="dashboard.php"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                    <path fill="#2e2e2e"
                        d="M12.592 3.495a2.25 2.25 0 0 1 2.816 0l7.75 6.218A2.25 2.25 0 0 1 24 11.468v11.28a2.25 2.25 0 0 1-2.25 2.25h-3a2.25 2.25 0 0 1-2.25-2.25v-6a.75.75 0 0 0-.75-.75h-3.5a.75.75 0 0 0-.75.75v6a2.25 2.25 0 0 1-2.25 2.25h-3A2.25 2.25 0 0 1 4 22.749v-11.28c0-.682.31-1.328.842-1.755zm1.877 1.17a.75.75 0 0 0-.938 0l-7.75 6.218a.75.75 0 0 0-.281.585v11.28c0 .415.336.75.75.75h3a.75.75 0 0 0 .75-.75v-6a2.25 2.25 0 0 1 2.25-2.25h3.5a2.25 2.25 0 0 1 2.25 2.25v6c0 .415.336.75.75.75h3a.75.75 0 0 0 .75-.75v-11.28a.75.75 0 0 0-.28-.585z" />
                </svg></a>
            <a href="search-login.php"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                    viewBox="0 0 512 512">
                    <path fill="none" stroke="#2e2e2e" stroke-miterlimit="10" stroke-width="32"
                        d="M221.09 64a157.09 157.09 0 1 0 157.09 157.09A157.1 157.1 0 0 0 221.09 64Z" />
                    <path fill="none" stroke="#2e2e2e" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"
                        d="M338.29 338.29L448 448" />
                </svg>
            </a>
            <a href="TambahPostingan.php"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                    viewBox="0 0 14 14">
                    <path fill="none" stroke="#2e2e2e" stroke-linecap="round" stroke-linejoin="round"
                        d="M7 4v6M4 7h6m.5-6.5h-7a3 3 0 0 0-3 3v7a3 3 0 0 0 3 3h7a3 3 0 0 0 3-3v-7a3 3 0 0 0-3-3" />
                </svg></a>
            <a href="logout.php" onclick="return confirm('Yakin Ingin Loggout ?')">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                    <path fill="#2e2e2e"
                        d="M5 5h6c.55 0 1-.45 1-1s-.45-1-1-1H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h6c.55 0 1-.45 1-1s-.45-1-1-1H5z" />
                    <path fill="#2e2e2e"
                        d="m20.65 11.65l-2.79-2.79a.501.501 0 0 0-.86.35V11h-7c-.55 0-1 .45-1 1s.45 1 1 1h7v1.79c0 .45.54.67.85.35l2.79-2.79c.2-.19.2-.51.01-.7" />
                </svg>
            </a>
        </div>
    </nav>

    <!-- Script JavaScript -->
    <script src="js/scripts.js"></script>
    <script>
        document.getElementById('hp').addEventListener('input', function () {
            var input = this.value;
            if (input.length > 13) {
                this.value = input.slice(0, 13);
            }
        });

        function clearForm() {
            // Mengambil semua elemen input di dalam form
            var inputs = document.querySelectorAll('.form-box input, .form-box textarea, .form-box select');

            // Mengosongkan nilai dari setiap elemen input
            inputs.forEach(function (input) {
                input.value = '';
            });
        }
    </script>

</body>

</html>