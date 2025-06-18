<?php
session_start();
$Titulo = "Questão 5";
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php');

if (!isset($_SESSION['especiesObservadas'])) {
    $_SESSION['especiesObservadas'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {
    $novaEspecie = trim(htmlspecialchars($_POST['nova_especie'] ?? ''));
    if (!empty($novaEspecie)) {
        $_SESSION['especiesObservadas'][] = [$novaEspecie];
    }
}

$resultadoVerificacao = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verificar'])) {
    $especieVerificar = trim(htmlspecialchars($_POST['especie_verificar'] ?? ''));
    if (!empty($especieVerificar)) {
        $encontrado = false;
        foreach ($_SESSION['especiesObservadas'] as $especie) {
            if (strcasecmp($especie[0], $especieVerificar) === 0) {
                $encontrado = true;
                break;
            }
        }
        $resultadoVerificacao = $encontrado 
            ? "<div class='success'>Espécie '$especieVerificar' REGISTRADA!</div>" 
            : "<div class='error'>Espécie '$especieVerificar' NÃO REGISTRADA!</div>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['limpar'])) {
    $_SESSION['especiesObservadas'] = [];
    $resultadoVerificacao = '<div class="info">Lista de espécies foi reiniciada!</div>';
}
?>

<div class="main-container">
    <h3>Registro de Espécies Observadas</h3>
    
    <div class="form-container">
        <form method="post" class="form-section">
            <h4>Adicionar Nova Espécie</h4>
            <label for="nova_especie">Nome da Espécie:</label>
            <input type="text" name="nova_especie" id="nova_especie" required>
            <button type="submit" name="adicionar">Adicionar Espécie</button>
        </form>
        
        <form method="post" class="form-section">
            <h4>Verificar Espécie</h4>
            <label for="especie_verificar">Nome da Espécie:</label>
            <input type="text" name="especie_verificar" id="especie_verificar" required>
            <button type="submit" name="verificar">Verificar Espécie</button>
        </form>
        
        <form method="post" class="form-section">
            <h4>Gerenciamento</h4>
            <button type="submit" name="limpar">Limpar Todas as Espécies</button>
        </form>
    </div>

    <?= $resultadoVerificacao ?>
    
    <div class="resultado">
        <div class="especies">
            <h4>Todas as Espécies Registradas:</h4>
            <?php if (empty($_SESSION['especiesObservadas'])): ?>
                <p>Nenhuma espécie registrada ainda.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($_SESSION['especiesObservadas'] as $especies): ?>
                        <li><?= htmlspecialchars($especies[0]) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
        
        <div class="especies">
            <h4>Espécies Únicas Registradas:</h4>
            <?php 
            $especiesUnicas = array_unique($_SESSION['especiesObservadas'], SORT_REGULAR);
            if (empty($especiesUnicas)): ?>
                <p>Nenhuma espécie única registrada.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($especiesUnicas as $especie): ?>
                        <li><?= htmlspecialchars($especie[0]) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>