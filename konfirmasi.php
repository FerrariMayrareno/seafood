<?php
session_start();
include('koneksi.php');

$verif = mysqli_query($db, "UPDATE pembayaran SET status_pembayaran ='1' WHERE id_pemesanan ='".$_GET['id']."' ");

if ($verif){
    echo "<script> alert('konfirmasi berhasil'); </script>";
    echo "<script> location='pemesanan.php'; </script>";
} else {
    echo "<script> alert('konfirmasi gagal'); </script>";
    echo "<script> location='pemesanan.php'; </script>";
}
