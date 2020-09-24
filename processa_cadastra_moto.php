<?php
require 'config.php';

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$preco = $_POST['preco'];
$tipo = $_POST['tipo'];
$foto = $_FILES['foto'];

$foto_nome = $_FILES['foto']['name'];
$foto_caminho = $_FILES['foto']['tmp_name'];
move_uploaded_file($foto_caminho, 'assets/images/motos/'.$foto_nome);

$sql_cadastrar = "INSERT INTO motos (tipo, marca, modelo, preco, foto)
					VALUES('$tipo', '$marca', '$modelo', '$preco', '$foto_nome')";

$resultado_cadastrar = mysqli_query($conecta, $sql_cadastrar);

if($resultado_cadastrar == true) {
	$msg = "$modelo cadastrado com sucesso!";
	header("Location: lista_moto.php?msg=$msg");	
	exit;
} else {
	$msg = "ocorreu um erro no servidor ao tentar cadastrar";
	header("Location: cadastra_moto.php?msg=$msg");
	exit;
}