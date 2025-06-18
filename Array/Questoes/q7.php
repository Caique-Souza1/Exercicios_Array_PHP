<?php 
$Titulo = "Questão 7";
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); 

if (!isset($_SESSION['produtos'])) {
    $_SESSION['produtos'] = [];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])){
    $novoProduto = htmlspecialchars($_POST['produto'] ?? '');
    $novoPreco = htmlspecialchars($_POST['preco'] ?? '');

    if (!empty($novoProduto) && !empty($novoPreco)) {
        $_SESSION['produtos'][] = [
            'produto' => $novoProduto,
            'preco' => $novoPreco
        ];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['limpar'])) {
    $_SESSION['produtos'] = [];
}

$produtos = $_SESSION['produtos'];
?>
<div class="main-container">
    <form method="post">
        <h3>Precificação de Produtos</h3>
        <label for="produto">Informe o nome do Produto:</label>
        <input type="text" name="produto" id="produto" required>
        
        <label for="preco">Informe o Preço do Produto:</label>
        <input type="number" name="preco" id="preco" step="0.01" min="0" required>
        
        <button type="submit" name="enviar">Enviar</button>

        <form method="post" class="form-section">
            <h4>Gerenciamento</h4>
            <button type="submit" name="limpar">Limpar Tudo</button>
        </form>
    </form>
    
    <div style="margin-top: 20px;">
        <?php
        usort($produtos, function($a, $b) {
            return $a['preco'] <=> $b['preco'];
        });
        
        if (empty($produtos)) {
            echo "Nenhum produto cadastrado.";
        } else {
            foreach ($produtos as $prod) {
                $nome = htmlspecialchars($prod['produto']);
                $preco = number_format($prod['preco'], 2, ',', '.');
                echo "Produto: $nome<br>Preço: R$ $preco<br><br>";
            }
        }
        ?>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>