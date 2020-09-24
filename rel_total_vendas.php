<?php
session_start();
$_SESSION['active'] = 'rel_fatur';
require 'config.php';
?>
<?php include_once 'topo_restrito.php'; ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="text-center">RECIBO</h1>
    </div>
  </div>  
  <div class="row">    
    <div class="col-6">        
        <?php

          $data = date ('d/m/Y');          
          $sql_consulta = "SELECT preco FROM motos WHERE fila_compra = 'V'"; 
      	  $resultado_consulta = mysqli_query($conecta, $sql_consulta);

          $valor_total = 0;
          while($resultado = mysqli_fetch_row($resultado_consulta)) {
            $valor_total += $resultado[0];
          }
      	?>
    <p><?php echo 'Data: '.$data;?></p>    
  	<p> Total de vendas até a presente data: <?php echo 'R$'.number_format($valor_total, 2, ',', '.'); ?> </p>
    <a href="relatorios.php" class="btn btn-primary">VOLTAR</a>
    </div>
  </div>
</div>

<?php include_once 'rodape.php'; ?>
