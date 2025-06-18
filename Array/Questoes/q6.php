<?php
session_start();
$Titulo = "Questão 6";
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php');

if (!isset($_SESSION['categoriasProdutos'])) {
    $_SESSION['categoriasProdutos'] = [
        ["Roupa"],
        ["Alimento"],
        ["Periférico"],
        ["Acessório"],
        ["Eletrodoméstico"]
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {
    $novaCategoria = trim(htmlspecialchars($_POST['nova_categoria'] ?? ''));
    if (!empty($novaCategoria)) {
        $_SESSION['categoriasProdutos'][] = [$novaCategoria];
    }
}

$ordenacao = $_GET['ordenacao'] ?? '';
$categoriasExibicao = $_SESSION['categoriasProdutos'];

if ($ordenacao === 'crescente') {
    sort($categoriasExibicao);
} elseif ($ordenacao === 'decrescente') {
    rsort($categoriasExibicao);
}
?>

<div class="main-container">
    <form method="post">
        <h3>Gerenciamento de Categorias</h3>
        <label for="nova_categoria">Adicionar Nova Categoria:</label>
        <input type="text" name="nova_categoria" id="nova_categoria" required>
        <button type="submit" name="adicionar">Adicionar</button>
    </form>

        <a href="?ordenacao=">Ver Original</a>
        <a href="?ordenacao=crescente">Ordenar Crescente</a> 
        <a href="?ordenacao=decrescente">Ordenar Decrescente</a>

    <?php
    echo "<h4>Array " . match($ordenacao) {
        'crescente' => 'em ordem alfabética crescente',
        'decrescente' => 'em ordem alfabética decrescente',
        default => 'original'
    } . ":</h4>";
    
    foreach ($categoriasExibicao as $cat) {
        $categoria = $cat[0];
        echo "Categoria: $categoria<br>";
    }
    ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>