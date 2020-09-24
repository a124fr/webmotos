<?php
session_start();
require 'config.php';

$login = $_POST['usuario'];
$senha = $_POST['senha'];

if(!empty($login) && !empty($senha)) {        
    $sql_consulta = "SELECT id_usr, login FROM usuarios WHERE login = '$login' AND senha = '$senha'";

    $resultado_consulta = mysqli_query($conecta, $sql_consulta);

    $linha = mysqli_num_rows($resultado_consulta);

    if($linha == 1) {
        $registro = mysqli_fetch_row($resultado_consulta);

        $_SESSION['id_usr'] = $registro[0];
        $_SESSION['login'] = $registro[1];

        header("Location: administracao.php");
        exit;
    } else {
        $msg = "Login ou senha Incorretos!";
        $msg2 = "Digite Novamente!!";
        header("Location: index.php?msg=".$msg."&msg2=".$msg2);
        exit;
    }
}

header("Location: index.php");
exit;