<?php
session_start();
require 'config.php';
?>
<?php include_once 'topo_restrito.php'; ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="text-center">EXIBIÇÃO DE MOTO</h1>      
    </div>
  </div>  
  <div class="row">
    <div class="col-6">
        <?php include_once 'menu_restrito.php';?>
    </div>

    <div class="col-6">      
      <?php
        $cod_moto = $_GET['codigo'];
        $sql_pesquisa_moto = "SELECT marca, modelo, tipo, preco, foto FROM motos WHERE id_moto = '$cod_moto'";
        $resultado_pesquisa_moto = mysqli_query($conecta, $sql_pesquisa_moto);

        $registro_moto = mysqli_fetch_row($resultado_pesquisa_moto);
      ?>

      <table>
          <tr>
            <td colspan="2">
              <img src="assets/images/motos/<?php echo $registro_moto[4];?>" />
            </td>
          </tr>
          <tr>
            <td>
              <?php 
                echo "<p>Marca: $registro_moto[0]</p>"; 
                echo "<p>Modelo: $registro_moto[1]</p>"; 
              ?>              
            </td>
            <td>
              <?php 
                echo "<p>Tipo:  $registro_moto[2]</p>"; 
                echo "<p>Preço: R$ ".number_format($registro_moto[3], 2, ',', '.')."</p>"; 
              ?>
            </td>
          </tr>
      </table>
    </div>
  </div>
</div>

<?php include_once 'rodape.php'; ?>
