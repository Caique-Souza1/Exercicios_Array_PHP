<?php
session_start();
$Titulo = "Questão 16";
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php');

if (!isset($_SESSION['caracteresPermitidos'])) {
    $_SESSION['caracteresPermitidos'] = ['SEnha', '@', '123'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['adicionar'])) {
        $novoCaractere = trim(htmlspecialchars($_POST['novo_caractere'] ?? ''));
        if (!empty($novoCaractere)) {
            $_SESSION['caracteresPermitidos'][] = $novoCaractere;
        }
    }
    if (isset($_POST['limpar'])) {
        $_SESSION['caracteresPermitidos'] = [];
    }
    if (isset($_POST['gerar'])) {
        $senhas = implode('', $_SESSION['caracteresPermitidos']);
    }
}
?>

<div class="main-container">
    <form method="post">
        <h3>Gerador de Senhas</h3>
        <label for="novo_caractere">Adicionar Caractere:</label>
        <input type="text" name="novo_caractere" id="novo_caractere" required>
        <button type="submit" name="adicionar">Adicionar</button>
        <button type="submit" name="limpar">Limpar</button>
        <button type="submit" name="gerar">Gerar Senha</button>
    </form>

    <div style="margin-top: 20px;">
        <?php
        if (isset($senhas)) {
            echo "Senha: $senhas";
        } elseif (!empty($_SESSION['caracteresPermitidos'])) {
            echo "Caracteres disponíveis: " . implode(', ', $_SESSION['caracteresPermitidos']);
        } else {
            echo "Nenhum caractere adicionado.";
        }
        ?>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>