<?php 
session_start();
$Titulo = "Questão 1";
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); 
?>

<div class="main-container">
    <form method="POST">
        <h3>Adicionar Novo Produto</h3>
        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="codigo">Código do Produto:</label>
        <input type="number" id="codigo" name="codigo" min="1" required>

        <button type="submit" name="adicionar">Adicionar</button>
    </form>

    <?php 
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {
        $novoNome = htmlspecialchars($_POST['nome']);
        $novoCodigo = (int)$_POST['codigo'];
        
        $_SESSION['produtos'][] = [$novoNome, $novoCodigo];
    }
    
    foreach ($_SESSION['produtos'] as $produto) {
        $nome = $produto[0];
        $code = $produto[1];
        echo "<div class='item'>";
        echo "<strong>Nome do produto:</strong> $nome<br>";
        echo "<strong>Código do produto:</strong> $code<br>";
        echo "</div>";
    }
    ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>