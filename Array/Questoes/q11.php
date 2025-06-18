<?php
session_start();
$Titulo = "Questão 11";
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php');

if (!isset($_SESSION['temperaturas'])) {
    $_SESSION['temperaturas'] = ['15', '-10', '25', '20', '10', '32', '28', '7'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['adicionar'])) {
        $novaTemp = trim(htmlspecialchars($_POST['nova_temp'] ?? ''));
        if (!empty($novaTemp)) {
            $_SESSION['temperaturas'][] = $novaTemp;
        }
    }
    if (isset($_POST['limpar'])) {
        $_SESSION['temperaturas'] = [];
    }
}
?>

<div class="main-container">
    <form method="post">
        <h3>Monitoramento de Sensores</h3>
        <label for="nova_temp">Adicionar Temperatura:</label>
        <input type="number" name="nova_temp" id="nova_temp" required>
        <button type="submit" name="adicionar">Adicionar</button>
        <button type="submit" name="limpar">Limpar</button>
    </form>

    <div style="margin-top: 20px;">
        <?php
        if (!empty($_SESSION['temperaturas'])) {
            $maxTemp = max($_SESSION['temperaturas']);
            $minTemp = min($_SESSION['temperaturas']);
            echo "Temperatura mais alta: $maxTemp<br>Temperatura mais baixa: $minTemp";
        } else {
            echo "Nenhuma temperatura registrada.";
        }
        ?>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>