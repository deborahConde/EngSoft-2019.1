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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<?php
include "header.php";
?>

<body>
    <script language="JavaScript">
        function deletarUsuario(cpf) {
            fetch(`./deletarUsuario.php?cpf=${cpf}`)
                .then(window.location.reload())
                .catch(console.error);
        }
    </script>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-light">
                <th>Vendedor</th>
                <th>Cliente</th>
                <th>Valor Total</th>
                <th>Data</th>
                <th>Produtos</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th></th>
            </thead>
            <tbody>
                <?php
                include_once("conexao.php"); /* Estabelece a conexão */
                $sqlVenda = "SELECT * FROM venda";
                $resultadoVenda = mysqli_query($conexao, $sqlVenda);
                if (mysqli_num_rows($resultadoVenda) > 0) {
                    /* Dados de saída de cada linha */
                    while ($linhaVenda = mysqli_fetch_assoc($resultadoVenda)) {
                        /*Dados de Funcionario*/
                        $sqlFuncionario = "SELECT * FROM funcionarios WHERE id='$linhaVenda[id_funcionario]'";
                        $resultadoFuncionario = mysqli_query($conexao, $sqlFuncionario);
                        $linhaFuncionario = mysqli_fetch_assoc($resultadoFuncionario);
                        /*Dados de Funcionario(tabela Usuario)*/
                        $sqlUsuario = "SELECT * FROM usuarios WHERE cpf='$linhaFuncionario[cpf]'";
                        $resultadoUsuario = mysqli_query($conexao, $sqlUsuario);
                        $linhaUsuario = mysqli_fetch_assoc($resultadoUsuario);
                        /*Dados de Cliente*/
                        $sqlCliente = "SELECT * FROM clientes WHERE cpf='$linhaVenda[id_cliente]'";
                        $resultadoCliente = mysqli_query($conexao, $sqlCliente);
                        $linhaCliente = mysqli_fetch_assoc($resultadoCliente);
                        /*Dados de ProdutoVenda*/
                        $sqlVendaProduto = "SELECT * FROM vendaproduto WHERE id_venda='$linhaVenda[id]'";
                        $resultadoVendaProduto = mysqli_query($conexao, $sqlVendaProduto);
                        $linhaVendaProduto = mysqli_fetch_assoc($resultadoVendaProduto);
                        /*Dados de Produto*/
                        $sqlProduto = "SELECT * FROM produto WHERE id='$linhaVendaProduto[id_produto]'";
                        $resultadoProduto = mysqli_query($conexao, $sqlProduto);
                        $linhaProduto = mysqli_fetch_assoc($resultadoProduto);

                        echo "<tr><td>" . $linhaUsuario["nome"] .
                            "</td><td>" . $linhaCliente["nome"] .
                            "</td><td>" . $linhaVenda["valor_total"] .
                            "</td><td>" . $linhaVenda["data"] .
                            "</td><td>" . $linhaProduto["nome"] .
                            "</td><td>" . $linhaVendaProduto["quantidade"] .
                            "</td><td>" . $linhaVendaProduto["preco"].
                            "</td><td>" .
                           "<a href=\"./editarUsuario.php?cpf=$linhaVenda[id]\"><i class=\"fas fa-pencil-alt\"></i></a>" .
                            "<a href=\"javascript:deletarUsuario('$linhaVenda[id]')\"><i class=\"fas fa-trash\"></i></a>" .
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