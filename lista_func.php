<?php
session_start();
$_SESSION['active'] = 'func';
require 'config.php';
?>
<?php include_once 'topo_restrito.php'; ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="text-center">Funcionários</h1>
    </div>
  </div>
  <?php if(!empty($_GET['msg'])):?>
  <div class="row">    
      <div class="col-12">
        <p class="alert alert-success" role="alert"><?php echo $_GET['msg'];?></p>      
      </div>
  </div>
  <?php endif;?>
  <div class="row">
    <div class="col-6">
        <?php include_once 'menu_restrito.php';?>
      </div>

    <div class="col-6">        
        <?php
          $sql_consulta = "SELECT id_usr, nome, cpf, telefone_contato FROM usuarios"; 
      	  $resultado_consulta = mysqli_query($conecta, $sql_consulta);
      	?>
  	<a href="cadastra_func.php">Cadastro de Funcionários</a>
  	<table class="table">
        <tr>              
          <th>CPF</th>
          <th>Nome</th>
  	      <th>Telefone</th>
  	      <th>Ação</th>
  	    </tr>
      	<?php while($registro = mysqli_fetch_row($resultado_consulta)): ?>
        <tr>
          <td><?php echo $registro[2]; ?></td>
          <td><a href="exibe_fun.php?codigo=<?php echo $registro[0];?>"> <?php echo $registro[1];?></a></td>
          <td><?php echo $registro[3]; ?></td>
          <td>
            <a href="altera_func.php?codigo=<?php echo $registro[0];?>">Editar</a>	     
      	  </td>
      	</tr>
      	<?php endWhile; ?>
  	</table>
    </div>
  </div>
</div>

<?php include_once 'rodape.php'; ?>
