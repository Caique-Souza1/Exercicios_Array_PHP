<?php $Titulo = "Questão 6"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php
        $categoriasProdutos = array(
            ["Roupa"],
            ["Alimento"],
            ["Periférico"],
            ["Acessório"],
            ["Eletrodoméstico"],
        );
        echo "Array original:<br>";
        foreach ($categoriasProdutos as $cat) {
            $categoria = $cat[0];
            echo"Categoria: $categoria<br>";
        }
        sort($categoriasProdutos);
        echo"<br>Array em ordem alfabética crescente:<br>";
        foreach ($categoriasProdutos as $cat) {
            $categoria = $cat[0];
            echo"Categoria: $categoria<br>";
        }

        rsort($categoriasProdutos);
        echo"<br>Array em ordem alfabética decrescente:<br>";
        foreach ($categoriasProdutos as $cat) {
            $categoria = $cat[0];
            echo"Categoria: $categoria<br>";
        }
        ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>