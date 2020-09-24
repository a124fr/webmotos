<?php
require 'config.php';

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$profissao = $_POST['profissao'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$status = $_POST['status'];
$perfil = $_POST['perfil'];
$foto = $_FILES['foto'];

$foto_nome = $_FILES['foto']['name'];

if(!empty($foto)) {
	$foto_caminho = $_FILES['foto']['tmp_name'];
	move_uploaded_file($foto_caminho, 'assets/images/funcionarios/'.$foto_nome);
} else {
	$foto_nome = $_POST['foto_nome'];
}

if(strtoupper($perfil) == 'ADMINISTRADOR') {
	$sql_altera = "UPDATE usuarios 
				   SET email = '$email', 
				   	   cpf = '$cpf', 
				   	   telefone_contato = '$telefone', 				   	   	
				   	   senha = '$senha',					   
					   imagem_usr = '$foto_nome'
				   WHERE id_usr = '$codigo'";

	$resultado_alteracao = mysqli_query($conecta, $sql_altera);

	if($resultado_alteracao == true){
		$msg = "$nome alterado realizado sucesso!";
		header("Location: lista_func.php?msg=$msg");	
		exit;
	} else {
		$msg = "Ocorreu um erro no servidor. Dados do Funcionário não foram alterados. Tente de novo";
		header("Location: altera_func.php?codigo=$codigo&msg=$msg");
		exit;
	}			   

} else { 		

	$sql_altera = "UPDATE usuarios 
				   SET nome = '$nome',
				   	   email = '$email', 
				   	   cpf = '$cpf', 
				   	   telefone_contato = '$telefone', 
				   	   perfil_usr ='$profissao',
					   login = '$login',
					   senha = '$senha',
					   status = '$status',
					   imagem_usr = '$foto_nome'
				   WHERE id_usr = '$codigo'";

	$resultado_alteracao = mysqli_query($conecta, $sql_altera);

	if($resultado_alteracao == true){
		$msg = "$nome alterado realizado sucesso!";
		header("Location: lista_func.php?msg=$msg");	
		exit;
	} else {
		$msg = "Ocorreu um erro no servidor. Dados do Funcionário não foram alterados. Tente de novo";
		header("Location: altera_func.php?codigo=$codigo&msg=$msg");
		exit;
	}

}