<?php $Titulo = "Questão 11"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php
        $temperaturas = array(
            '15', '-10', '25', '20', '10', '32', '28', '7'
        );
        $maxTemp = max($temperaturas);
        $minTemp = min($temperaturas);
        
        echo "Temperatura mais alta: $maxTemp <br>Temperatura mais baixa: $minTemp";
        ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>