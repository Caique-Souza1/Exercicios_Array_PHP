<?php $Titulo = "Questão 4"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php
        function Primo($x): bool {
            if ($x <= 1) 
                return false;
            if ($x == 2) 
                return true;
            if ($x % 2 == 0) 
                return false;
            
            for ($i = 3; $i <= sqrt($x); $i += 2) {
                if ($x % $i == 0) return false;
            }
            return true;
        }

        $numerosSorteados = array();
        for ($i = 0; $i < 10; $i++) {
            $num = rand(1,60);
            $numerosSorteados[] = [
                "num" => $num,
                "numPrimo" => primo($num) ? "É Primo" : "Não é Primo"
            ];
        }

        foreach ($numerosSorteados as $sort) {
            echo"Numero: $sort[num] $sort[numPrimo]<br>";
        }
        ?>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>