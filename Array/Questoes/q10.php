<?php
session_start();
$Titulo = "Questão 10";
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php');

if (!isset($_SESSION['listaParticipantes'])) {
    $_SESSION['listaParticipantes'] = ['Carlos', 'Ana', 'João', 'Maria', 'Pedro', 'Maria', 'Ana'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {
    $novoParticipante = trim(htmlspecialchars($_POST['novo_participante'] ?? ''));
    if (!empty($novoParticipante)) {
        $_SESSION['listaParticipantes'][] = $novoParticipante;
    }
}
?>

<div class="main-container">
    <form method="post">
        <h3>Registro de Presenças em Eventos</h3>
        <label for="novo_participante">Adicionar Participante:</label>
        <input type="text" name="novo_participante" id="novo_participante" required>
        <button type="submit" name="adicionar">Adicionar</button>
    </form>

    <div style="margin-top: 20px;">
        <h4>Participantes Únicos:</h4>
        <?php
        $Participantes = array_unique($_SESSION['listaParticipantes']);
        foreach ($Participantes as $part) {
            echo "$part<br>";
        }
        ?>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>