<?php
session_start();
require 'config.php';
?>
<?php include_once 'topo_restrito.php'; ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="text-center">Motos</h1>
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
          $sql_consulta = "SELECT id_moto, marca, modelo, tipo, preco FROM motos WHERE venda_id IS NULL AND fila_compra = 'S'"; 
      	  $resultado_consulta = mysqli_query($conecta, $sql_consulta);

          $total_de_motos_na_fila_de_compra = mysqli_num_rows($resultado_consulta);
      	?>  	
  	<table class="table">
        <tr>              
          <th>Marca</th>
          <th>Modelo</th>
  	      <th>Tipo</th>
          <th>Preço</th>
  	      <th>Ação</th>
  	    </tr>
      	<?php 
            $valor_total = 0;
            while($registro = mysqli_fetch_row($resultado_consulta)): ?>
        <tr>
          <td><?php echo $registro[1]; ?></td>
          <td><a href="exibe_moto.php?codigo=<?php echo $registro[0];?>"> <?php echo $registro[2];?></a></td>
          <td><?php echo $registro[3]; ?></td>
          <td><?php echo 'R$'.number_format($registro[4], 2, ',', '.');
                    $valor_total = $valor_total + $registro[4];  
              ?>            
          </td>
          <td>
            <a href="processa_retira_fila_compras.php?codigo=<?php echo $registro[0]?>">Retirar da fila de compras</a>	     
      	  </td>
      	</tr>
      	<?php endWhile; ?>
  	</table>
    <p> Total: <?php echo 'R$'.number_format($valor_total, 2, ',', '.'); ?> </p>
    <p> <a href="vendas.php"> Voltar a seleção de motos </a> </p>
    
    <?php if($total_de_motos_na_fila_de_compra >= 1):?>
      <p> <a href="recibo_compra.php"> Finalizar venda </a> </p>
    <?php endif;?>

    </div>
  </div>
</div>

<?php include_once 'rodape.php'; ?>
