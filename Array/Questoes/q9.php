<?php $Titulo = "Questão 9"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php
        $idsFonteA = array(
            '101', '105', '102'
        );
        $idsFonteB = array(
            '103', '101', '106'
        );

        $todosIds = array_merge($idsFonteA, $idsFonteB);
        $todosIds = array_unique($todosIds);
        echo "IDs no Sistema:<br><br>";
        foreach ($todosIds as $ids) {
            echo"$ids<br>";
        }
        ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>