<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= $Titulo ?></title>
    <link rel="stylesheet" href="style.css">
    <tittle>
    <div class= "cabeca">
        <h2><?= $Titulo ?></h2>
    </div>
    <style>
        .cabeca{
        background-color: #333;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        width: 100%;
        }

        h2{
            color: white;
            font-size: 20px;
        }
    </style>
    </tittle>

    <nav class = "voltar">
        <a href="/Array/index.php">🏠︎</a>
    </nav>

    <style>
        .voltar {
            font-family: 'Segoe UI', sans-serif;
            width: 70px;
            height: 30px;
            border-radius: 5px;
            position: fixed;
            top: 0;
            left: 0;
            margin-top: 9px;
            margin-left: 15px;  
            align-content: center;
        }

        .voltar a{
            text-decoration: none;
            color: #fff;
            transition: color 0.3s;
            font-size: 30px;
        }

        .voltar a:hover{
            color:rgb(7, 116, 184);
        }
    </style>
</head>
<body>                                                                                                  