<?php
session_start();
require 'config.php';
?>
<?php include_once 'topo_restrito.php'; ?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1 class="text-center">CADASTRO DE FUNCIONÁRIO</h1>
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
        <form method="POST" action="processa_cadastra_func.php" enctype="multipart/form-data">          
          <div class="form-group row">
            <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nome" name="nome"  required />
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="email" name="email" required />
            </div>
          </div>

          <div class="form-group row">
            <label for="cpf" class="col-sm-2 col-form-label">CPF:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="cpf" name="cpf" maxlength="14" required />
            </div>
          </div>
		  
		  <div class="form-group row">
            <label for="telefone_contato" class="col-sm-2 col-form-label">Telefone:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="telefone" name="telefone" required />
            </div>
          </div>
		  
		  
		  <div class="form-group row">
            <label for="login" class="col-sm-2 col-form-label">Login:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="login" name="login" required />
            </div>
          </div>
		  
		  <div class="form-group row">
            <label for="senha" class="col-sm-2 col-form-label">Senha:</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="senha" name="senha" required />
            </div>
			</div>
		  
		  <div class="form-group row">
            <label for="tipo" class="col-sm-2 col-form-label">Profissão:</label>
            <div class="col-sm-10">
              <select class="form-control" name="profissao">
                <option>ATENDENTE</option>
                <option>FORNECECEDOR</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="foto" class="col-sm-2 col-form-label">Foto:</label>
            <div class="col-sm-10">
              <input type="file" class="form-control-file" id="foto" name="foto" required />
            </div>
          </div>
		  <p>		  
			<input type="submit" value="Cadastrar Funcionário" class="btn btn-primary"/>
		  	
	</form>
	  
    </div>
  </div>
</div>

<?php include_once 'rodape.php'; ?>