<?php
session_start();
$Titulo = "Questão 8";
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php');

if (!isset($_SESSION['deckCartas'])) {
    $_SESSION['deckCartas'] = [
        "Dama de Paus",
        "Ás de Ouros",
        "7 de Copas",
        "10 de Espadas"
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {
    $novaCarta = trim(htmlspecialchars($_POST['nova_carta'] ?? ''));
    if (!empty($novaCarta)) {
        $_SESSION['deckCartas'][] = $novaCarta;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['embaralhar'])) {
    shuffle($_SESSION['deckCartas']);
}
?>

<div class="main-container">
    <form method="post">
        <h3>Jogo de Cartas Digital</h3>
        
        <label for="nova_carta">Adicionar Nova Carta:</label>
        <input type="text" name="nova_carta" id="nova_carta">
        <button type="submit" name="adicionar">Adicionar Carta</button>
        
        <div style="margin-top: 10px;">
            <button type="submit" name="embaralhar">Embaralhar Cartas</button>
        </div>
    </form>

    <div style="margin-top: 20px;">
        <h4>Deck de Cartas:</h4>
        <?php
        foreach ($_SESSION['deckCartas'] as $carta) {
            echo "$carta<br>";
        }
        ?>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>