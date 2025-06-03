<?php $Titulo = "Questão 13"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php
        $despesasMensais = array(
            '1200.50', '850.75', '1500.00', '920.30', '1100.20'
        );
        $despesas = array_sum($despesasMensais)/count(array_keys($despesasMensais));
        echo "Média das despesas mensais: $despesas";
        ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>