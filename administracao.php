<?php
session_start();
$_SESSION['active'] = 'admin';
?>
<?php include_once 'topo_restrito.php'; ?>

    <div class="container">
        <div class="row justify-content-center">            
            <div class="col-4">
            	<h1 class="text-center">MENU</h1>
                <?php include_once 'menu_restrito.php';?>
            </div>
            
        </div>    
    </div>

<?php include_once 'rodape.php' ?>