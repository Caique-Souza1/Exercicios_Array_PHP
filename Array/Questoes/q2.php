<?php $Titulo = "Questão 2"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php
        $boletim = array(
            ["Matemática", 5],
            ["Geografia", 8],
            ["História", 2]
        );
        foreach ($boletim as $bole) {
            $disciplina = $bole[0];
            $nota = $bole[1];
            if($nota >= 7){
                echo"Disciplina: $disciplina<br>Nota: $nota<br>Aluno Aprovado!<br><br>";
            } else {
                echo"Disciplina: $disciplina<br>Nota: $nota<br>Aluno Reprovado!<br><br>";
            }
        }
        
        ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>