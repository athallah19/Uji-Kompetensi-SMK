<?php

error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT a.admin_telp, a.admin_email, a.admin_address FROM tb_admin a WHERE admin_id = 2");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_id = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($produk);

$komentar = mysqli_query($conn, "SELECT * FROM komentar_foto WHERE image_id = '" . $_GET['id'] . "' ");
$kom = mysqli_num_rows($komentar);
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
    <link rel="stylesheet" href="css/detailpostingan.css">

    <!-- Judul Halaman -->
    <title>Halaman Komentar</title>

    <style>
        .sidebar button:last-child {
            margin-top: 0px;
            margin-bottom: 54px;
        }
    </style>
</head>

<body>
    <!-- Global Navigation Bar (GNB) -->
    <nav class="gnb flex-row">
        <div class="gnb-content flex-row">
            <div class="flex-row">
                <!-- Logo dan Tautan Ke Halaman Utama -->
                <a href="index.php" class="text-logo">AngkasaConnect</a>
            </div>

        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="sidebar">
        <header class="sidebar-header">
            <a class="logo" href="index.php">
                <img class="logo-img" src="image/logoAngkasa.png" />
                <h1 class="text-logo">AngkasaConnect</h1>
            </a>
        </header>

        <nav>
            <button>
                <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                        <path fill="#2e2e2e"
                            d="M12.592 3.495a2.25 2.25 0 0 1 2.816 0l7.75 6.218A2.25 2.25 0 0 1 24 11.468v11.28a2.25 2.25 0 0 1-2.25 2.25h-3a2.25 2.25 0 0 1-2.25-2.25v-6a.75.75 0 0 0-.75-.75h-3.5a.75.75 0 0 0-.75.75v6a2.25 2.25 0 0 1-2.25 2.25h-3A2.25 2.25 0 0 1 4 22.749v-11.28c0-.682.31-1.328.842-1.755zm1.877 1.17a.75.75 0 0 0-.938 0l-7.75 6.218a.75.75 0 0 0-.281.585v11.28c0 .415.336.75.75.75h3a.75.75 0 0 0 .75-.75v-6a2.25 2.25 0 0 1 2.25-2.25h3.5a2.25 2.25 0 0 1 2.25 2.25v6c0 .415.336.75.75.75h3a.75.75 0 0 0 .75-.75v-11.28a.75.75 0 0 0-.28-.585z" />
                    </svg>
                    <span>Home</span>
                </a>
            </button>
            <button>
                <a href="search.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 512 512">
                        <path fill="none" stroke="#2e2e2e" stroke-miterlimit="10" stroke-width="32"
                            d="M221.09 64a157.09 157.09 0 1 0 157.09 157.09A157.1 157.1 0 0 0 221.09 64Z" />
                        <path fill="none" stroke="#2e2e2e" stroke-linecap="round" stroke-miterlimit="10"
                            stroke-width="32" d="M338.29 338.29L448 448" />
                    </svg><span>Cari</span>
                </a>
            </button>
            <button>
                <a href="login.php"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                        <path fill="none" stroke="#2e2e2e" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M9 3h8a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H9m6-9l-4-4m4 4l-4 4m4-4H5" />
                    </svg>
                    <span>Login</span>
                </a>
            </button>
            <button>
                <a href="registrasi.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                        <path fill="#2e2e2e"
                            d="M15 4a4 4 0 0 0-4 4a4 4 0 0 0 4 4a4 4 0 0 0 4-4a4 4 0 0 0-4-4m0 1.9a2.1 2.1 0 1 1 0 4.2A2.1 2.1 0 0 1 12.9 8A2.1 2.1 0 0 1 15 5.9M4 7v3H1v2h3v3h2v-3h3v-2H6V7zm11 6c-2.67 0-8 1.33-8 4v3h16v-3c0-2.67-5.33-4-8-4m0 1.9c2.97 0 6.1 1.46 6.1 2.1v1.1H8.9V17c0-.64 3.1-2.1 6.1-2.1" />
                    </svg>
                    <span>Register</span>
                </a>
            </button>
        </nav>
    </aside>

    <!-- Konten Utama -->
    <main class="main">
        <section class="feed">

            <div class="details-wrap flex-col">
                <div class="judul flex-col">
                    <span style="justify-content: flex-start;" class="title"><?php echo $p->image_name ?></span>
                </div>

                <div class="Publisher-detail flex-row">
                    <span><?php echo $p->admin_name ?></span> | <span><?php echo $p->category_name ?></span> |
                    <span class="time" data-created-at="<?php echo $p->date_created ?>"></span>

                </div>
                <img src="foto/<?php echo $p->image ?>">

                <p class="caption">
                    <?php echo $p->image_description ?>
                </p>
            </div>

            <div class="like" style="padding-top: 100px;" class="flex-row">
                <form class="flex-row" method="POST">
                    <?php
                    $like = mysqli_query($conn, "SELECT * FROM tb_like WHERE image_id = '" . $_GET['id'] . "' ");
                    $L = mysqli_num_rows($like);
                    $qt = mysqli_query($conn, "SELECT SUM(image_id) FROM tb_like WHERE image_id = '" . $_GET['id'] . "' ");
                    if (mysqli_num_rows($qt) > 0) {
                        while ($q = mysqli_fetch_array($qt)) {
                            ?>
                            <button
                                style="cursor: pointer; font-weight: 600; border: none; background-color: #f5f5f5; padding: 10px 26px; border-radius: 5px; margin-right: auto;"
                                name="suka" class="like2 flex-row">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 1024 1024">
                                    <path fill="#2e2e2e"
                                        d="M608.544 1023.744c-290.832 0-293.071-12.062-329.087-39.183c-19.104-14.368-55.151-24.32-186.815-32.896c-9.552-.624-18.64-4.288-24.735-11.68c-2.8-3.408-68.592-99.36-68.592-253.04c0-151.44 47.088-220.465 49.103-223.665a31.965 31.965 0 0 1 27.12-15.04c108.112 0 257.984-138 358.736-378.896C451.698 27.68 455.298.272 519.298.272c36.4 0 77.2 26.064 97.344 59.505c41.328 68.32 20.335 215.057.927 293.473c66-.528 185.472-1.425 242.32-1.425c79.072 0 131.407 47.152 132.991 116.08c.529 22.752-2.464 51.808-9.04 66.848c17.408 17.36 39.857 43.536 40.832 77.248c1.216 43.52-27.28 76.655-45.472 95.663c4.175 12.656 12.527 29.44 11.71 49.505c-2 49.344-40.095 81.136-63.823 97.727c1.968 13.504 3.504 38.976-.832 58.672c-17.12 78.609-132.4 110.177-317.712 110.177zM109.617 886.77c114.688 9.489 175.998 22.336 208.334 46.672c25.024 18.848 21.168 26.32 290.592 26.32c82.176 0 242.896-3.424 255.216-59.84c4.896-22.56-18.895-44.735-18.976-44.911c-6.496-16.032.737-34.849 16.577-41.777c.255-.128 64.143-23.007 65.6-58.72c.96-22.831-14.72-36.543-15.072-37.12c-9.328-14.463-5.92-34.303 8.224-44.16c.16-.128 41.551-25.215 40.543-59.423c-.784-27.168-36.576-46.289-37.664-46.928c-8-4.576-13.824-12.496-15.648-21.552c-1.792-9.04.224-18.528 5.84-25.872c0 0 16.272-25.856 15.68-50.112c-1.168-51.92-57.007-53.552-68.992-53.552c-80.72 0-288.03.816-288.03.816c-11.184.048-20.864-5.232-26.88-14.176c-6-8.945-6.448-20.048-2.928-30.224c31.263-90.032 48.72-231.28 19.727-279.536c-8.544-14.224-10.496-28.432-42.496-28.432c-4.432 0-14.991 3.504-25.999 29.744c-106.928 255.84-266.64 403.824-397.456 417.168c-11.28 25.728-32.496 79.04-32.496 175.775c0 98.737 31.28 175.12 46.305 199.84z" />
                                </svg><span style="margin-left: 8px"><?php echo $L ?> Likes</span>
                            </button>
                        <?php }
                    } else { ?>
                        <p>tidak ada like</p>
                    <?php } ?>
                </form>
                <?php
                if (isset($_POST['suka'])) {
                    echo '<script>alert("Login Terlebih Dahulu")</script>';
                    echo '<script>window.location="login.php"</script>';
                } ?>
            </div>

            <div class="wrap-komentarForm flex-col">
                <p>Komentar<span> (<?php echo $kom ?>)</span></p>
                <form class="tambah-comment flex-col" action="" method="POST">

                    <div class="input-wrap flex-col">
                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['a_global']->user_id ?>">
                        <textarea type="text" name="isi_komentar" placeholder="Tulis Komentar"
                            class="input-comment"></textarea>
                    </div>

                    <div class="aksi-comment flex-row">
                        <button type="submit" name="submit" value="Kirim" class="btn-send flex-row">
                            Kirim
                        </button>
                    </div>
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    echo '<script>alert("Login Terlebih Dahulu!")</script>';
                    echo '<script>window.location="login.php"</script>';
                }
                ?>

            </div>

            <div id="Komentarrr" class="comments-wrap">
                <?php
                $up = mysqli_query($conn, "SELECT * FROM komentar_foto WHERE image_id = '" . $_GET['id'] . "' ORDER BY tanggal_komentar DESC ");
                if (mysqli_num_rows($up) > 0) {
                    while ($u = mysqli_fetch_array($up)) {
                        ?>
                        <article class="comments flex-row">
                            <img src="image/profile/default.jpeg" style="margin: auto 0px auto 0px; border-radius: 100%;"
                                width="36px" height="36px">
                            <div class="user-profile flex-col">
                                <span><?php echo $u['admin_name'] ?> </span>
                                <span><?php echo $u['isi_komentar'] ?></span>
                            </div>
                            <span class="date-comments" data-created-at="<?php echo $u['tanggal_komentar'] ?>"></span>
                        </article>
                    <?php }
                } else { ?>
                    <p>Belum ada yang memberikan komentar</p>
                <?php } ?>
            </div>
        </section>
    </main>

    <!-- Bottom Navigation Bar -->
    <nav class="nav-bottom flex-row">
        <div class="nav-bottom-content flex-row">
            <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                    <path fill="#2e2e2e"
                        d="M12.592 3.495a2.25 2.25 0 0 1 2.816 0l7.75 6.218A2.25 2.25 0 0 1 24 11.468v11.28a2.25 2.25 0 0 1-2.25 2.25h-3a2.25 2.25 0 0 1-2.25-2.25v-6a.75.75 0 0 0-.75-.75h-3.5a.75.75 0 0 0-.75.75v6a2.25 2.25 0 0 1-2.25 2.25h-3A2.25 2.25 0 0 1 4 22.749v-11.28c0-.682.31-1.328.842-1.755zm1.877 1.17a.75.75 0 0 0-.938 0l-7.75 6.218a.75.75 0 0 0-.281.585v11.28c0 .415.336.75.75.75h3a.75.75 0 0 0 .75-.75v-6a2.25 2.25 0 0 1 2.25-2.25h3.5a2.25 2.25 0 0 1 2.25 2.25v6c0 .415.336.75.75.75h3a.75.75 0 0 0 .75-.75v-11.28a.75.75 0 0 0-.28-.585z" />
                </svg></a>
            <a href="search.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 512 512">
                    <path fill="none" stroke="#2e2e2e" stroke-miterlimit="10" stroke-width="32"
                        d="M221.09 64a157.09 157.09 0 1 0 157.09 157.09A157.1 157.1 0 0 0 221.09 64Z" />
                    <path fill="none" stroke="#2e2e2e" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"
                        d="M338.29 338.29L448 448" />
                </svg>
            </a>
            <a href="login.php"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                    <path fill="none" stroke="#2e2e2e" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 3h8a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H9m6-9l-4-4m4 4l-4 4m4-4H5" />
                </svg>
            </a>
            <a href="registrasi.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                    <path fill="#2e2e2e"
                        d="M15 4a4 4 0 0 0-4 4a4 4 0 0 0 4 4a4 4 0 0 0 4-4a4 4 0 0 0-4-4m0 1.9a2.1 2.1 0 1 1 0 4.2A2.1 2.1 0 0 1 12.9 8A2.1 2.1 0 0 1 15 5.9M4 7v3H1v2h3v3h2v-3h3v-2H6V7zm11 6c-2.67 0-8 1.33-8 4v3h16v-3c0-2.67-5.33-4-8-4m0 1.9c2.97 0 6.1 1.46 6.1 2.1v1.1H8.9V17c0-.64 3.1-2.1 6.1-2.1" />
                </svg>
            </a>
        </div>
    </nav>

    <!-- Script JavaScript -->
    <script src="js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Ambil semua elemen dengan class "time"
            $('.time').each(function () {
                // Ambil nilai atribut data-created-at (waktu posting dari PHP)
                var createdAt = $(this).attr('data-created-at');

                // Panggil fungsi update waktu setiap detik
                updateTimeAgo(this, createdAt);
                setInterval(updateTimeAgo, 1000, this, createdAt);
            });
        });

        $(document).ready(function () {
            $('.date-comments').each(function () {
                var createdAt = $(this).attr('data-created-at');
                updateTimeAgo(this, createdAt);
                setInterval(updateTimeAgo, 1000, this, createdAt);
            });
        });

        // Fungsi untuk mengupdate waktu
        function updateTimeAgo(element, createdAt) {
            var timestamp = new Date(createdAt).getTime();
            var now = new Date().getTime();
            var seconds = Math.floor((now - timestamp) / 1000);

            if (seconds < 60) {
                $(element).text('Baru saja');
            } else if (seconds < 3600) {
                var minutes = Math.floor(seconds / 60);
                $(element).text(minutes + ' menit yang lalu');
            } else if (seconds < 86400) {
                var hours = Math.floor(seconds / 3600);
                $(element).text(hours + ' jam yang lalu');
            } else if (seconds < 604800) {
                var days = Math.floor(seconds / 86400);
                $(element).text(days + ' hari yang lalu');
            } else {
                var date = new Date(timestamp);
                var formattedDate = formatDate(date);
                $(element).text(formattedDate);
            }
        }

        function formatDate(date) {
            var day = date.getDate();
            var monthIndex = date.getMonth();
            var year = date.getFullYear();
            var hours = date.getHours();
            var minutes = date.getMinutes();

            var monthNames = [
                "Januari", "Februari", "Maret",
                "April", "Mei", "Juni", "Juli",
                "Agustus", "September", "Oktober",
                "November", "Desember"
            ];

            var amPm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // handle midnight
            minutes = minutes < 10 ? '0' + minutes : minutes;

            return day + ' ' + monthNames[monthIndex] + ' ' + year + ', ' + hours + ':' + minutes + ' ' + amPm + ' WIB';
        }
    </script>
</body>

</html>