<?php
require 'config.php';

$cod = $_GET['codigo'];

$sql_altera = "UPDATE  motos
			   SET fila_compra = 'N'
			   WHERE id_moto = '$cod'";

$sql_resultado_alteracao = mysqli_query($conecta, $sql_altera);

if($sql_resultado_alteracao == true) {
	$msg = "A moto foi retirado da fila de compra com sucesso";
	header("Location: vendas.php?msg=$msg");	
	exit;
} else {
	$msg = "Ocorreu um erro no servidor. A moto não foi retirado da fila de compras. Tente de novo!";
	header("Location: vendas.php?msg=$msg");
	exit;
}