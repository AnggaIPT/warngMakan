<?php

    include "../config/conection.php";
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <section class="content">
        <article>
            <hgroup>
                <h2>Form Tambah data masakan</h2>
                <h3>Isikan form dibawah ini dengan lengkap</h3>
            </hgroup>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Masakan Nama</td>
                        <td><input type="text" name="judul" id=""></td>
                    </tr>
                    <tr>
                        <td>Subjudul</td>
                        <td><input type="text" name="subjudul" id=""></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>
                            <textarea  name="deskripsi" id="" cols="30" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Gambar</td>
                        <td><input type="file" name="gambar" id=""></td>
                    </tr>
                    <tr>
                        <td>Judul Gambar</td>
                        <td><input type="text" name="caption" id=""></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="tambah" id="" value="TAMBAH"></td>
                    </tr>
                </table>
            </form>
        </article>
    </section>

    <?php
        if (isset($_POST['tambah'])) {
            $judul = $_POST['judul'];
            $subjudul = $_POST['subjudul'];
            $desk = $_POST['deskripsi'];
            $caption = $_POST['caption'];
            $gambar = $_FILES["gambar"]["name"];
            $sumber = $_FILES["gambar"]["tmp_name"];
            if (move_uploaded_file($sumber, "../image/".$gambar)) {
                $insert = mysqli_query($connection,"INSERT INTO menu VALUES (NULL,'$judul','$subjudul','$desk', '$gambar', '$caption')");
                if ($insert) {
                    $pesan="data berhasil di tambah";
                    header("location: dashboard.php?ps=".$pesan);
                }else {
                    $pesan="data gagal di tambah";
                    header("location: dashboard.php?ps=".$pesan);
                }
            } else {
                $pesan="gagal tambah data karena gambar tidak diupload";
                    header("location: dashboard.php?ps=".$pesan);
            }
            
        }

        include "../partials/footer.php";
    ?>
</body>
</html>