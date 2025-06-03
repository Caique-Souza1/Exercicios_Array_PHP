<?php $Titulo = "Questão 18"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/func.php'); ?>
        <?php
        $dadosSensor = array(
            15.2, 28.9, 12.0, 35.5, 20.1, 40.0, 5.8
        );
        
        function filtragem($n){
            if ($n > 25) 
                return $n;
        }

        $filtrado = array_filter($dadosSensor, 'filtragem');
        echo print_array($filtrado);
        ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>