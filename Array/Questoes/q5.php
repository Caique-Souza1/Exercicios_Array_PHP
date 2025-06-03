<?php $Titulo = "Questão 5"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php
        $especiesObservadas = array(
            ["Beija-flor"],
            ["Canário"],
            ["Bem-te-vi"],
            ["Sabiá"],
            ["Coruja"],
            ["Beija-flor"]
        );
        echo"Especies registradas:<br>";
        foreach ($especiesObservadas as $especies) {
            $sp = $especies[0];
            echo "$sp<br>";
        }

        if(in_array(array("Pardal"), $especiesObservadas)){
            echo "<br>Especie registrada<br><br>";
        } else {
            echo "<br>Especie não registrada<br><br>";
        }

        echo"Especies registradas:<br>";
        $especiesRegistradas = array_unique($especiesObservadas, SORT_REGULAR);
        foreach ($especiesRegistradas as $especiesRegi) {
            $sp = $especiesRegi[0];
            echo "$sp<br>";
        }
        ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>