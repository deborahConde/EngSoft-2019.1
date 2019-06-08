<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Visualizar Produto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="publico/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="publico/css/estilo.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<?php
include "header.php";
?>

<body>
    <script language="JavaScript">
        function deletarProduto(id) {
            fetch(`./deletarProduto.php?id=${id}`)
                .then(window.location.reload())
                .catch(console.error);
        }
    </script>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Desconto</th>
                <th>Fabricante</th>
                <th>Setor</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                include_once("conexao.php"); /* Estabelece a conexão */
                $sql = "SELECT * FROM produto";
                $resultado = mysqli_query($conexao, $sql);
                if (mysqli_num_rows($resultado) > 0) {
                    /* Dados de saída de cada linha */
                    while ($linha = mysqli_fetch_assoc($resultado)) {
                        echo "<tr><td>" . $linha["nome"] .
                            "</td><td>" . $linha["preco"] .
                            "</td><td>" . $linha["desconto"] .
                            "</td><td>" . $linha["quantidade"] .
                            "</td><td>" . $linha["fabricante"] .
                            "</td><td>" . $linha["setor"] .
                            "</td><td>" .
                           "<a href=\"./editarProduto.php?id=$linha[id]\"><i class=\"fas fa-pencil-alt\"></i></a>" .
                            "<a href=\"javascript:deletarProduto('$linha[id]')\"><i class=\"fas fa-trash\"></i></a>" .
                            "</td></tr>";
                    }
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