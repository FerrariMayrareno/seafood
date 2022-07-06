<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include ('koneksi.php');

// if (isset($_SESSION['user_logged'])) {
// 	header('location: dashboard.php');
// }

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$cek = mysqli_query($db, "SELECT * FROM pegawai  WHERE email_pegawai = '" . $username . "' AND pass_pegawai = '" . $password . "'");
	if (mysqli_num_rows($cek) > 0) {
		$user = mysqli_fetch_assoc($cek);

		$_SESSION['user_logged'] = true;
		$_SESSION['user_id'] = $user['Id'];
		$_SESSION['username'] = $username;
		$_SESSION['user_name'] = $user['username'];
		header('location: dashboard.php');


		
	} else {
		echo "<script>
		alert('Username atau Password salah!');
	</script>";
	}
}

?>
