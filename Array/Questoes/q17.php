<?php $Titulo = "Questão 17"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php
        $textoAnalise = "A programação PHP é fundamental para o desenvolvimento web";

        $texto = count(explode(" ", $textoAnalise));
        
        echo"String: '$textoAnalise'<br>";
        echo "Quantidade de elementos na string: $texto";
        ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>