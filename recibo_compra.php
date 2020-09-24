<?php
session_start();
require 'config.php';
?>
<?php include_once 'topo_restrito.php'; ?>
<div class="container">  
  <?php if(!empty($_GET['msg'])):?>
  <div class="row">    
      <div class="col-12">
        <p class="alert alert-success" role="alert"><?php echo $_GET['msg'];?></p>      
      </div>
  </div>
  <?php endif;?>
  <div class="row">    
      <div class="col">
        <h1  class="text-center">Recibo</h1> 
      </div>   
    <?php
      /* 
         Inserindo um registro novo na tabela venda para iniciar o
         processo de registro/cadastro de uma nova venda
      */
      $data = date('d/m/Y');
      $cod_fun = $_SESSION['id_usr'];
      $sql_registro_venda = "INSERT INTO vendas 
                  (data_venda,  usuario_id) VALUES ('$data', '$cod_fun')";      
      mysqli_query($conecta, $sql_registro_venda);


      /*
        Pesquisando e extraindo da pesquisa feita o código da 
        última venda para colocá-lo posteriormente na tabela das MOTOS 
        para identificar em que venda a moto está
      */
       $sql_consulta_ultima_venda = "SELECT id_venda FROM vendas ORDER BY id_venda DESC LIMIT 1" ;
       
       $resultado_consulta = mysqli_query($conecta, $sql_consulta_ultima_venda);

       $registro_cod_ven = mysqli_fetch_row($resultado_consulta);


       /*
        Alteração na do campo chave estrangeira na tabela MOTOS
        servirá para saber em que venda está (ou estão) o(s) MOTO(s)
       */
        $sql_codigo_venda_em_moto = "UPDATE motos
                                     SET venda_id = '$registro_cod_ven[0]',
                                         fila_compra = 'V'
                                     WHERE fila_compra = 'S'";
        mysqli_query($conecta, $sql_codigo_venda_em_moto);

        // exibição dos dados do recibo
        $sql_consulta_recibo = "SELECT marca, modelo, preco FROM motos WHERE venda_id = '$registro_cod_ven[0]'";

        $resultado_consulta = mysqli_query($conecta, $sql_consulta_recibo);
    ?>    
  </div>
  <div class="row">
    <div class="col">
      <?php
          echo "<p class='text-center'> Venda nº: $registro_cod_ven[0]</p>";          
      ?>  
    </div>
  </div>
  <div>
    <div class="col">
    <?php
        echo "<p class='text-center'> Data: $data</p>";
    ?>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
        <table class="table">
          <tr>              
            <th>Marca</th>
            <th>Modelo</th>            
            <th>Preço</th>            
          </tr>
          <?php 
              $valor_total = 0;
              while($registro = mysqli_fetch_row($resultado_consulta)): ?>
          <tr>
            <td><?php echo $registro[0]; ?></td>            
            <td><?php echo $registro[1]; ?></td>
            <td><?php 
                      echo 'R$'.number_format($registro[2], 2, ',', '.');
                      $valor_total = $valor_total + $registro[2];  
                ?>            
            </td>
            <td>                     
            </td>
          </tr>
          <?php endWhile; ?>
      </table>
    </div>
    <div class="col-6"></div>
  </div>
  <div class="row">
    <div class="col">
      <p class="text-center"> Total: <?php echo 'R$'.number_format($valor_total, 2, ',', '.'); ?> </p>      
    </div>
  </div>
  <div class="row">
    <div class="col">
      <p class="text-center"> <a href="vendas.php"> Fechar recibo </a> </p>
    </div>
  </div>
</div>

<?php include_once 'rodape.php'; ?>
