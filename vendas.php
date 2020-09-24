<?php
session_start();
$_SESSION['active'] = 'vend';
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
          $sql_consulta = "SELECT id_moto, marca, modelo, tipo, preco FROM motos WHERE venda_id IS NULL AND fila_compra = 'N'"; 
      	  $resultado_consulta = mysqli_query($conecta, $sql_consulta);
      	?>  	
  	<table class="table">
        <tr>              
          <th>Marca</th>
          <th>Modelo</th>
  	      <th>Tipo</th>
          <th>Preço</th>
  	      <th>Ação</th>
  	    </tr>
      	<?php while($registro = mysqli_fetch_row($resultado_consulta)): ?>
        <tr>
          <td><?php echo $registro[1]; ?></td>
          <td><a href="exibe_moto.php?codigo=<?php echo $registro[0];?>"> <?php echo $registro[2];?></a></td>
          <td><?php echo $registro[3]; ?></td>
          <td><?php echo 'R$'.number_format($registro[4], 2, ',', '.');?></td>
          <td>
            <a href="processa_fila_compras.php?codigo=<?php echo $registro[0]?>">Colocar na fila de compras</a>	     
      	  </td>
      	</tr>
      	<?php endWhile; ?>
  	</table>
    <p> <a href="ver_fila_compras.php"> Ver a fila de compras </a> </p>
    </div>
  </div>
</div>

<?php include_once 'rodape.php'; ?>
