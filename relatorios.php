<?php
session_start();
$_SESSION['active'] = 'rel';
?>
<?php include_once 'topo_restrito.php'; ?>

    <div class="container">
        <div class="row justify-content-center">            
            <div class="col-4">
            	<h1 class="text-center">MENU</h1>
                <div class="list-group" id="menu_restrito">
				    <a href="administracao.php" class="list-group-item list-group-item-action <?php echo ($_SESSION['active'] == 'admin')?'active':'';?>">
				        Administração
				    </a>
				    <a href="rel_funcionario.php" class="list-group-item list-group-item-action <?php echo ($_SESSION['active'] == 'rel_func')?'active':'';?>">Relatório de Funcionários</a>
				    <a href="rel_estoque.php" class="list-group-item list-group-item-action <?php echo ($_SESSION['active'] == 'rel_estoq')?'active':'';?>">Relatório de motos em estoque</a>
				    <a href="rel_total_vendas.php" class="list-group-item list-group-item-action <?php echo ($_SESSION['active'] == 'rel_fatur')?'active':'';?>">Faturamento total do mês</a>				
				    <a href="rel_vendas.php" class="list-group-item list-group-item-action <?php echo ($_SESSION['active'] == 'rel_vend')?'active':'';?>">Relatório de Vendas </a>				
				</div>

            </div>
            
        </div>    
    </div>

<?php include_once 'rodape.php' ?>