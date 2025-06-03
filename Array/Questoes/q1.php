<?php $Titulo = "Questão 1"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php
        $produtos = array(
            ["Celular", 1],
            ["Impressora", 2],
            ["Tablet", 3],
        );
        
        foreach ($produtos as $produto) {
            $nome = $produto[0];
            $code = $produto[1];
            echo"Nome do produto: $nome<br>Código do produto: $code<br><br>";
        }
        ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>