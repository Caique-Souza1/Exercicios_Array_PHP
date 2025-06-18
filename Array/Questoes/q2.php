<?php 
session_start();
$Titulo = "Questão 2";
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); 
?>
<div class="main-container">
    <form method="post">
        <h3>Boletim Escolar</h3>
        <label for="disciplina">Disciplina: </label>
        <input type="text" name="disciplina" id="disciplina" required>

        <label for="nota">Nota: </label>
        <input type="number" name="nota" id="nota" required>

        <button type="submit" name="enviar">Enviar</button>
    </form>
    <?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])) {
        $novaDisciplina = htmlspecialchars($_POST['disciplina']);
        $novaNota = (float) $_POST['nota'];

        $_SESSION['boletim'][] = [$novaDisciplina, $novaNota];
    }
    
    foreach ($_SESSION['boletim'] as $bole) {
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