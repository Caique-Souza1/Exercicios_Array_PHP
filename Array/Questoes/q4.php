<?php
$Titulo = "Questão 4";
include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php');
?>

<div class="main-container">
    <form method="post">
        <h3>Gerador de Números Primos</h3>
        
        <label for="quantidade">Quantidade de números:</label>
        <input type="number" name="quantidade" id="quantidade" 
               min="1" max="100" value="<?= $_POST['quantidade'] ?? 10 ?>" required>
        
        <label for="min">Valor mínimo:</label>
        <input type="number" name="min" id="min" 
               min="1" value="<?= $_POST['min'] ?? 1 ?>" required>
        
        <label for="max">Valor máximo:</label>
        <input type="number" name="max" id="max" 
               min="2" value="<?= $_POST['max'] ?? 60 ?>" required>
        
        <button type="submit" name="gerar">Gerar Números</button>
    </form>
    
    <?php
    function Primo($x): bool {
        if ($x <= 1) return false;
        if ($x == 2) return true;
        if ($x % 2 == 0) return false;
        
        for ($i = 3; $i <= sqrt($x); $i += 2) {
            if ($x % $i == 0) return false;
        }
        return true;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['gerar'])) {
        $quantidade = (int)($_POST['quantidade'] ?? 10);
        $min = (int)($_POST['min'] ?? 1);
        $max = (int)($_POST['max'] ?? 60);
        
        if ($min >= $max) {
            echo "<div class='error'>O valor mínimo deve ser menor que o máximo!</div>";
        } else {
            $numerosSorteados = [];
            for ($i = 0; $i < $quantidade; $i++) {
                $num = rand($min, $max);
                $numerosSorteados[] = [
                    "num" => $num,
                    "numPrimo" => primo($num) ? "É Primo" : "Não é Primo",
                    "classe" => primo($num) ? "primo" : "nao-primo"
                ];
            }

            echo "<div class='resultados'>";
            echo "<h4>Números Gerados:</h4>";
            foreach ($numerosSorteados as $sort) {
                echo "<div class='numero {$sort['classe']}'>";
                echo "Número: {$sort['num']} - <strong>{$sort['numPrimo']}</strong>";
                echo "</div>";
            }
            echo "</div>";
        }
    }
    ?>
</div>



<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>