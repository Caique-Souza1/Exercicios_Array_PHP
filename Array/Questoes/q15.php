<?php $Titulo = "Questão 15"?>
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
            $melhor = max($resultados);
            echo"Aluno(a): $nome, Maior peso levantado: $melhor<br>";
        }
        ?>
</div>  

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>