<?php

    include "../config/conection.php";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = mysqli_query($connection,"SELECT * FROM menu WHERE id = $id");
        if (mysqli_num_rows($query) > 0) {
          $data = mysqli_fetch_assoc($query);
        }
        else {
          header("location: dashboard.php");
        }
      }
      else {
        header("location: dashboard.php");
      }
    
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
                    <input type="hidden" name="id_menu" value="<?= $data['id']?>">
                    <tr>
                        <td>Masakan Nama</td>
                        <td><input type="text" name="judul" value="<?= $data['judul']?>" id=""></td>
                    </tr>
                    <tr>
                        <td>Subjudul</td>
                        <td><input type="text" name="subjudul" value="<?= $data['subjudul']?>" id=""></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>
                            <textarea  name="deskripsi" id="" cols="30" rows="10"><?= $data['deskripsi']?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Gambar</td>
                        <td><input type="file" name="gambar" value="<?= $data['gambar']?>" id=""></td>
                    </tr>
                    <tr>
                        <td>Judul Gambar</td>
                        <td><input type="text" name="caption" value="<?= $data['caption']?>" id=""></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="edit"   value="EDIT"></td>
                    </tr>
                </table>
            </form>
        </article>
    </section>

    <?php
        if (isset($_POST['edit'])) {
            $id_menu =$_POST['id_menu'];
            $judul = $_POST['judul'];
            $subjudul = $_POST['subjudul'];
            $desk = $_POST['deskripsi'];
            $caption = $_POST['caption'];
            $gambar = $_FILES["gambar"]["name"];
            $sumber = $_FILES["gambar"]["tmp_name"];
            if (move_uploaded_file($sumber, "../image/".$gambar)) {

                $update = mysqli_query($connection, "UPDATE menu SET judul='$judul', subjudul='$subjudul', deskripsi='$desk', gambar='$gambar', caption='$caption' WHERE id=$id_menu");
                if ($update) {
                    $pesan="data berhasil di edit";
                    header("location: dashboard.php?ps=".$pesan);
                }else {
                    $pesan="data gagal di edit";
                    header("location: dashboard.php?ps=".$pesan);
                }
            } else {
                $pesan="gagal edit data karena gambar tidak diupload";
                    header("location: dashboard.php?ps=".$pesan);
            }
            
        }

        include "../partials/footer.php";
    ?>
</body>
</html>