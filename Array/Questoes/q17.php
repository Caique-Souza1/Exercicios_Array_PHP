<?php
session_start();
$Titulo = "Questão 17";
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php');

if (!isset($_SESSION['textos'])) {
    $_SESSION['textos'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['analisar'])) {
    $novoTexto = trim(htmlspecialchars($_POST['novo_texto'] ?? ''));
    if (!empty($novoTexto)) {
        $_SESSION['textos'][] = $novoTexto;
    }
}
?>

<div class="main-container">
    <form method="post">
        <h3>Análise de Frases</h3>
        <label for="novo_texto">Digite um texto:</label>
        <textarea name="novo_texto" id="novo_texto" required></textarea>
        <button type="submit" name="analisar">Analisar</button>
    </form>

    <div style="margin-top: 20px;">
        <?php
        if (!empty($_SESSION['textos'])) {
            $ultimoTexto = end($_SESSION['textos']);
            $palavras = count(explode(" ", $ultimoTexto));
            echo "String: '$ultimoTexto'<br>";
            echo "Quantidade de palavras: $palavras";
        }
        ?>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>