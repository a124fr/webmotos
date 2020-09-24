<?php
session_start();
require 'config.php';
?>
<?php include_once 'topo_restrito.php'; ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="text-center">CADASTRO DE MOTO</h1>
    </div>
  </div>
  <?php if(!empty($_GET['msg'])):?>
  <div class="row">    
      <p class="alert alert-danger" role="alert"><?php echo $_GET['msg'];?></p>    
  </div>
  <?php endif;?>
  <div class="row">
    <div class="col-6">
        <?php include_once 'menu_restrito.php';?>
    </div>

    <div class="col-6">
        <form method="POST" action="processa_cadastra_moto.php" enctype="multipart/form-data">          
          <div class="form-group row">
            <label for="marca" class="col-sm-2 col-form-label">Marca:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="marca" name="marca"  required />
            </div>
          </div>

          <div class="form-group row">
            <label for="modelo" class="col-sm-2 col-form-label">Modelo:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="modelo" name="modelo" required />
            </div>
          </div>

          <div class="form-group row">
            <label for="preco" class="col-sm-2 col-form-label">Preço:</label>
            <div class="col-sm-10">
              <input type="preco" class="form-control" id="preco" name="preco" required />
            </div>
          </div>

          <div class="form-group row">
            <label for="foto" class="col-sm-2 col-form-label">Foto:</label>
            <div class="col-sm-10">
              <input type="file" class="form-control-file" id="foto" name="foto" required />
            </div>
          </div>

          <div class="form-group row">
            <label for="tipo" class="col-sm-2 col-form-label">Tipo:</label>
            <div class="col-sm-10">
              <select class="form-control" name="tipo">
                <option>CITY</option>
                <option>SCOOTER</option>
                <option>SPORT</option>
              </select>
            </div>
          </div>

          <input type="submit" value="Cadastrar Moto" class="btn btn-primary"/>
      </form>

    </div>
  </div>
</div>

<?php include_once 'rodape.php'; ?>
