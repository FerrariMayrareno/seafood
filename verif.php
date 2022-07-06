<?php
session_start();
include('koneksi.php');

$verif = mysqli_query($db, "UPDATE pengiriman SET status_pengiriman ='1' WHERE no_resi ='".$_GET['id']."' ");
if ($verif){
    echo "<script> alert('konfirmasi berhasil'); </script>";
    echo "<script> location='pengiriman.php'; </script>";
} else {
    echo "<script> alert('konfirmasi gagal'); </script>";
    echo "<script> location='pengiriman.php'; </script>";
}
