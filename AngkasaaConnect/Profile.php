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

    <style>

    </style>

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
    <main class="main flex-row">
        <!-- Galeri -->
        <section class="gallery">
            <div class="feed">
                <div class="profile-wrap flex-row">
                    <div class="profile-content-left flex-col">
                        <img src="image\profile\default.jpeg" width="120px" height="120px" alt="">
                        <a class="flex-row" href="EditProfile.php"> Edit
                            Profile</a>
                    </div>
                    <div class="profile-content-right flex-col">
                        <p>Nama Lengkap : <span><?php echo $d->admin_name ?></span></p>
                        <p>Username : <span><?php echo $d->username ?></span></p>
                        <p>No Telepon : <span><?php echo $d->admin_telp ?></span></p>
                        <p>E-mail : <span><?php echo $d->admin_email ?></span></p>
                        <p>Bio : <span><?php echo $d->admin_bio ?></span></p>
                        <p>Alamat : <span><?php echo $d->admin_address ?></span></p>
                    </div>


                </div>


                <h3 style="font-weight: 600; margin: 0px 0px 20px 0px;"> Postingan saya: </h3>


                <?php
                $user = $_SESSION['a_global']->admin_id;
                $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE admin_id = '$user' ORDER BY image_id DESC");

                if (mysqli_num_rows($foto) > 0) {
                    while ($row = mysqli_fetch_array($foto)) {
                        ?>
                        <article class="feed flex-row">
                            <div class="Gambar-postingan flex-row">
                                <img src="foto/<?php echo $row['image'] ?>" />
                            </div>
                            <div class="Informasi-postingan">
                                <div style="justify-content: start;" class="Publisher flex-row">
                                    <span
                                        class="flex-row"><?php echo ($row['image_status'] == 0) ? 'Disembunyikan' : 'Ditampilkan'; ?></span>
                                    |
                                    <span class="flex-row"><a style="color: var(--hitam);"
                                            href="editpostingan.php?id=<?php echo $row['image_id'] ?>"><svg class="flex-row"
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                <path fill="none" stroke="#2e2e2e" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 4H7.2c-1.12 0-1.68 0-2.108.218a1.999 1.999 0 0 0-.874.874C4 5.52 4 6.08 4 7.2v9.6c0 1.12 0 1.68.218 2.108a2 2 0 0 0 .874.874c.427.218.987.218 2.105.218h9.606c1.118 0 1.677 0 2.104-.218c.377-.192.683-.498.875-.874c.218-.428.218-.987.218-2.105V14m-4-9l-6 6v3h3l6-6m-3-3l3-3l3 3l-3 3m-3-3l3 3" />
                                            </svg></a></span> |
                                    <span class="flex-row"><a style="color: var(--hitam);"
                                            href="proses-hapus.php?idp=<?php echo $row['image_id'] ?>"
                                            onclick="return confirm('Yakin Ingin Hapus ?')"><svg class="flex-row"
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                <g fill="none">
                                                    <path
                                                        d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                    <path fill="#2e2e2e"
                                                        d="M14.28 2a2 2 0 0 1 1.897 1.368L16.72 5H20a1 1 0 1 1 0 2l-.003.071l-.867 12.143A3 3 0 0 1 16.138 22H7.862a3 3 0 0 1-2.992-2.786L4.003 7.07A1.01 1.01 0 0 1 4 7a1 1 0 0 1 0-2h3.28l.543-1.632A2 2 0 0 1 9.721 2zm3.717 5H6.003l.862 12.071a1 1 0 0 0 .997.929h8.276a1 1 0 0 0 .997-.929zM10 10a1 1 0 0 1 .993.883L11 11v5a1 1 0 0 1-1.993.117L9 16v-5a1 1 0 0 1 1-1m4 0a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1m.28-6H9.72l-.333 1h5.226z" />
                                                </g>
                                            </svg></span>

                                </div>
                                <div class="title-description">
                                    <a class="flex-col" href="detailpostingan-login.php?id=<?php echo $row['image_id'] ?>"
                                        class="title">
                                        <span><?php echo ($row['image_name']) ?></span>
                                        <span><?php echo strlen($row['image_description']) > 100 ? substr($row['image_description'], 0, 120) . '...' : $row['image_description']; ?></span>
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php }
                } else { ?>
                    <a style="color: var(--hitam); text-decoration: underline;" href="TambahPostingan.php">Anda Belum Membuat Postingan! </a>
                <?php } ?>

            </div>




        </section>
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