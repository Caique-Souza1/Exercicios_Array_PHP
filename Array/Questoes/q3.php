<?php $Titulo = "Questão 3"?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/header.php'); ?>

<div class="main-container">
        <?php
        $livros = array(
            ["Interstelar", "Ficção", 2025],
            ["Romeo e Julieta", "Romance", 2015],
            ["3 Porquinhos", "Infantil", 2005]
        );
        
        echo"Livros Disponíveis:<br>";
        foreach ($livros as $livro) {
            $titulo = $livro[0];
            $categoria = $livro[1];
            $ano = $livro[2];
            echo"Titulo: $titulo<br>
            Categoria: $categoria<br>
            Ano de publicação: $ano<br><br>";
        }

        array_push($livros, ["Maze Runner", "Ficção", 2010]);
        array_splice( $livros,0,1);

        echo"Livros Disponíveis:<br>";
        foreach ($livros as $livro) {
            $titulo = $livro[0];
            $categoria = $livro[1];
            $ano = $livro[2];
            echo"Titulo: $titulo<br>
            Categoria: $categoria<br>
            Ano de publicação: $ano<br><br>";
        }
        ?>  
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/Array/auxiliares/footer.php'); ?>