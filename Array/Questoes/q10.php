<?php $Titulo = "Questão 10"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php
        $listaParticipantes = array(
            'Carlos', 'Ana', 'João', 'Maria', 'Pedro', 'Maria', 'Ana'
        );
        $Participantes = array_unique($listaParticipantes);
        foreach ($Participantes as $part) {
            echo"$part<br>";
        }
        ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>