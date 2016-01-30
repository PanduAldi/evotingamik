<?php  
	session_start();
	include_once '../utiliti/koneksi.php';


	if (isset($_POST['masuk'])) 
	{
		//declare variable
		$user = isset($_POST['username'])?$_POST['username']:null;
		$pass = md5($_POST['pass']);

		//cek data admin
		$query = $conn->query("SELECT * FROM user WHERE username='$user' AND password = '$pass'");
		$cek   = $query->num_rows;
		$data  = $query->fetch_array();

		if ($cek > 0) 
		{

			if ($data['level'] == "panitia") {
				$_SESSION['user'] 	= $user;
				$_SESSION['pass'] 	= $pass;
				$_SESSION['level'] 	= $data['level'];

				?>
					<script>
						alert("Login Panitia Berhasil");
						location.href = "home.php?page=dashboard";
					</script>
				<?php

			}
			else
			{
			?>
				<script>
					alert("Hak Akses Anda Bukan Panitia");
				</script>
			<?php				
			}
		} 
		else
		{
			?>
				<script>
					alert("salah");
				</script>
			<?php			
		}

	}

?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login Administrator</title>

		<!-- Bootstrap CSS -->
		<link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		
		<style>
			body {
			  padding-top: 40px;
			  padding-bottom: 40px;
			  background-color: #eee;
			}

			.form-signin {
			  max-width: 330px;
			  padding: 15px;
			  margin: 0 auto;
			}
			.form-signin .form-signin-heading,
			.form-signin .checkbox {
			  margin-bottom: 10px;
			}
			.form-signin .checkbox {
			  font-weight: normal;
			}
			.form-signin .form-control {
			  position: relative;
			  height: auto;
			  -webkit-box-sizing: border-box;
			     -moz-box-sizing: border-box;
			          box-sizing: border-box;
			  padding: 10px;
			  font-size: 16px;
			}
			.form-signin .form-control:focus {
			  z-index: 2;
			}
			.form-signin input[type="email"] {
			  margin-bottom: -1px;
			  border-bottom-right-radius: 0;
			  border-bottom-left-radius: 0;
			}
			.form-signin input[type="password"] {
			  margin-bottom: 10px;
			  border-top-left-radius: 0;
			  border-top-right-radius: 0;
			}

		</style>

		<!-- jQuery -->
		<script src="../assets/jQuery-2.1.4.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="../assets/bootstrap/js/bootstrap.min.js"></script>

	</head>
	<body>
	   <div class="container">
		<?php  
			$query_waktu = $conn->query("SELECT * FROM waktu_pemilihan WHERE id_waktu='1'");
			$result_waktu = $query_waktu->fetch_array();

			if ($result_waktu['status'] == "belum dimulai") {
				?>
					<div class="alert alert-warning" style="margin:7%">
						<h3 align="center">
							Halaman Ini Tidak Dapat Di Gunakan Karena Administrator Belum Memulai Waktu Pemilihan. <br>
						</h3>
					</div>
				<?php
			}
			elseif ($result_waktu['status'] == "pemungutan selesai") 
			{
				?>
					<div class="alert alert-danger" style="margin:7%">
						<h3 align="center">
							Halaman Ini Tidak Dapat Di Gunakan Karena Pemungutan Suara Telah Selesai. <br>
						</h3>
					</div>
				<?php
			}
			else
			{
		?>
	      <form class="form-signin" method="POST">
	      	<center><img src="../logo.png" alt="" width="120" height="120"></center>
	        <h2 class="form-signin-heading"><i class="fa fa-sign-in"></i> Login Panitia</h2>
	        <label for="username" class="sr-only">Username</label>
	        <input type="text" name="username" class="form-control" placeholder="Masukan Username" required autofocus>
	        <label for="inputPassword" class="sr-only">Password</label>
	        <input type="password" name="pass" class="form-control" placeholder="Password" required>
	        <button class="btn btn-lg btn-primary btn-block" type="submit" name="masuk">Masuk</button>
	      </form>
		<?php } ?>
	    </div> <!-- /container -->
	</body>
</html>