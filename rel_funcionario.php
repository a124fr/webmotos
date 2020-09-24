<?php
session_start();
$_SESSION['active'] = 'rel_func';
require 'config.php';
?>
<?php include_once 'topo_restrito.php'; ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="text-center">RELATÓRIO DE FUNCIONÁRIOS ATIVOS</h1>
    </div>
  </div>  
  <div class="row">
    <div class="col-6">        
        <?php
          $sql_consulta = "SELECT nome, perfil_usr, status FROM usuarios WHERE status = 'A'"; 
      	  $resultado_consulta = mysqli_query($conecta, $sql_consulta);
      	?>  	
  	<table class="table">
        <tr>              
          <th>Nome</th>
          <th>Função</th>
  	      <th>Status</th>  	      
  	    </tr>
      	<?php while($registro = mysqli_fetch_row($resultado_consulta)): ?>
        <tr>
          <td><?php echo $registro[0]; ?></td>
          <td><?php echo $registro[1];?></a></td>
          <td><?php echo ($registro[2] == 'A')?'ATIVO':'INATIVO'; ?></td>          
      	</tr>
      	<?php endWhile; ?>
  	</table>

    <a href="relatorios.php" class="btn btn-primary">VOLTAR</a>
    </div>
  </div>
</div>

<?php include_once 'rodape.php'; ?>
