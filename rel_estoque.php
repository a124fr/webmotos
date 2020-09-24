<?php
session_start();
$_SESSION['active'] = 'rel_estoq';
require 'config.php';
?>
<?php include_once 'topo_restrito.php'; ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="text-center">RELATÓRIO DE MOTOS EM ESTOQUE</h1>
    </div>
  </div>  
  <div class="row">    
    <div class="col-6">        
        <?php
          $sql_consulta = "SELECT marca, modelo, tipo, preco FROM motos WHERE venda_id IS NULL AND fila_compra = 'N'"; 
      	  $resultado_consulta = mysqli_query($conecta, $sql_consulta);
      	?>
  	<table class="table">
        <tr>              
          <th>Marca</th>
          <th>Modelo</th>
  	      <th>Tipo</th>  	      
          <th>Preço</th>
  	    </tr>
      	<?php while($registro = mysqli_fetch_row($resultado_consulta)): ?>
        <tr>
          <td><?php echo $registro[0]; ?></td>
          <td><?php echo $registro[1];?></a></td>
          <td><?php echo $registro[2]; ?></td>          
          <th><?php echo 'R$ '.number_format($registro[3], 2, ',', '.');?></th>
      	</tr>
      	<?php endWhile; ?>
  	</table>
    <a href="relatorios.php" class="btn btn-primary">VOLTAR</a>
    </div>
  </div>
</div>

<?php include_once 'rodape.php'; ?>
