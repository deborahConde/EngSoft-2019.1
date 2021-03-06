<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Visualizar Usuário</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="publico/css/bootstrap.min.css" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="publico/css/estilo.css">
    </head>

    <?php
        include "header.php";
    ?>

    <body>

        <!-- Formulário de Login -->
        <form action="validacao.php" method="post">
        <fieldset>
        <legend>Dados de Login</legend>
            <label for="email">Usuário</label>
            <input type="text" name="email" id="email" maxlength="25" />
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" />
            
            <input type="submit" value="Entrar" />
        </fieldset>
        </form>
    </body>


    <?php
        include "footer.php";
    ?>

</html>