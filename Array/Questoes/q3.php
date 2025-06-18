<?php
session_start();
$Titulo = "Questão 3";
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php');
?>
<div class="main-container">
    <form method="post">
        <h3>Gestão de Estoque de Livros</h3>
        <label for="titulo">Informe o Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?= isset($_POST['titulo']) ? htmlspecialchars($_POST['titulo']) : '' ?>" required>
        
        <label for="categoria">Informe a Categoria:</label>
        <input type="text" name="categoria" id="categoria" value="<?= isset($_POST['categoria']) ? htmlspecialchars($_POST['categoria']) : '' ?>" required>
        
        <label for="ano">Informe o ano de Publicação:</label>
        <input type="number" name="ano" id="ano" value="<?= isset($_POST['ano']) ? htmlspecialchars($_POST['ano']) : '' ?>" required>
        
        <button type="submit" name="enviar">Enviar</button>
    </form>
    
    <?php
    if (!isset($_SESSION['livros'])) {
        $_SESSION['livros'] = [];
    }
    
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar'])){
        $novoTitulo = htmlspecialchars($_POST['titulo'] ?? '');
        $novaCategoria = htmlspecialchars($_POST['categoria'] ?? '');
        $novoAno = htmlspecialchars($_POST['ano'] ?? '');

        array_push($_SESSION['livros'],[
            'titulo' => $novoTitulo,
            'categoria' => $novaCategoria, 
            'ano' => $novoAno
        ]);
    }
    
    if (isset($_POST['remover']) && is_numeric($_POST['remover'])) {
        $index = (int)$_POST['remover'];
        if (isset($_SESSION['livros'][$index])) {
            unset($_SESSION['livros'][$index]);
            $_SESSION['livros'] = array_values($_SESSION['livros']);
        }
    }
    ?>
    
    <div class="livros-container">
        <h4>Livros Disponíveis:</h4>
        <?php if (empty($_SESSION['livros'])): ?>
            Nenhum livro cadastrado.
        <?php else: ?>
            <?php foreach ($_SESSION['livros'] as $index => $livro): ?>
                <div class="livro-item">
                    <strong>Título:</strong> <?= htmlspecialchars($livro['titulo']) ?><br>
                    <strong>Categoria:</strong> <?= htmlspecialchars($livro['categoria']) ?><br>
                    <strong>Ano de publicação:</strong> <?= htmlspecialchars($livro['ano']) ?><br>
                    
                    <form method="post">
                        <input type="hidden" name="remover" value="<?= $index ?>">
                        <button type="submit">Remover</button>
                    </form>
                </div><br>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>