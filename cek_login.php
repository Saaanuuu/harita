<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$SQL = mysqli_query($conn, "SELECT * FROM t_user WHERE 
            username='$username' and password='$password' ");
$cek = mysqli_num_rows($SQL);
$data = mysqli_fetch_array($SQL);

if ($cek > 0) {

  // if($data['role']== 1 ){

  $_SESSION['username'] = $data['username'];
  $_SESSION['name'] = $data['name'];
  $_SESSION['role'] = $data['role'];
  $_SESSION['id_user'] = $data['id_user'];
  $_SESSION['email'] = $data['email'];
  $_SESSION['approve_download'] = $data['approve_download'];
  $_SESSION['login'] = true;

  header("location:admin/");


  //   }else if($data['level']=='user'){

  //     $_SESSION['username'] = $data['username'];
  //     $_SESSION['level'] = 'user';
  //     $_SESSION['id'] = $data['id'];
  //     $_SESSION['email'] = $data['email'];
  //     $_SESSION['nim_nip_npi'] = $data['nim_nip_npi'];
  //     $_SESSION['nama_lengkap'] = $data['nama_lengkap'];

  //     header("location:user/");

  //   }
} else {
  header("location:index.php?alert=gagal");
  exit; // Terminate script execution
}
