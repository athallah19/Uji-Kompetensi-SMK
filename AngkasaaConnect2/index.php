<?php
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

    <style>
        .sidebar button:last-child {
            margin-top: 0px;
            margin-bottom: 54px;
        }
    </style>

    <title>AngkasaConnect</title>

</head>

<body>
    <!-- Global Navigation Bar (GNB) -->
    <nav id="navbar" class="navbar gnb flex-row">
        <div class="gnb-content flex-row">
            <div class="flex-row">
                <a href="#" class="text-logo">AngkasaConnect</a>
            </div>
            <!-- <a class="flex-row" href="Profile.php"><img class="nav-account-img" src="image/profile/default.jpeg"></a> -->
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="sidebar">
        <header class="sidebar-header">
            <a class="logo" href="#">
                <img class="logo-img" src="image/logoAngkasa.png" />
                <h1 class="text-logo">AngkasaConnect</h1>
            </a>
        </header>

        <nav>
            <button>
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                        <path fill="#2e2e2e"
                            d="M15.408 3.498a2.25 2.25 0 0 0-2.816 0l-7.75 6.217A2.25 2.25 0 0 0 4 11.47v11.28A2.25 2.25 0 0 0 6.25 25h2.5A2.25 2.25 0 0 0 11 22.75v-5.5c0-.69.56-1.25 1.25-1.25h3.5c.69 0 1.25.56 1.25 1.25v5.5A2.25 2.25 0 0 0 19.25 25h2.5A2.25 2.25 0 0 0 24 22.75V11.47a2.25 2.25 0 0 0-.842-1.755z" />
                    </svg>
                    <span style="font-weight: bold;">Home</span>
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
        <!-- Galeri -->

        <div class="feed">
            <form class="container" action="search.php">
                <h3>Cari Foto</h3>
                <div class="input-wrap-search flex-row">
                    <input class="control-search" type="text" name="search" placeholder="Masukkan Judul Foto"
                        required />
                </div>
                <button class="flex-row" type="submit" name="cari">Cari </button>
            </form>
            <h3 style="margin-bottom: 20px;">Kategori Foto</h3>
            <div class="kategori-wrap">
                <?php
                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                if (mysqli_num_rows($kategori) > 0) {
                    while ($k = mysqli_fetch_array($kategori)) {
                        ?>
                        <a href="search.php?kat=<?php echo $k['category_id'] ?>">

                            <p> <?php echo $k['category_name'] ?></p>

                        </a>
                    <?php }
                } else { ?>
                    <p>Belum Ada yang membuat postingan dengan kategori ini.</p>
                <?php } ?>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function () {
                    // Fungsi untuk menggulir ke kanan secara otomatis
                    function autoScrollRight() {
                        var wrapper = $('.kategori-wrap');
                        var scrollAmount = 2; // Jarak scroll setiap kali pemutaran

                        // Memulai interval untuk menggulir
                        var scrollInterval = setInterval(function () {
                            // Menggulir ke kanan sejauh scrollAmount
                            wrapper.scrollLeft(wrapper.scrollLeft() + scrollAmount);

                            // Ketika wrapper mencapai akhir konten, gulir kembali ke awal
                            if (wrapper.scrollLeft() >= wrapper[0].scrollWidth - wrapper.width()) {
                                wrapper.scrollLeft(0);
                            }
                        }, 50); // Interval scroll (dalam milidetik)

                        // Menghentikan interval jika pengguna menggerakkan mouse ke dalam wrapper
                        wrapper.mouseover(function () {
                            clearInterval(scrollInterval);
                        });

                        // Melanjutkan interval jika pengguna meninggalkan wrapper
                        wrapper.mouseleave(function () {
                            scrollInterval = setInterval(function () {
                                wrapper.scrollLeft(wrapper.scrollLeft() + scrollAmount);
                                if (wrapper.scrollLeft() >= wrapper[0].scrollWidth - wrapper.width()) {
                                    wrapper.scrollLeft(0);
                                }
                            }, 50);
                        });
                    }

                    // Panggil fungsi untuk memulai menggulir otomatis
                    autoScrollRight();
                });
            </script>


            <?php
            $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_status = 1 ORDER BY image_id DESC LIMIT 8");
            if (mysqli_num_rows($foto) > 0) {
                while ($p = mysqli_fetch_array($foto)) {
                    ?>
                    <article class="flex-row">
                        <div class="Gambar-postingan flex-row">
                            <img src="foto/<?php echo $p['image'] ?>" />
                        </div>
                        <div class="Informasi-postingan">
                            <div class="Publisher flex-row">
                                <span><?php echo $p['category_name'] ?></span> |
                                <div class="time" ><?php echo $p['date_created'] ?></div>
                            </div>
                            <div class="title-description">
                                <a class="flex-col" href="detailpostingan.php?id=<?php echo $p['image_id'] ?>">
                                    <span><?php echo ($p['image_name']) ?></span>
                                    <span><?php echo strlen($p['image_description']) > 100 ? substr($p['image_description'], 0, 120) . '...' : $p['image_description']; ?></span>
                                </a>

                            </div>

                        </div>
                    </article>
                <?php }
            } else { ?>
                <div class="feed flex-row">
                    Saat ini belum ada postingan yang tersedia.
                </div>
            <?php } ?>
        </div>



    </main>

    <!-- Navigasi Bawah -->
    <nav class="nav-bottom flex-row">
        <div class="nav-bottom-content flex-row">
            <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
                    <path fill="#2e2e2e"
                        d="M15.408 3.498a2.25 2.25 0 0 0-2.816 0l-7.75 6.217A2.25 2.25 0 0 0 4 11.47v11.28A2.25 2.25 0 0 0 6.25 25h2.5A2.25 2.25 0 0 0 11 22.75v-5.5c0-.69.56-1.25 1.25-1.25h3.5c.69 0 1.25.56 1.25 1.25v5.5A2.25 2.25 0 0 0 19.25 25h2.5A2.25 2.25 0 0 0 24 22.75V11.47a2.25 2.25 0 0 0-.842-1.755z" />
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
</body>

</html>