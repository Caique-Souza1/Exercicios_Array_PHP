<?php $Titulo = "Questão 8"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php
        $deckCartas = array(
            ("Dama de Paus"),
            ("Ás de Ouros"),
            ("7 de Copas"),
            ("10 de Espadas")
        );
        shuffle($deckCartas);
        foreach ($deckCartas as $Cartas) {
            echo"$Cartas <br>";
        }
        ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>