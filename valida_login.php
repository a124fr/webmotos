<?php
if(!isset($_SESSION['login'])) {
	$msg = 'Vocẽ não está logado!';
	header("Location: index.php?msg=".$msg);
	exit;
}