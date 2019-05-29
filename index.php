<?php
    require_once "./config/conection.php";
?>
<!DOCTYPE html>
<html lang="en">
    <?php
        include "./partials/header.php";
    ?>
<body>
    <div class="wrapper">
       
        <?php
            include "./partials/navbar.php"
        ?>

        <section class="content"> 
            <?php
                $query_call_menu = mysqli_query($connection,"SELECT * FROM menu");
                
                while ($row = mysqli_fetch_assoc($query_call_menu)) {
                ?>
            
            <article>
                <figure>
                    <img src="./image/<?= $row['gambar']?>" alt="soto" width="290" height="190">
                    <figcaption><?= $row['caption'] ?></figcaption>
                </figure>
                <hgroup>
                    <h2><?= $row['judul']?></h2>
                    <h3><?= $row['subjudul']?></h3>
                </hgroup>
                <p><?= $row['deskripsi']?></p>
            </article>
        <?php
            }
        ?>

        </section><!--end content--->

        <?php
            include "./partials/sidebar.php";
            include "./partials/footer.php";
        ?>
    </div>
</body>
</html>