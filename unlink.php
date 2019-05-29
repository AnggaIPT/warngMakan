<?php
  require_once "../../config/connect.php";

  if (isset($_POST['save_edit'])) {
    $edit_id = $_POST['edit_id'];
    $edit_nama = $_POST['edit_nama'];
    

    $edit_alamat_rumah = $_POST['edit_alamat_rumah'];
    $edit_alamat_kantor = $_POST['edit_alamat_kantor'];
    $edit_phone = $_POST['edit_telepon'];
    // die(var_dump($_FILES['edit_image']));
    $edit_image = $_FILES['edit_image']['name'];
    $tmp = $_FILES['edit_image']['tmp_name'];
    $fotobaru = date('dmYHis').$edit_image;
    $path = "../images/profile/".$fotobaru;
    move_uploaded_file($tmp, $path);


    $query_profile_old = mysqli_query($connection,"SELECT * FROM tb_users WHERE id = $edit_id ");
    $data_profile_old = mysqli_fetch_assoc($query_profile_old);
    $data_nama_profile_old = $data_profile_old['username'];
    $gambar_old = $data_profile_old['profile_image'];



    $message="";
    if (!empty($edit_nama)||
        !empty($edit_alamat_rumah)||
        !empty($edit_alamat_kantor)||
        !emoty($fotobaru)||
        !empty($edit_phone)){
      
        
      // $query_delete_old_image = mysqli_query($connection,"DELETE category_image FROM tb_car_categories WHERE category_image = '$data_img_categ_old'"); 
      $query_cek_profile = mysqli_query($connection,"SELECT * FROM tb_users WHERE username='$edit_nama' AND username != '$data_nama_profile_old'");
      if (mysqli_num_rows($query_cek_profile)==0) {
        $query_update_profile = mysqli_query($connection,"UPDATE  tb_users 
                                                               SET username='$edit_nama', 
                                                                   alamat_rm='$edit_alamat_rumah',
                                                                   alamat_kantor='$edit_alamat_kantor',  
                                                                   profile_image='$fotobaru',
                                                                   telepon='$edit_phone'
                                                                   WHERE id=$edit_id");
        
        
        if ($query_update_profile) {
          if(unlink("../images/profile/$gambar_old")){
          echo "
            <script>
              alert('Update kategor sukses');
              location.href='../index.php';
            </script>
          ";
          }
        }
        else {
          $message="Gagal update kategori";
        }
      }
      else {
        $message="User sudah ada";
      }
    }
    else {
      $message="Tolong diisi";
    }
    echo "<script>
              alert('".$message."');
              location.href='../edit_profile.php?edit_id=$edit_id';
          </script>";
  }
  else {
    	header('location: ../edit_profile.php');
  }

 ?>
