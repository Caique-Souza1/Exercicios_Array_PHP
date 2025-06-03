<?php $Titulo = "Questão 16"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php
        $caracteresPermitidos = array(
            'SEnha', '@', '123'
        );
        $senhas = implode('', $caracteresPermitidos);
        echo "Senha: $senhas";
        ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>