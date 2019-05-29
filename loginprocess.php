<?php
    session_start();
    require_once "./config/conection.php";
    if (!empty($_POST['user']) && !empty($_POST['password'])) {
        $user = $_POST['user'];
        $pass = $_POST['password'];
        $query_call_user = mysqli_query($connection,"SELECT * FROM users WHERE username = '$user'");

        if (mysqli_num_rows($query_call_user) > 0) {
            $data = mysqli_fetch_assoc($query_call_user);
            $pasword_db = $data['password'];
            $nama_db = $data['name'];
            if ($pass == $pasword_db) {
               $_SESSION['nama']= $nama_db;
               header('location: ./admin/dashboard.php');

            } else {
                header('location: index.php?pesan=Maaf password salah');
            }
            
        } else {
            header('location: index.php?pesan=Maaf user belum terdaftar');
        }
        
    } else {
        header('location: index.php?pesan=Maaf user / password tidak boleh kosong');
    }
    
?>