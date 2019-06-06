<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Exibir Usuário</title>
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

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Tipo</th>
                </thead>
                <tbody>
                    <?php
                        include_once("conexao.php");/* Estabelece a conexão */
                        $sql = "SELECT * FROM usuarios ORDER BY Nome ASC";
                        $resultado = mysqli_query($conexao, $sql);
                        if (mysqli_num_rows($resultado) > 0) {
                            /* Dados de saída de cada linha */
                            while($linha = mysqli_fetch_assoc($resultado)) {
                                echo "<tr><td>" . $linha["nome"].  "</td><td>" . $linha["email"] . "</td><td>" . $linha["tipo"] . "</td></tr>";
                            }
                        } else {
                            echo "0 results";
                        }
                        mysqli_close($conexao);
                    ?>
                </tbody>

            </table>

        </div>




    </body>

    <?php
        include "footer.php";
    ?>

</html>