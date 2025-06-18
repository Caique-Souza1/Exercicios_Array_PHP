<?php
session_start();
$Titulo = "Questão 19";
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/func.php');

if (!isset($_SESSION['filaAtendimento'])) {
    $_SESSION['filaAtendimento'] = ['João Silva', 'Maria Santos', 'Pedro Costa'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['adicionar_inicio'])) {
        $novoNome = trim(htmlspecialchars($_POST['novo_nome'] ?? ''));
        if (!empty($novoNome)) {
            array_unshift($_SESSION['filaAtendimento'], $novoNome);
        }
    }
    if (isset($_POST['adicionar_fim'])) {
        $novoNome = trim(htmlspecialchars($_POST['novo_nome'] ?? ''));
        if (!empty($novoNome)) {
            array_push($_SESSION['filaAtendimento'], $novoNome);
        }
    }
    if (isset($_POST['atender'])) {
        array_shift($_SESSION['filaAtendimento']);
    }
    if (isset($_POST['limpar'])) {
        $_SESSION['filaAtendimento'] = [];
    }
}
?>

<div class="main-container">
    <form method="post">
        <h3>Gestão de Fila de Atendimento</h3>
        <label for="novo_nome">Nome do Cliente:</label>
        <input type="text" name="novo_nome" id="novo_nome" required>
        
        <button type="submit" name="adicionar_inicio">Adicionar no Início</button>
        <button type="submit" name="adicionar_fim">Adicionar no Fim</button>
        <button type="submit" name="atender">Atender Próximo</button>
        <button type="submit" name="limpar">Limpar Fila</button>
    </form>

    <div style="margin-top: 20px;">
        <h4>Fila Atual:</h4>
        <?php
        if (!empty($_SESSION['filaAtendimento'])) {
            echo print_array($_SESSION['filaAtendimento']);
        } else {
            echo "Fila vazia.";
        }
        ?>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>