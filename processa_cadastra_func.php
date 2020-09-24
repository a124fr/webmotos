<?php
require 'config.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$tlf = $_POST['telefone'];
$perfil = $_POST['profissao'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$foto = $_FILES['foto'];

$foto_nome = $_FILES['foto']['name'];
$foto_caminho = $_FILES['foto']['tmp_name'];
move_uploaded_file($foto_caminho, 'assets/images/funcionarios/'.$foto_nome);

$sql_cadastrar = "INSERT INTO usuarios (nome, email, cpf, telefone_contato, perfil_usr, login, senha, imagem_usr)
					VALUES('$nome', '$email', '$cpf', '$tlf', '$perfil', '$login', '$senha' ,'$foto_nome')";

$resultado_cadastrar = mysqli_query($conecta, $sql_cadastrar);

if($resultado_cadastrar === true) {
	$msg = "Funcionário: $nome cadastrado com sucesso!";
	header("Location: lista_func.php?msg=$msg");	
	exit;
} else {
	$msg = "ocorreu um erro no servidor ao tentar cadastrar";
	header("Location: cadastra_func.php?msg=$msg");
	exit;
}