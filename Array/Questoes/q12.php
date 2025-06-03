<?php $Titulo = "Questão 12"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/func.php'); ?>
        <?php
        $precosAntigos = array(
            '15.50', '22.00', '30.75', '8.99'
        );

        function porcento($n){
            return number_format(($n*1.1),'2','.','.');
        }

        $precosNovos = array_map('porcento', $precosAntigos);
        
        echo print_array($precosNovos);
        ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>