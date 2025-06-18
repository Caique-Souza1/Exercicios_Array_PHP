<?php
session_start();
$Titulo = "Questão 18";
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/func.php');

if (!isset($_SESSION['dadosSensor'])) {
    $_SESSION['dadosSensor'] = [15.2, 28.9, 12.0, 35.5, 20.1, 40.0, 5.8];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['adicionar'])) {
        $novoDado = trim(htmlspecialchars($_POST['novo_dado'] ?? ''));
        if (!empty($novoDado) && is_numeric($novoDado)) {
            $_SESSION['dadosSensor'][] = (float)$novoDado;
        }
    }
    if (isset($_POST['limpar'])) {
        $_SESSION['dadosSensor'] = [];
    }
}

function filtragem($n) {
    if ($n > 25) return $n;
}
?>

<div class="main-container">
    <form method="post">
        <h3>Filtragem de Dados de Sensor</h3>
        <label for="novo_dado">Adicionar Leitura:</label>
        <input type="number" step="0.1" name="novo_dado" id="novo_dado" required>
        <button type="submit" name="adicionar">Adicionar</button>
        <button type="submit" name="limpar">Limpar</button>
    </form>

    <div style="margin-top: 20px;">
        <?php
        if (!empty($_SESSION['dadosSensor'])) {
            $filtrado = array_filter($_SESSION['dadosSensor'], 'filtragem');
            echo "Dados filtrados (>25):<br>" . print_array($filtrado);
        } else {
            echo "Nenhum dado registrado.";
        }
        ?>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>