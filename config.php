<?php
$nome_banco = "webmotos";
$servidor = "localhost";
$usuario = "root";
$senha = "";

/* hospedagem
// http://webmotos.epizy.com/
$nome_banco = "epiz_26810429_webmotos";
$servidor = "sql106.epizy.com";
$usuario = "epiz_26810429";
$senha = "209EKSIsksF0";
*/
$conecta = mysqli_connect($servidor, $usuario, $senha, $nome_banco) or die('Error ao conectar no banco de dados!');
