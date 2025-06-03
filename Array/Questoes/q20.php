<?php $Titulo = "Questão 20"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/func.php'); ?>
        <?php
        $inventario = array(
            'Notebook' => 20, 
            'Mouse' => 50,
            'Teclado' => 30
        );
        
        echo "Inventário da loja pré-atualização:<br>".print_array($inventario)."<br>";

        if(!array_key_exists("Monitor",$inventario))
            $inventario['Monitor'] = 15;

        if(array_key_exists("Notebook",$inventario))
            $inventario['Notebook'] += 5;

        echo "Inventário da loja pós-atualização:<br>".print_array($inventario);
        ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>