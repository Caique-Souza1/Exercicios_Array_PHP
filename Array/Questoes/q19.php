<?php $Titulo = "Questão 19"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/func.php'); ?>
        <?php
        $filaAtendimento= array(
            'João Silva', 'Maria Santos', 'Pedro Costa'
        );

        echo "Fila:<br>".print_array($filaAtendimento)."<br>";
        array_unshift($filaAtendimento, "Ana Oliveira");
        echo "Fila:<br>".print_array($filaAtendimento)."<br>";

        array_push($filaAtendimento,"Luiz Fernandes");
        echo "Fila:<br>".print_array($filaAtendimento)."<br>";
        
        ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>