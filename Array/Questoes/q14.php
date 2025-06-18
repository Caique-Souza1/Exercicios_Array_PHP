<?php
session_start();
$Titulo = "Questão 14";
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php');

if (!isset($_SESSION['registrosTreino'])) {
    $_SESSION['registrosTreino'] = [
        ["Carlos", [50,80,65]],
        ["Maria", [15,20,10]],
        ["Yago", [20,30,25]]
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['adicionar'])) {
        $nome = trim(htmlspecialchars($_POST['nome'] ?? ''));
        $pesos = array_map('floatval', explode(',', $_POST['pesos']));
        
        if (!empty($nome) && !empty($pesos)) {
            $_SESSION['registrosTreino'][] = [$nome, $pesos];
        }
    }
    if (isset($_POST['limpar'])) {
        $_SESSION['registrosTreino'] = [];
    }
}
?>

<div class="main-container">
    <form method="post">
        <h3>Registros de Treino de Academia</h3>
        <label for="nome">Nome do Aluno:</label>
        <input type="text" name="nome" id="nome" required>
        
        <label for="pesos">Pesos Levantados (separados por vírgula):</label>
        <input type="text" name="pesos" id="pesos" placeholder="ex: 50,80,65" required>
        
        <button type="submit" name="adicionar">Adicionar</button>
        <button type="submit" name="limpar">Limpar</button>
    </form>

    <div style="margin-top: 20px;">
        <h4>Registro de Alunos:</h4>
        <?php
        foreach ($_SESSION['registrosTreino'] as $aluno) {
            $nome = $aluno[0];
            $resultados = $aluno[1];
            $media = number_format(array_sum($resultados) / count($resultados), 2);
            echo "Aluno(a): $nome, Média de peso levantado: $media<br>";
        }
        ?>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>