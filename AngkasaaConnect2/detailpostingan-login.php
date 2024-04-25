<?php

error_reporting(0);
include 'db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_image WHERE image_id = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($produk);

session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

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
        <section class="feed">

            <div class="details-wrap flex-col">
                <p style="margin-right: auto;
    margin-bottom: 20px;
    font-size: 12px;
    font-weight: 400;">Home \ <?php echo $p->category_name ?></p>
                <div class="judul flex-col">
                    <span class="title"><?php echo $p->image_name ?></span>
                </div>

                <div class="Publisher-detail">
                    <?php echo $p->admin_name ?> | <span class="time"><?php echo $p->date_created ?></span>

                </div>
                <img src="foto/<?php echo $p->image ?>" />

                <p class="caption">
                    <?php echo $p->image_description ?>
                </p>
            </div>


            <!-- like -->
            <div id="like" style="padding-top: 100px; justify-content: flex-start;" class="flex-row">
                <?php
                $like = mysqli_query($conn, "SELECT * FROM tb_like WHERE image_id = '" . $_GET['id'] . "' ");
                $L = mysqli_num_rows($like);
                $id1 = $_GET['id'];
                $cek1 = mysqli_query($conn, "SELECT * FROM tb_like WHERE image_id = '$id1' ");
                if (mysqli_num_rows($cek1)) {
                    while ($cek2 = mysqli_fetch_array($cek1)) {
                        if ($_SESSION['id'] == $cek2['admin_id']) {
                            ?>
                            <form method="POST" action="">
                                <input type="hidden" name="gam" value="<?php echo $p->image_id ?>">
                                <input type="hidden" name="idadm" value="<?php echo $_SESSION['a_global']->admin_id ?>" required>
                                <input type="hidden" name="adname" value="<?php echo $_SESSION['a_global']->admin_name ?>" required>
                                <button style="display: none;" name="suka" class="like"> Like
                                    <?php echo $L ?>
                                </button>
                            </form>

                        <?php }
                    }
                } ?>

                <form method="POST" action="">
                    <input type="hidden" name="gam" value="<?php echo $p->image_id ?>">
                    <input type="hidden" name="idadm" value="<?php echo $_SESSION['a_global']->admin_id ?>" required>
                    <input type="hidden" name="adname" value="<?php echo $_SESSION['a_global']->admin_name ?>" required>
                    <button
                        style="cursor: pointer; font-weight: 600; border: none; background-color: #f5f5f5; padding: 8px 18px; border-radius: 5px; margin-right: auto;"
                        name="suka" class="like2 flex-row">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 1024 1024">
                            <path fill="#2e2e2e"
                                d="M608.544 1023.744c-290.832 0-293.071-12.062-329.087-39.183c-19.104-14.368-55.151-24.32-186.815-32.896c-9.552-.624-18.64-4.288-24.735-11.68c-2.8-3.408-68.592-99.36-68.592-253.04c0-151.44 47.088-220.465 49.103-223.665a31.965 31.965 0 0 1 27.12-15.04c108.112 0 257.984-138 358.736-378.896C451.698 27.68 455.298.272 519.298.272c36.4 0 77.2 26.064 97.344 59.505c41.328 68.32 20.335 215.057.927 293.473c66-.528 185.472-1.425 242.32-1.425c79.072 0 131.407 47.152 132.991 116.08c.529 22.752-2.464 51.808-9.04 66.848c17.408 17.36 39.857 43.536 40.832 77.248c1.216 43.52-27.28 76.655-45.472 95.663c4.175 12.656 12.527 29.44 11.71 49.505c-2 49.344-40.095 81.136-63.823 97.727c1.968 13.504 3.504 38.976-.832 58.672c-17.12 78.609-132.4 110.177-317.712 110.177zM109.617 886.77c114.688 9.489 175.998 22.336 208.334 46.672c25.024 18.848 21.168 26.32 290.592 26.32c82.176 0 242.896-3.424 255.216-59.84c4.896-22.56-18.895-44.735-18.976-44.911c-6.496-16.032.737-34.849 16.577-41.777c.255-.128 64.143-23.007 65.6-58.72c.96-22.831-14.72-36.543-15.072-37.12c-9.328-14.463-5.92-34.303 8.224-44.16c.16-.128 41.551-25.215 40.543-59.423c-.784-27.168-36.576-46.289-37.664-46.928c-8-4.576-13.824-12.496-15.648-21.552c-1.792-9.04.224-18.528 5.84-25.872c0 0 16.272-25.856 15.68-50.112c-1.168-51.92-57.007-53.552-68.992-53.552c-80.72 0-288.03.816-288.03.816c-11.184.048-20.864-5.232-26.88-14.176c-6-8.945-6.448-20.048-2.928-30.224c31.263-90.032 48.72-231.28 19.727-279.536c-8.544-14.224-10.496-28.432-42.496-28.432c-4.432 0-14.991 3.504-25.999 29.744c-106.928 255.84-266.64 403.824-397.456 417.168c-11.28 25.728-32.496 79.04-32.496 175.775c0 98.737 31.28 175.12 46.305 199.84z" />
                        </svg><span style="margin-left: 8px"><?php echo $L ?> Likes</span>
                    </button>
                </form>

                <?php
                if (isset($_POST['suka'])) {
                    $gam = $_POST['gam'];
                    $idadm = $_POST['idadm'];
                    $adname = $_POST['adname'];
                    $cekk = mysqli_query($conn, "SELECT * FROM tb_like WHERE admin_name='" . $adname . "' AND image_id='" . $gam . "'");
                    if (mysqli_num_rows($cekk) > 0) {
                        $hapus = mysqli_query($conn, "DELETE FROM tb_like WHERE admin_name='" . $adname . "' AND image_id='" . $gam . "'");
                        if ($hapus) {
                            echo '<script>window.location="detailpostingan-login.php?id=' . $_GET['id'] . '"</script>';
                        } else {
                            echo 'gagal' . mysqli_error($conn);
                        }
                    } else {
                        $insert = mysqli_query($conn, "INSERT INTO tb_like VALUES (
						               null,
									   '" . $gam . "',
									   '" . $idadm . "',
									   '" . $adname . "',
									    CURRENT_TIMESTAMP
									   ) ");
                        if ($insert) {
                            echo '<script>window.location="detailpostingan-login.php?id=' . $_GET['id'] . '"</script>';
                        } else {
                            echo 'gagal' . mysqli_error($conn);
                        }
                    }
                }
                ?>
            </div>


            <!-- Komentar -->
            <div id="komentar" class="wrap-komentarForm flex-col">
                <p>Komentar<span> (<?php echo $kom ?>)</span></p>
                <form class="tambah-comment flex-col" action="" method="POST">
                    <div class="input-wrap flex-col">
                        <!-- Masukkan foto_id sebagai hidden input -->
                        <input type="hidden" name="image" value="<?php echo $p->image_id ?>">
                        <input type="hidden" name="adminid" value="<?php echo $_SESSION['a_global']->admin_id ?>"
                            required>
                        <input type="hidden" name="adminnm" value="<?php echo $_SESSION['a_global']->admin_name ?>"
                            required>
                        <!-- Textarea untuk komentar -->
                        <textarea type="text" name="komentar" placeholder="Tulis Komentar"
                            class="input-comment"></textarea>
                    </div>

                    <div class="aksi-comment flex-row">
                        <!-- Tombol kirim komentar -->
                        <button type="submit" name="submit" value="Kirim" class="btn-send flex-row">
                            Kirim
                        </button>
                    </div>
                </form>
                <?php
                $komentar = mysqli_query($conn, "SELECT * FROM komentar_foto WHERE image_id = '" . $_GET['id'] . "' ");
                $kom = mysqli_num_rows($komentar);
                if (isset($_POST['submit'])) {
                    $image = $_POST['image'];
                    $adminid = $_POST['adminid'];
                    $adminnm = $_POST['adminnm'];
                    $komen = $_POST['komentar'];
                    $insert = mysqli_query($conn, "INSERT INTO komentar_foto VALUES (
						               null,
									   '" . $image . "',
									   '" . $adminid . "',
									   '" . $adminnm . "',
									   '" . $komen . "',
									    CURRENT_TIMESTAMP
									   ) ");
                    if ($insert) {
                        echo '<script>window.location="detailpostingan-login.php? id=' . $_GET['id'] . '#komentar"</script>';
                    } else {
                        echo 'gagal' . mysqli_error($conn);
                    }
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
                            <img src="image/profile/default.jpeg" style="border-radius: 100%;" width="34px" height="34px">
                            <div class="user-profile flex-col">
                                <span><?php echo $u['admin_name'] ?></span>
                                <span style="margin-right: 30px; color: var(--hitam);"><?php echo $u['isi_komentar'] ?></span>
                                <?php
                                if ($_SESSION['id'] == $u['admin_id']) {
                                    ?>
                                    <div class="inpu2">
                                        <form action="" method="POST">
                                            <input type="hidden" name="image_id" value="<?php echo $p->image_id ?>" />
                                            <input type="hidden" name="hapus" value="<?php echo $u['komentarID'] ?>" />
                                            <button
                                                style="background-color: var(--white); color:var(--hitam); border:none; cursor:pointer;"
                                                name="hapuskomen" onclick="return confirm('Yakin Ingin Hapus ?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                    <?php
                                    if (isset($_POST['hapuskomen'])) {
                                        if (isset($_SESSION['id'])) {
                                            $user_id = $_SESSION['id'];
                                            $image_id = $_POST['image_id'];
                                            $comment_id = $_POST['hapus'];
                                            mysqli_query($conn, "DELETE FROM komentar_foto WHERE image_id='$image_id' && admin_id='$user_id' && komentarID='$comment_id'");
                                            echo '<script>window.location="detailpostingan-login.php?id=' . $_GET['id'] . '#komentar"</script>';
                                        } else {
                                            echo 'gagal' . mysqli_error($conn);
                                        }
                                    }
                                }
                                ?>
                            </div>
                            <span class="date-comments" ><?php echo $u['tanggal_komentar'] ?></span>
                        </article>
                    <?php }
                } else { ?>
                    <p>komentar tidak ada</p>
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

</body>

</html>