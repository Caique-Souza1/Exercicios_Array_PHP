<?php
session_start();
$Titulo = "Questão 12";
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/func.php');

if (!isset($_SESSION['precosAntigos'])) {
    $_SESSION['precosAntigos'] = ['15.50', '22.00', '30.75', '8.99'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['adicionar'])) {
        $novoPreco = trim(htmlspecialchars($_POST['novo_preco'] ?? ''));
        if (!empty($novoPreco)) {
            $_SESSION['precosAntigos'][] = $novoPreco;
        }
    }
    if (isset($_POST['limpar'])) {
        $_SESSION['precosAntigos'] = [];
    }
}

function porcento($n) {
    return number_format(($n * 1.1), 2, '.', '.');
}
?>

<div class="main-container">
    <form method="post">
        <h3>Aumento de Preços</h3>
        <label for="novo_preco">Adicionar Preço:</label>
        <input type="number" step="0.01" name="novo_preco" id="novo_preco" required>
        <button type="submit" name="adicionar">Adicionar</button>
        <button type="submit" name="limpar">Limpar</button>
    </form>

    <div style="margin-top: 20px;">
        <?php
        if (!empty($_SESSION['precosAntigos'])) {
            $precosNovos = array_map('porcento', $_SESSION['precosAntigos']);
            echo "Preços com Ajuste:<br>" . print_array($precosNovos);
        } else {
            echo "Nenhum preço cadastrado.";
        }
        ?>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>