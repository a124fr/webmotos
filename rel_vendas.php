<?php
session_start();
$_SESSION['active'] = 'rel_vend';
require 'config.php';
?>
<?php include_once 'topo_restrito.php'; ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="text-center">RELATÓRIO DE VENDAS EM ESTOQUE</h1>
    </div>
  </div>
  <div class="row">    
    <div class="col-6">        
        <?php
          $sql_consulta = "SELECT v.data_venda, a.nome, m.marca, m.modelo, m.preco FROM vendas v LEFT JOIN motos m ON v.id_venda = m.venda_id LEFT JOIN usuarios a ON v.usuario_id = a.id_usr"; 

      	  $resultado_consulta = mysqli_query($conecta, $sql_consulta);
      	?>
  	<table class="table">
        <tr>              
          <th>data da Venda</th>
          <th>Vendedor</th>
  	      <th>Marca da Moto</th>  	      
          <th>Modelo da Moto</th>
          <th>Preço</th>
  	    </tr>
      	<?php while($registro = mysqli_fetch_row($resultado_consulta)): ?>
        <tr>
          <td><?php echo $registro[0]; ?></td>
          <td><?php echo $registro[1];?></a></td>
          <td><?php echo $registro[2]; ?></td>          
          <th><?php echo $registro[3]; ?></th>
          <th><?php echo 'R$ '.number_format($registro[4], 2, ',', '.');?></th>
      	</tr>
      	<?php endWhile; ?>
  	</table>
    <a href="relatorios.php" class="btn btn-primary">VOLTAR</a>
    </div>
  </div>
</div>

<?php include_once 'rodape.php'; ?>
