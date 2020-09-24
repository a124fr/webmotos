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
            $cod_usr = $_GET['codigo'];
            $sql_pesquisa_usr = "SELECT id_usr, nome, email, cpf, telefone_contato, perfil_usr, login, senha, status, imagem_usr FROM usuarios WHERE id_usr = '$cod_usr'";
            $resultado_pesquisa_usr = mysqli_query($conecta, $sql_pesquisa_usr);

            $registro_usr = mysqli_fetch_row($resultado_pesquisa_usr);
        ?>

        <?php if(strtoupper($registro_usr[5]) != 'ADMINISTRADOR'): ?>          
           <form method="POST" action="processa_altera_func.php" enctype="multipart/form-data">          
            <input type="hidden" id="codigo" name="codigo" value="<?php echo $registro_usr[0];?>" />
            <input type="hidden" id="perfil" name="perfil" value="<?php echo $registro_usr[5];?>"/>
            <input type="hidden" id="foto_nome" name="foto_nome" value="<?php echo $registro_usr[9];?>" />
            
            <div class="form-group row">
              <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $registro_usr[1];?>" required />
              </div>
            </div>

            <div class="form-group row">
              <label for="modelo" class="col-sm-2 col-form-label">Email:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $registro_usr[2];?>" required />
              </div>
            </div>

            <div class="form-group row">
              <label for="cpf" class="col-sm-2 col-form-label">CPF:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $registro_usr[3];?>" required />
              </div>
            </div>
  		  
  	        <div class="form-group row">
              <label for="telefone" class="col-sm-2 col-form-label">Telefone:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $registro_usr[4];?>" required />
              </div>
            </div>
            
            <div class="form-group row">
              <label for="tipo" class="col-sm-2 col-form-label">Profissão:</label>
              <div class="col-sm-10">
                <select class="form-control" name="profissao" id="profissao">
                  <option  <?php echo (strtolower($registro_usr[5]) == 'atendente')?'selected':'';?> >ATENDENTE</option>
                  <option <?php echo (strtolower($registro_usr[5]) == 'fornecedor')?'selected':'';?> >FORNECEDOR</option>
                </select>
              </div>
            </div>
  		  
  		      <div class="form-group row">
              <label for="login" class="col-sm-2 col-form-label">Login:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="login" name="login" value="<?php echo $registro_usr[6];?>" required />
              </div>
            </div>

            <div class="form-group row">
              <label for="senha" class="col-sm-2 col-form-label">Senha:</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $registro_usr[7];?>" required />
              </div>
            </div>

            <div class="form-group row">
              <label for="status" class="col-sm-2 col-form-label">Status:</label>
              <div class="col-sm-10">
                <select class="form-control" name="status" id="status">
                  <option value="A" <?php echo (strtolower($registro_usr[8]) == 'a')?'selected':'';?> >ATIVO</option>
                  <option value="I" <?php echo (strtolower($registro_usr[8]) == 'i')?'selected':'';?> >INATIVO</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="foto" class="col-sm-2 col-form-label">Foto:</label>
              <div class="col-sm-10">
                <input type="file" class="form-control-file" id="foto" name="foto" value="<?php echo $registro_usr[9];?>" />
              </div>
            </div>

            <input type="submit" value="Alterar Funcionário" class="btn btn-primary"/>
        </form>      

      <?php else: ?>
        <form method="POST" action="processa_altera_func.php" enctype="multipart/form-data">          
            <input type="hidden" id="codigo" name="codigo" value="<?php echo $registro_usr[0];?>" />
            <input type="hidden" id="perfil" name="perfil" value="<?php echo $registro_usr[5];?>"/>
            <input type="hidden" id="foto_nome" name="foto_nome" value="<?php echo $registro_usr[9];?>" />
            
            <div class="form-group row">
              <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="nome" name="nome" value="<?php echo $registro_usr[1];?>" required />
              </div>
            </div>

            <div class="form-group row">
              <label for="modelo" class="col-sm-2 col-form-label">Email:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $registro_usr[2];?>" required />
              </div>
            </div>

            <div class="form-group row">
              <label for="cpf" class="col-sm-2 col-form-label">CPF:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $registro_usr[3];?>" required />
              </div>
            </div>
        
            <div class="form-group row">
              <label for="telefone_contato" class="col-sm-2 col-form-label">Telefone:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $registro_usr[4];?>" required />
              </div>
            </div>
            
            <div class="form-group row">
              <label for="tipo" class="col-sm-2 col-form-label">Profissão:</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="profissao" name="profissao" value="<?php echo $registro_usr[5];?>" required />
              </div>
            </div>
        
            <div class="form-group row">
              <label for="login" class="col-sm-2 col-form-label">Login:</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="login" name="login" value="<?php echo $registro_usr[6];?>" required />
              </div>
            </div>

            <div class="form-group row">
              <label for="senha" class="col-sm-2 col-form-label">Senha:</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $registro_usr[7];?>" required />
              </div>
            </div>

            <div class="form-group row">
              <label for="status" class="col-sm-2 col-form-label">Status:</label>
              <div class="col-sm-10">
                ATIVO
                <input type="hidden" name="status" value="A" />
              </div>
            </div>

            <div class="form-group row">
              <label for="foto" class="col-sm-2 col-form-label">Foto:</label>
              <div class="col-sm-10">
                <input type="file" class="form-control-file" id="foto" name="foto" value="<?php echo $registro_usr[9];?>" />
              </div>
            </div>

            <input type="submit" value="Alterar Funcionário" class="btn btn-primary"/>
        </form>

      <?php endif; ?>

    </div>
  </div>
</div>

<?php include_once 'rodape.php'; ?>
