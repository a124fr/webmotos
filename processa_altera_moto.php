<?php
require 'config.php';

$codigo = $_POST['codigo'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$preco = $_POST['preco'];
$tipo = $_POST['tipo'];
$foto = $_FILES['foto'];

$foto_nome = $_FILES['foto']['name'];

if(!empty($foto)) {
	$foto_caminho = $_FILES['foto']['tmp_name'];
	move_uploaded_file($foto_caminho, 'assets/images/motos/'.$foto_nome);
} else {
	$foto_nome = $_POST['foto_nome'];
}

$sql_altera = "UPDATE motos 
			   SET marca = '$marca',
			   	   modelo = '$modelo', 
			   	   preco = '$preco', 
			   	   tipo = '$tipo', 
			   	   foto ='$foto_nome'
			   WHERE id_moto = '$codigo'";
$resultado_alteracao = mysqli_query($conecta, $sql_altera);

if($resultado_alteracao == true){
	$msg = "$modelo alterado realizado sucesso!";
	header("Location: lista_moto.php?msg=$msg");	
	exit;
} else {
	$msg = "Ocorreu um erro no servidor. Dados da moto não foram alterados. Tente de novo";
	header("Location: altera_moto.php?codigo=$codigo&msg=$msg");
	exit;
}