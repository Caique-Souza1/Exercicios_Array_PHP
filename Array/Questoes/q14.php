<?php $Titulo = "Questão 14"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php
        $registrosTreino = array(
            ["Carlos", [50,80,65]],
            ["Maria", [15,20,10]],
            ["Yago", [20,30,25]],

        );
        echo "Registro de Alunos:<br>";
        foreach ($registrosTreino as $aluno) {
            $nome = $aluno[0];
            $resultados = $aluno[1];
            $media = number_format(array_sum($resultados)/ count($resultados),2);

            echo"Aluno(a): $nome, Média de peso levantado: $media<br>";
        }
        ?>
</div>  

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>