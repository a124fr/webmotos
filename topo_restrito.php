<?php require 'valida_login.php';?>
<!DOCTYPE html>
<html>
  <head>
    <title>WebMotos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-reboot.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
  </head>
  <body> 
  <nav class="navbar navbar-dark bg-dark">
    <div class="container d-flex flex-column flex-md-row justify-content-between">    
      <a class="navbar-brand" href="#">
        <img src="assets/images/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        <span> WebMotos </span>
      </a>

      <div class="my-2 my-lg-0">
         <h4 class="text-white bg-dark">Olá <?php echo $_SESSION['login']; ?> <a href="sair.php" class="btn btn-secondary">Sair</a></h4>  
      </div>
    </div>
  </nav>