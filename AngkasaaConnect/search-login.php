<?php
error_reporting(0);
include 'db.php';
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
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

</head>

<body>
    <!-- Global Navigation Bar (GNB) -->
    <nav id="navbar" class="navbar gnb flex-row">
        <div class="gnb-content flex-row">
            <div class="flex-row">
                <a href="index.php" class="text-logo">AngkasaConnect</a>
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
                        <path fill="#2e2e2e"
                            d="M456.69 421.39L362.6 327.3a173.81 173.81 0 0 0 34.84-104.58C397.44 126.38 319.06 48 222.72 48S48 126.38 48 222.72s78.38 174.72 174.72 174.72A173.81 173.81 0 0 0 327.3 362.6l94.09 94.09a25 25 0 0 0 35.3-35.3M97.92 222.72a124.8 124.8 0 1 1 124.8 124.8a124.95 124.95 0 0 1-124.8-124.8" />
                    </svg><span style="font-weight: bold;">Cari</span></a>
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
                    <span>My Profile</span>
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


            <form class="container" action="search-login.php">
                <h3>Cari postingan</h3>
                <div class="input-wrap-search flex-row">
                    <input class="control-search" type="text" name="search" placeholder="Masukkan judul Postingan"
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
                                <a class="flex-col" href="detailpostingan-login.php?id=<?php echo $p['image_id'] ?>"
                                    class="title">
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
            <a href="dashboard.php"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                    <path fill="#2e2e2e"
                        d="M12.592 3.495a2.25 2.25 0 0 1 2.816 0l7.75 6.218A2.25 2.25 0 0 1 24 11.468v11.28a2.25 2.25 0 0 1-2.25 2.25h-3a2.25 2.25 0 0 1-2.25-2.25v-6a.75.75 0 0 0-.75-.75h-3.5a.75.75 0 0 0-.75.75v6a2.25 2.25 0 0 1-2.25 2.25h-3A2.25 2.25 0 0 1 4 22.749v-11.28c0-.682.31-1.328.842-1.755zm1.877 1.17a.75.75 0 0 0-.938 0l-7.75 6.218a.75.75 0 0 0-.281.585v11.28c0 .415.336.75.75.75h3a.75.75 0 0 0 .75-.75v-6a2.25 2.25 0 0 1 2.25-2.25h3.5a2.25 2.25 0 0 1 2.25 2.25v6c0 .415.336.75.75.75h3a.75.75 0 0 0 .75-.75v-11.28a.75.75 0 0 0-.28-.585z" />
                </svg></a>
            <a href="search-login.php"> <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                    viewBox="0 0 512 512">
                    <path fill="#2e2e2e"
                        d="M456.69 421.39L362.6 327.3a173.81 173.81 0 0 0 34.84-104.58C397.44 126.38 319.06 48 222.72 48S48 126.38 48 222.72s78.38 174.72 174.72 174.72A173.81 173.81 0 0 0 327.3 362.6l94.09 94.09a25 25 0 0 0 35.3-35.3M97.92 222.72a124.8 124.8 0 1 1 124.8 124.8a124.95 124.95 0 0 1-124.8-124.8" />
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