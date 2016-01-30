<?php  
	include_once '../utiliti/crud_function.php';

	#input ke log
	$id = isset($_GET['id'])?$_GET['id']:null;
	$array_obj = array('id_log' => '', 'id_calon' => $id);
	insertData($array_obj, 'log', $conn);

	# Update data calon yang sudah memilih
	$id_voter 	= $_SESSION['no_aktv'];
	$array_obj2 = array('status' => 'sudah memilih');
	updateData($array_obj2, 'voter', $id_voter, 'no_aktivasi', $conn);

	#unset nomor aktv
	unset($_SESSION['no_aktv']);

?>

<h1 align="center"> TERIMA KASIH SUDAH MENGGUNAKAN HAK PILIH</h1>
<h2 align="center">SILAHKAN TINGGALKAN BILIK SUARA DAN PASTIKAN TIDAK ADA YANG TERTINGGAL</h2>