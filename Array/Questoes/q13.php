<?php
session_start();
$Titulo = "Questão 13";
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php');

if (!isset($_SESSION['despesasMensais'])) {
    $_SESSION['despesasMensais'] = ['1200.50', '850.75', '1500.00', '920.30', '1100.20'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['adicionar'])) {
        $novaDespesa = trim(htmlspecialchars($_POST['nova_despesa'] ?? ''));
        if (!empty($novaDespesa)) {
            $_SESSION['despesasMensais'][] = $novaDespesa;
        }
    }
    if (isset($_POST['limpar'])) {
        $_SESSION['despesasMensais'] = [];
    }
}
?>

<div class="main-container">
    <form method="post">
        <h3>Média de Despesas Mensais</h3>
        <label for="nova_despesa">Adicionar Despesa:</label>
        <input type="number" step="0.01" name="nova_despesa" id="nova_despesa" required>
        <button type="submit" name="adicionar">Adicionar</button>
        <button type="submit" name="limpar">Limpar</button>
    </form>

    <div style="margin-top: 20px;">
        <?php
        if (!empty($_SESSION['despesasMensais'])) {
            $despesas = array_sum($_SESSION['despesasMensais']) / count($_SESSION['despesasMensais']);
            echo "Média das despesas mensais: " . number_format($despesas, 2, ',', '.');
        } else {
            echo "Nenhuma despesa cadastrada.";
        }
        ?>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>