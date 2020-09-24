<?php
session_start();
require 'config.php';
?>
<?php include_once 'topo_restrito.php'; ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="text-center">EXIBIÇÃO DE FUNCIONÁRIO</h1>      
    </div>
  </div>  
  <div class="row">
    <div class="col-6">
        <?php include_once 'menu_restrito.php';?>
    </div>

    <div class="col-6">      
      <?php
        $cod_usr = $_GET['codigo'];
        $sql_pesquisa_usr = "SELECT nome, email, cpf, telefone_contato, perfil_usr, status,imagem_usr FROM usuarios WHERE id_usr = '$cod_usr'";
        $resultado_pesquisa_usr = mysqli_query($conecta, $sql_pesquisa_usr);

        $registro_usr = mysqli_fetch_row($resultado_pesquisa_usr);
      ?>

      <table>
          <tr>
            <td colspan="2">
              <img src="assets/images/funcionarios/<?php echo $registro_usr[6];?>" width="200" />
            </td>
          </tr>
          <tr>
            <td>
              <?php 
                echo "<p>Nome: $registro_usr[0]</p>"; 
                echo "<p>Email: $registro_usr[1]</p>";
				echo "<p>CPF:  $registro_usr[2]</p>"; 
              ?>              
            </td>
            <td>
              <?php
                echo "<p>Telefone: $registro_usr[3]</p>";
				echo "<p>Profissão: $registro_usr[4]</p>";
				echo "<p>Status: $registro_usr[5]</p>";
              ?>
            </td>
          </tr>
      </table>
    </div>
  </div>
</div>

<?php include_once 'rodape.php'; ?>
