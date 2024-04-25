<?php
error_reporting(0);
session_start();
include 'db.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$produk = mysqli_query($conn, "SELECT * FROM  tb_image WHERE image_id = '" . $_GET['id'] . "'");
if (mysqli_num_rows($produk) == 0) {
    echo '<script>window.location="data-image.php"</script>';
}
$p = mysqli_fetch_object($produk);
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
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/sidebar.css">

    <!-- Judul Halaman -->
    <title>Edit postingan</title>


</head>

<body>
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
            <a class="logo" href="dashboard.php">
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

        <section class="content feed2 flex-row">
            <form class="form-box" action="" method="POST" enctype="multipart/form-data">
                <label style="font-weight: 600; font-size: 14px; margin-bottom: 12px;">Upload foto: </label>
                <div class="dropzone-area">
                    <div class="file-upload-icon" style="width: 100%;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24">
                            <g stroke="#2e2e2e" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                <path fill="none" stroke-dasharray="14" stroke-dashoffset="14" d="M6 19h12">
                                    <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.4s" values="14;0" />
                                </path>
                                <path fill="#2e2e2e" d="M12 15 h2 v-6 h2.5 L12 4.5M12 15 h-2 v-6 h-2.5 L12 4.5">
                                    <animate attributeName="d" calcMode="linear" dur="1.5s" keyTimes="0;0.7;1"
                                        repeatCount="indefinite"
                                        values="M12 15 h2 v-6 h2.5 L12 4.5M12 15 h-2 v-6 h-2.5 L12 4.5;M12 15 h2 v-3 h2.5 L12 7.5M12 15 h-2 v-3 h-2.5 L12 7.5;M12 15 h2 v-6 h2.5 L12 4.5M12 15 h-2 v-6 h-2.5 L12 4.5" />
                                </path>
                            </g>
                        </svg>
                    </div> <br>

                    <input type="hidden" name="foto" value="<?php echo $p->image ?>" />
                    <div style="display: none;" class="input-wrap flex-row">
                        <input style="padding: 10px 6px;" type="text" name="namauser" class="control"
                            placeholder="Nama User" value="<?php echo $p->admin_name ?>" readonly="readonly">
                    </div>
                    <div style="display: none;" class="input-wrap flex-row">
                        <input style="padding: 10px 6px;" type="text" name="kategori" class="input-control"
                            placeholder="Kategori Foto" value="<?php echo $p->category_name ?>" readonly="readonly">
                    </div>

                    <p id="upload-text" style="font-weight: 500; margin-bottom: 5px; font-size: 14px;">
                        Klik untuk mengedit / Seret dan lepaskan. </p>
                    <input type="file" name="gambar" id="image" accept="image/*">
                    <!-- <input type="file" required id="image" name="uploaded-file"> -->

                    <p style="font-weight: 500; font-size: 14px;" class="message"><?php echo $p->image ?>
                    </p>
                </div>

                <label style="font-weight: 600; font-size: 14px; margin: 20px 0px 10px 0px;">Status postingan: </label>
                <div class="input-wrap flex-row">
                    <select style="width: 90%;     margin: 12px 16px;" required style="height: 52px;" class="control"
                        name="status">
                        <option value="">--Pilih--</option>
                        <option value="1" <?php echo ($p->image_status == 1) ? 'selected' : ''; ?>>Tampilkan</option>
                        <option value="0" <?php echo ($p->image_status == 0) ? 'selected' : ''; ?>>Sembunyikan
                        </option>
                    </select>
                </div>

                <label style="font-weight: 600; font-size: 14px; margin: 20px 0px 10px 0px;" for="jdl">Judul postingan:
                </label>
                <div class="input-wrap flex-row">
                    <textarea style="width: 90%;     margin: 12px 16px;" id="jdl" required class="textarea-control"
                        name="nama" placeholder="Judul postingan"><?php echo $p->image_name ?></textarea>
                </div>

                <label style="font-weight: 600; font-size: 14px; margin: 20px 0px 10px 0px;" for="dks">Deskripsi postingan:
                </label>
                <div class="input-wrap flex-row">
                    <textarea style="width: 90%;     margin: 12px 16px;" id="dks" required class="textarea-control"
                        name="deskripsi"
                        placeholder="Deskripsi postingan"><?php echo $p->image_description ?></textarea>
                </div>

                <div class="form-actions flex-row">
                    <button class="reset" type="button" onclick="clearForm()">
                        Clear
                    </button>
                    <button type="submit" name="submit">
                        Simpan
                    </button>
                </div>
            </form>
            <?php
            if (isset($_POST['submit'])) {

                // data inputan dari form
                $kategori = $_POST['kategori'];
                $user = $_POST['namauser'];
                $nama = $_POST['nama'];
                $deskripsi = $_POST['deskripsi'];
                $status = $_POST['status'];
                $foto = $_POST['foto'];

                // data gambar yang baru 
                $filename = $_FILES['gambar']['name'];
                $tmp_name = $_FILES['gambar']['tmp_name'];

                //jika admin ganti gambar
                if ($filename != '') {

                    $type1 = explode('.', $filename);
                    $type2 = $type1[1];

                    $newname = 'foto' . time() . '.' . $type2;

                    // menampung data format file yang diizinkan
                    $tipe_diizinkan = array('jpg', 'jpeg', 'png', 'gif');

                    // validasi format file
                    if (!in_array($type2, $tipe_diizinkan)) {
                        // jika format file tidak ada di dalam tipe diizinkan
                        echo '<script>alert("Format file tidak diizinkan")</script>';

                    } else {
                        unlink('./foto/' . $foto);
                        move_uploaded_file($tmp_name, './foto/' . $newname);
                        $namagambar = $newname;
                    }

                } else {
                    // jika admin tidak ganti gambar
                    $namagambar = $foto;

                }

                //query update data produk
                $update = mysqli_query($conn, "UPDATE tb_image SET
					                       category_name       = '" . $kategori . "',
										   admin_name          = '" . $user . "',
										   image_name          = '" . $nama . "',
										   image_description   = '" . $deskripsi . "',
										   image               = '" . $namagambar . "',
										   image_status        = '" . $status . "'
										   WHERE image_id      = '" . $p->image_id . "' ");
                if ($update) {
                    echo '<script>alert("Edit postingan berhasil")</script>';
                    echo '<script>window.location="profile.php"</script>';
                } else {
                    echo 'gagal' . mysqli_error($conn);

                }
            }
            ?>

        </section>

    </main>

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

    <script type="text/javascript"><?php echo $jsArray; ?></script>
    <script>
        const dropzoneArea = document.querySelector('.dropzone-area');
        const uploadText = document.getElementById('upload-text');
        const uploadFileInput = document.getElementById('image');

        function clearForm() {
            // Mengambil semua elemen input di dalam form
            var inputs = document.querySelectorAll('.form-box input, .form-box textarea, .form-box select');

            // Mengosongkan nilai dari setiap elemen input
            inputs.forEach(function (input) {
                input.value = '';
            });
        }

        // Sembunyikan teks saat input file terisi
        uploadFileInput.addEventListener('change', () => {
            if (uploadFileInput.files.length > 0) {
                uploadText.style.display = 'none';
            } else {
                uploadText.style.display = 'block';
            }
        });

        // Tambahkan class dropzone--over saat drag over
        dropzoneArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropzoneArea.classList.add('dropzone--over');
        });

        // Hapus class dropzone--over saat drag leave atau drag end
        ['dragleave', 'dragend'].forEach((type) => {
            dropzoneArea.addEventListener(type, () => {
                dropzoneArea.classList.remove('dropzone--over');
            });
        });

        // Handle drop event
        dropzoneArea.addEventListener('drop', (e) => {
            e.preventDefault();

            if (e.dataTransfer.files.length > 0) {
                uploadText.style.display = 'none';
            }

            dropzoneArea.classList.remove('dropzone--over');
        });


        const bytesToMB = (bytes) => {
            return (bytes / (1024 * 1024)).toFixed(2) + " MB";
        };

        const dropzoneBox = document.getElementsByClassName("dropzone-box")[0];

        const inputFiles = document.querySelectorAll(
            ".dropzone-area input[type='file']"
        );

        const inputElement = inputFiles[0];

        const dropZoneElement = inputElement.closest(".dropzone-area");

        inputElement.addEventListener("change", (e) => {
            if (inputElement.files.length === 1) { // Memeriksa apakah hanya satu file yang dipilih
                const file = inputElement.files[0];
                if (validateImageFile(file)) {
                    if (file.size <= 2 * 1024 * 1024) { // Memeriksa apakah ukuran file kurang dari atau sama dengan 2MB
                        updateDropzoneFileList(dropZoneElement, file);
                    } else {
                        alert("Ukuran file  Gambar / GIF tidak boleh lebih dari 2MB.");
                        inputElement.value = ""; // Mengosongkan input file jika file tidak valid
                    }
                } else {
                    alert("Mohon unggah file  Gambar / GIF saja.");
                    inputElement.value = ""; // Mengosongkan input file jika file tidak valid
                }
            } else {
                alert("Mohon pilih hanya satu  Gambar / GIF.");
                inputElement.value = ""; // Mengosongkan input file jika lebih dari satu file yang dipilih
            }
        });

        dropZoneElement.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropZoneElement.classList.add("dropzone--over");
        });

        ["dragleave", "dragend"].forEach((type) => {
            dropZoneElement.addEventListener(type, (e) => {
                dropZoneElement.classList.remove("dropzone--over");
            });
        });

        dropZoneElement.addEventListener("drop", (e) => {
            e.preventDefault();

            if (e.dataTransfer.files.length === 1) { // Memeriksa apakah hanya satu file yang dijatuhkan
                const file = e.dataTransfer.files[0];
                if (validateImageFile(file)) {
                    if (file.size <= 2 * 1024 * 1024) { // Memeriksa apakah ukuran file kurang dari atau sama dengan 2MB
                        inputElement.files = e.dataTransfer.files;
                        updateDropzoneFileList(dropZoneElement, file);
                    } else {
                        alert("Ukuran file  Gambar / GIF tidak boleh lebih dari 2MB.");
                    }
                } else {
                    alert("Mohon Hanya unggah file JPEG, PNG, dan GIF saja.");
                }
            } else {
                alert("Mohon jatuhkan hanya satu Gambar / GIF.");
            }

            dropZoneElement.classList.remove("dropzone--over");
        });

        const validateImageFile = (file) => {
            const acceptedImageTypes = ["image/jpeg", "image/png", "image/gif"];
            return acceptedImageTypes.includes(file.type);
        };

        const updateDropzoneFileList = (dropzoneElement, file) => {
            let dropzoneFileMessage = dropzoneElement.querySelector(".message");

            dropzoneFileMessage.innerHTML = `
        ${file.name}, ${bytesToMB(file.size)}
        `;
        };

        dropzoneBox.addEventListener("reset", (e) => {
            let dropzoneFileMessage = dropZoneElement.querySelector(".message");

            dropzoneFileMessage.innerHTML = `No Picture / GIF Selected`;
        });

        // dropzoneBox.addEventListener("submit", (e) => {
        //     e.preventDefault();
        //     const myFiled = document.getElementById("image");
        //     console.log(myFiled.files[0]);
        // });

    </script>
</body>

</html>