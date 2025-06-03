<?php $Titulo = "Questão 7"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php
        $precosProdutos = array(
            ["Impressora", 2000],
            ["Tablet", 2500],
            ["Celular", 5200],
        );
        asort($precosProdutos);
        foreach ($precosProdutos as $produtos) {
            $nome = $produtos[0];
            $preco = $produtos[1];
            echo"Produto: $nome<br>Preço: R$ $preco<br><br>";
        }
        ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>