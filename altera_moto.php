<?php
session_start();
require 'config.php';
?>
<?php include_once 'topo_restrito.php'; ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="text-center">ALTERAÇÃO DE MOTOS</h1>
    </div>
  </div>
  <?php if(!empty($_GET['msg'])):?>
  <div class="row">    
      <div class="col">
        <p class="alert alert-danger" role="alert"><?php echo $_GET['msg'];?></p>    
      </div>
  </div>
  <?php endif;?>
  <div class="row">
    <div class="col-6">
        <?php include_once 'menu_restrito.php';?>
    </div>

    <div class="col-6">
        <?php
            $cod_moto = $_GET['codigo'];
            $sql_pesquisa_moto = "SELECT id_moto, marca, modelo, tipo, preco, foto FROM motos WHERE id_moto = '$cod_moto'";
            $resultado_pesquisa_moto = mysqli_query($conecta, $sql_pesquisa_moto);

            $registro_moto = mysqli_fetch_row($resultado_pesquisa_moto);
        ?>
         <form method="POST" action="processa_altera_moto.php" enctype="multipart/form-data">          
          <input type="hidden" id="codigo" name="codigo" value="<?php echo $registro_moto[0];?>" />
          <input type="hidden" id="foto_nome" name="foto_nome" value="<?php echo $registro_moto[5];?>" />
          
          <div class="form-group row">
            <label for="marca" class="col-sm-2 col-form-label">Marca:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $registro_moto[1];?>" required />
            </div>
          </div>

          <div class="form-group row">
            <label for="modelo" class="col-sm-2 col-form-label">Modelo:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $registro_moto[2];?>" required />
            </div>
          </div>

          <div class="form-group row">
            <label for="preco" class="col-sm-2 col-form-label">Preço:</label>
            <div class="col-sm-10">
              <input type="preco" class="form-control" id="preco" name="preco" value="<?php echo $registro_moto[4];?>" required />
            </div>
          </div>

          <div class="form-group row">
            <label for="foto" class="col-sm-2 col-form-label">Foto:</label>
            <div class="col-sm-10">
              <input type="file" class="form-control-file" id="foto" name="foto" />
            </div>
          </div>

          <div class="form-group row">
            <label for="tipo" class="col-sm-2 col-form-label">Tipo:</label>
            <div class="col-sm-10">
              <select class="form-control" name="tipo">
                <option  <?php echo (strtolower($registro_moto[3]) == 'city')?'selected':'';?> >CITY</option>
                <option <?php echo (strtolower($registro_moto[3]) == 'scooter')?'selected':'';?> >SCOOTER</option>
                <option <?php echo (strtolower($registro_moto[3]) == 'sport')?'selected':'';?> >SPORT</option>
              </select>
            </div>
          </div>

          <input type="submit" value="Alterar Moto" class="btn btn-primary"/>
      </form>
    </div>
  </div>
</div>

<?php include_once 'rodape.php'; ?>
