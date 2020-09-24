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
    <a class="navbar-brand" href="#">
      <img src="assets/images/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
       <span> WebMotos </span>
    </a>
  </nav>    
    <div class="login">
      <!-- MENSAGEM DE RETORNO CASO DE ERRO NO ACESSO AO LOGIN -->
      <?php if(!empty($_GET['msg'])): ?>
      <div class="alert alert-danger" role="alert">
        <?php 
          echo $_GET['msg']; 
          echo "<br/>".(isset($_GET['msg2']) ? $_GET['msg2']: '');
        ?>
      </div>  
      <?php endif; ?>

      <form method="POST" action="processa_login.php">
        <div class="form-group">
          <label for="usuario">login:</label>
          <input type="text" name="usuario" class="form-control" required />
        </div>
        <div class="form-group">
          <label for="senha">Senha: </label>
          <input type="password" name="senha" class="form-control" required />
        </div>
        <input type="submit" value="Entrar" class="btn btn-primary" />
      </form>
    </div>
    
  </body>
</html>
