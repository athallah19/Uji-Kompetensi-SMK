<?php
error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
$a = mysqli_fetch_object($kontak);
?>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="image/logoAngkasa.png">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/form.css">

    <title>AngkasaConnect</title>

    <style>
        .sidebar button:last-child {
            margin-top: 0px;
            margin-bottom: 54px;
        }
    </style>

</head>

<body>
    <!-- Global Navigation Bar (GNB) -->
    <nav id="navbar" class="navbar gnb flex-row">
        <div class="gnb-content flex-row">
            <div class="flex-row">
                <a href="index.html" class="text-logo">AngkasaConnect</a>
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
                        <path fill="#2e2e2e"
                            d="M456.69 421.39L362.6 327.3a173.81 173.81 0 0 0 34.84-104.58C397.44 126.38 319.06 48 222.72 48S48 126.38 48 222.72s78.38 174.72 174.72 174.72A173.81 173.81 0 0 0 327.3 362.6l94.09 94.09a25 25 0 0 0 35.3-35.3M97.92 222.72a124.8 124.8 0 1 1 124.8 124.8a124.95 124.95 0 0 1-124.8-124.8" />
                    </svg><span style="font-weight: bold;">Cari</span>
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
        <!-- Galeri -->

        <div class="feed">
            <form class="container" action="search.php">
                <h3>Cari postingan</h3>
                <div class="input-wrap-search flex-row">
                    <input class="control-search" type="text" name="search" placeholder="Masukkan judul postingan"
                        required />
                </div>
                <button class="flex-row" type="submit" name="cari">Cari</button>
            </form>

            <?php
            if ($_GET['search'] != '' || $_GET['kat'] != '') {
                $where = "AND image_name LIKE '%" . $_GET['search'] . "%' AND category_id LIKE '%" . $_GET['kat'] . "%' ";
            }
            $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_status = 1 $where ORDER BY image_id DESC");
            if (mysqli_num_rows($foto) > 0) {
                while ($p = mysqli_fetch_array($foto)) {
                    ?>
                    <article class="feed flex-row">
                        <div class="Gambar-postingan flex-row">
                            <img src="foto/<?php echo $p['image'] ?>" />
                        </div>
                        <div class="Informasi-postingan">
                            <div class="Publisher flex-row">
                                <span><?php echo $p['category_name'] ?></span> |
                                <div class="time" data-created-at="<?php echo $p['date_created'] ?>"></div>
                            </div>
                            <div class="title-description">
                                <a class="flex-col" href="detailpostingan.php?id=<?php echo $p['image_id'] ?>" class="title">
                                    <span><?php echo ($p['image_name']) ?></span>
                                    <span><?php echo strlen($p['image_description']) > 100 ? substr($p['image_description'], 0, 120) . '...' : $p['image_description']; ?></span>
                                </a>
                            </div>

                        </div>
                    </article>
                <?php }
            } else { ?>
                <p>Postingan Tidak Ditemukan</p>
            <?php } ?>
        </div>



    </main>

    <!-- Navigasi Bawah -->
    <nav class="nav-bottom flex-row">
        <div class="nav-bottom-content flex-row">
            <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                    <path fill="#2e2e2e"
                        d="M12.592 3.495a2.25 2.25 0 0 1 2.816 0l7.75 6.218A2.25 2.25 0 0 1 24 11.468v11.28a2.25 2.25 0 0 1-2.25 2.25h-3a2.25 2.25 0 0 1-2.25-2.25v-6a.75.75 0 0 0-.75-.75h-3.5a.75.75 0 0 0-.75.75v6a2.25 2.25 0 0 1-2.25 2.25h-3A2.25 2.25 0 0 1 4 22.749v-11.28c0-.682.31-1.328.842-1.755zm1.877 1.17a.75.75 0 0 0-.938 0l-7.75 6.218a.75.75 0 0 0-.281.585v11.28c0 .415.336.75.75.75h3a.75.75 0 0 0 .75-.75v-6a2.25 2.25 0 0 1 2.25-2.25h3.5a2.25 2.25 0 0 1 2.25 2.25v6c0 .415.336.75.75.75h3a.75.75 0 0 0 .75-.75v-11.28a.75.75 0 0 0-.28-.585z" />
                </svg></a>
            <a href="search.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 512 512">
                    <path fill="#2e2e2e"
                        d="M456.69 421.39L362.6 327.3a173.81 173.81 0 0 0 34.84-104.58C397.44 126.38 319.06 48 222.72 48S48 126.38 48 222.72s78.38 174.72 174.72 174.72A173.81 173.81 0 0 0 327.3 362.6l94.09 94.09a25 25 0 0 0 35.3-35.3M97.92 222.72a124.8 124.8 0 1 1 124.8 124.8a124.95 124.95 0 0 1-124.8-124.8" />
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