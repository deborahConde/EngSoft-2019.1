<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro de Venda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="publico/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="publico/css/estilo.css">
</head>

<?php
include "header.php";
?>

<hr>

<body>
    <script language="JavaScript">
        window.onload = function() {
            produto = new Array();
            quantidade = new Array();
        }
    </script>
    <!-- Formulário de Cadastro de Venda -->
    <form action="" method="POST" target="_self">
        <script language="JavaScript">
            function inserirListaProduto() {
                var p = document.getElementById("produto").value;
                var q = document.getElementById("quantidade").value;
                produto.push(p);
                quantidade.push(q);
                console.log(produto, quantidade);
            }
        </script>
        <fieldset>
            <legend>Informações:</legend>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputVendedor">Vendedor</label>
                    <select class="form-control" name="vendedor">
                    <option>Escolha...</option>
                    <?php 
                        include_once("conexao.php");
                        $sqlFuncionario = "SELECT * FROM lojaze.funcionarios WHERE cargo = 'Vendedor'";
                        $resultado = mysqli_query($conexao, $sqlFuncionario);
                        while($linhaFuncionario = mysqli_fetch_assoc($resultado)) {
                            $sqlUsuario = "SELECT * FROM lojaze.usuarios WHERE cpf = '$linhaFuncionario[cpf]'";
                            $resultadoUsuario = mysqli_query($conexao, $sqlUsuario);
                            $linhaUsuario = mysqli_fetch_assoc($resultadoUsuario);
                            echo '<option value="'.$linhaFuncionario['id'].'"> '. $linhaUsuario['nome'].' </option>';
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCliente">Cliente</label>
                    <select class="form-control" name="cliente">
                    <option>Escolha...</option>
                    <?php 
                        include_once("conexao.php");
                        $sqlCliente = "SELECT * FROM clientes";
                        $resultadoCliente = mysqli_query($conexao, $sqlCliente);
                        while($linhaCliente = mysqli_fetch_assoc($resultadoCliente)) {
                            echo '<option value="'.$linhaCliente['cpf'].'"> '. $linhaCliente['nome'].' </option>';
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputDate">Data</label>
                    <input type="date" name="data" class="form-control" id="inputDate" placeholder="dd/mm/aaaa">
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Produtos:</legend>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputProduto">Produto</label>
                    <select class="form-control" name="produto" id="produto">
                        <option>Escolha...</option>
                        <?php 
                            include_once("conexao.php");
                            $sqlProduto = "SELECT * FROM produto";
                            $resultadoProduto = mysqli_query($conexao, $sqlProduto);
                            while($linhaProduto = mysqli_fetch_assoc($resultadoProduto)) {
                                echo '<option value="'.$linhaProduto['id'].'"> '. $linhaProduto['nome'].' </option>';
                            }
                        ?>
                        </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputQuantidade">Quantidade</label>
                    <input type="number" name="quantidade" class="form-control" id="quantidade" placeholder="EX.: 1"> 
                    <button type="button" onclick="inserirListaProduto()">Inserir na Lista</button>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>TEMPORARIO</legend>
            <div class="form-row">
                <label for="inputValTotal">Valor Total</label>
                <input type="text" name="valorTotal" class="form-control" id="inputValTotal" placeholder="Valor Total">
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary" value="Submit" name="submit">Confirmar</button>
    </form>
    <!-- Fim do Formulário de Cadastro de Usuário  -->
    <?php
    /* Ligação com Banco de Dados */
    if (isset($_POST["submit"])) {
        include_once("conexao.php"); /* Estabelece a conexão */
        $cliente = $_POST['cliente'];
        $funcionario = $_POST['vendedor'];
        $valorTotal = $_POST['valorTotal'];
        $data = $_POST['data'];
        $produto = $_POST['produto'];
        $quantidade = $_POST['quantidade'];

        /* Insere os dados de uma venda */
        $sqlVenda = "insert into venda (id_cliente, id_funcionario, data) values ('$cliente','$funcionario','$data')";
        $salvarVenda = mysqli_query($conexao, $sqlVenda); /* Escreve os dados no banco */

        /* Insere os produtos relacionados a uma venda */
        /* Busca a ultima venda inserida no sistema */
        $sqlIdVenda = "SELECT * FROM venda ORDER BY id DESC LIMIT 1";
        $resultadoIdVenda = mysqli_query($conexao, $sqlIdVenda);
        $linhaIdVenda = mysqli_fetch_assoc($resultadoIdVenda);
        /* -------*/
        /*  */
        $sqlProduto = "SELECT * FROM produto WHERE id = '$produto'";
        $resultadoProduto = mysqli_query($conexao, $sqlProduto);
        $linhaProduto = mysqli_fetch_assoc($resultadoProduto);
        /* -------*/
        
        //$sqlVendaProduto = "insert into vendaproduto (id_venda, id_produto, quantidade, preco) values ('$linhaIdVenda[id]', produto,quantidade do produto q ta no array",'$linhaProduto[preco]')";

        $sqlVendaProduto = "insert into vendaproduto (id_venda, id_produto, quantidade, preco) values ('$linhaIdVenda[id]', '$produto','$quantidade','$linhaProduto[preco]')";
        $salvarVendaProduto = mysqli_query($conexao, $sqlVendaProduto); /* Escreve os dados no banco */

    if ($salvarVenda) {
            ?>
            <div class="alert alert-success">Venda cadastrada com sucesso!</div>
        <?php
    } else {
        die(mysqli_error($conexao));
        ?>
            <div class="alert alert-warning">Falha ao cadastrar venda!</div>
        <?php
    }

    if ($salvarVendaProduto) {
        ?>
        <div class="alert alert-success">Produto Venda cadastrada com sucesso!</div>
    <?php
    } else {
    die(mysqli_error($conexao));
    ?>
        <div class="alert alert-warning">Falha ao cadastrar produtovenda!</div>
    <?php
    }
    mysqli_close($conexao);
}

?>

</body>

<hr>

<?php
include "footer.php";
?>

</html>