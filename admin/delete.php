<?php
include "../config/conection.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($connection,"SELECT * FROM menu WHERE id = $id");
    if (mysqli_num_rows($query) > 0) {
        $delete = mysqli_query($connection, "DELETE FROM menu WHERE id = $id");
        if ($delete) {
            $pesan="data berhasil di hapus";
                header("location: dashboard.php?ps=".$pesan);
        }else {
            $pesan="data gagal di hapus";
                    header("location: dashboard.php?ps=".$pesan);
        }
    }
    else {
      header("location: dashboard.php");
    }
  }
  else {
    header("location: dashboard.php");
  }

?>