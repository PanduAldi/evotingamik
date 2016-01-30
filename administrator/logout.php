<?php  
	session_start();

	unset($_SESSION['user']);
	unset($_SESSION['pass']);
	unset($_SESSION['level']);

?>

<script> 
		alert("Logout berhasil");
		location.href = "index.php"; 
</script>