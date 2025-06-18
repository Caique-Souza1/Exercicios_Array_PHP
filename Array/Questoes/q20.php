<?php
session_start();
$Titulo = "Questão 20";
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/func.php');

if (!isset($_SESSION['inventario'])) {
    $_SESSION['inventario'] = [
        'Notebook' => 20, 
        'Mouse' => 50,
        'Teclado' => 30
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['adicionar'])) {
        $item = trim(htmlspecialchars($_POST['item'] ?? ''));
        $quantidade = (int)($_POST['quantidade'] ?? 0);
        
        if (!empty($item) && $quantidade > 0) {
            if (isset($_SESSION['inventario'][$item])) {
                $_SESSION['inventario'][$item] += $quantidade;
            } else {
                $_SESSION['inventario'][$item] = $quantidade;
            }
        }
    }
    if (isset($_POST['limpar'])) {
        $_SESSION['inventario'] = [];
    }
}
?>

<div class="main-container">
    <form method="post">
        <h3>Sistema de Inventário</h3>
        <label for="item">Item:</label>
        <input type="text" name="item" id="item" required>
        
        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" id="quantidade" min="1" required>
        
        <button type="submit" name="adicionar">Adicionar/Atualizar</button>
        <button type="submit" name="limpar">Limpar Inventário</button>
    </form>

    <div style="margin-top: 20px;">
        <h4>Inventário Atual:</h4>
        <?php
        if (!empty($_SESSION['inventario'])) {
            echo print_array($_SESSION['inventario']);
        } else {
            echo "Inventário vazio.";
        }
        ?>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>