                                
<div class="list-group" id="menu_restrito">
    <a href="administracao.php" class="list-group-item list-group-item-action <?php echo ($_SESSION['active'] == 'admin')?'active':'';?>">
        Administração
    </a>
    <a href="lista_moto.php" class="list-group-item list-group-item-action <?php echo ($_SESSION['active'] == 'moto')?'active':'';?>">Motos</a>
    <a href="lista_func.php" class="list-group-item list-group-item-action <?php echo ($_SESSION['active'] == 'func')?'active':'';?>">Funcionários</a>
    <a href="vendas.php" class="list-group-item list-group-item-action <?php echo ($_SESSION['active'] == 'vend')?'active':'';?>">Vendas</a>
    <a href="relatorios.php" class="list-group-item list-group-item-action <?php echo ($_SESSION['active'] == 'rel')?'active':'';?>">Relatórios</a>    
</div>
