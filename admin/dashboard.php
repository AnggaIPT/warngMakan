
<?php
    session_start();
    include "../config/conection.php";
    $query = mysqli_query($connection,"SELECT * FROM menu");
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Warung Makan Tegal</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php
    require_once "../config/conection.php";
   
?>
    <div class="wrapper">
    <?php
            include "../partials/navbar.php"
        ?>
        <section class=" content mb-10">
                <h3 class="title ml-10">Kelola Artikel</h3>
                
                <article>
                    <?php
                        if (isset($_GET['ps'])) {
                            echo $_GET['ps']."<br>";
                        }
                    ?>
                    <a href="tambah.php">Tambah data</a>
                    <table  border="1" class="data " width="600px">
                        <tr>
                            <td>No</td>
                            <td>Masakan</td>
                            <td>Deskripsi</td>
                            <td>Aksi</td>
                        </tr>
                        <?php
                        $no = 0;
                            while ($data= mysqli_fetch_assoc($query)) {
                                $no++;
                        ?>
                        <tr>
                            <td><?= $no?></td>
                            <td><?= $data['judul']?></td>
                            <td><?= $data['deskripsi']?></td>
                            <td>
                                <a href="edit.php?id=<?= $data['id']?>">Edit</a>
                                <a href="delete.php?id=<?= $data['id']?>">Delete</a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                </article>
                
        </section>
    <?php
         include "../partials/sidebar.php";
        include "../partials/footer.php";
    ?>
    </div>

</body>
</html>