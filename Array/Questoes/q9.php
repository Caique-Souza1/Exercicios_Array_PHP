<?php
session_start();
$Titulo = "Questão 9";
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php');

if (!isset($_SESSION['fontes'])) {
    $_SESSION['fontes'] = [
        'A' => ['101', '105', '102'],
        'B' => ['103', '101', '106']
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['adicionar_A'])) {
        $novoId = trim(htmlspecialchars($_POST['novo_id_A'] ?? ''));
        if (!empty($novoId) && !in_array($novoId, $_SESSION['fontes']['A'])) {
            $_SESSION['fontes']['A'][] = $novoId;
        }
    }
    
    if (isset($_POST['adicionar_B'])) {
        $novoId = trim(htmlspecialchars($_POST['novo_id_B'] ?? ''));
        if (!empty($novoId) && !in_array($novoId, $_SESSION['fontes']['B'])) {
            $_SESSION['fontes']['B'][] = $novoId;
        }
    }
}

$todosIds = array_merge($_SESSION['fontes']['A'], $_SESSION['fontes']['B']);
$todosIds = array_unique($todosIds);
?>

<div class="main-container">
    <h3>Consolidação de IDs de Usuários</h3>
    
    <div style="display: flex; gap: 20px; margin-bottom: 20px;">
        <div style="flex: 1;">
            <h4>Fonte A</h4>
            <form method="post">
                <label for="novo_id_A">Adicionar ID para Fonte A:</label>
                <input type="text" name="novo_id_A" id="novo_id_A" required>
                <button type="submit" name="adicionar_A">Adicionar</button>
            </form>
            <ul>
                <?php foreach ($_SESSION['fontes']['A'] as $id): ?>
                    <li><?= $id ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        
        <div style="flex: 1;">
            <h4>Fonte B</h4>
            <form method="post">
                <label for="novo_id_B">Adicionar ID para Fonte B:</label>
                <input type="text" name="novo_id_B" id="novo_id_B" required>
                <button type="submit" name="adicionar_B">Adicionar</button>
            </form>
            <ul>
                <?php foreach ($_SESSION['fontes']['B'] as $id): ?>
                    <li><?= $id ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    
    <div>
        <h4>IDs no Sistema (combinados e únicos):</h4>
        <?php
        if (empty($todosIds)) {
            echo "Nenhum ID cadastrado.";
        } else {
            foreach ($todosIds as $id) {
                echo "$id<br>";
            }
        }
        ?>
    </div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>