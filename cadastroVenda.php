<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro Produto</title>
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
    <!-- Formulário de Cadastro de Produto -->
    <form action="" method="POST" target="_self">
        <fieldset>
            <legend>Informações do Produto:</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNome">Cliente</label>
                        <select class="form-control" name="cliente">
                        <option>Escolha...</option>
                            <?php 
                            include_once("conexao.php");
                            $sqlSetor = "SELECT * FROM lojaze.setor";
                            $resultado = mysqli_query($conexao, $sqlcliente);
                            while($linhaSetor = mysqli_fetch_assoc($resultado)) {
                                echo '<option value="'.$linhacliente['(id_cliente'].'"> '.$linhaSetor['nome'].' </option>';
                            }
                            ?>
                        </select>
                    
                </div>
                 <div class="form-group col-md-6">
                    <label for="inputNome">Produtos</label>
                        <select class="form-control" name="produtos">
                        <option>Escolha...</option>
                            <?php 
                            include_once("conexao.php");
                            $sqlSetor = "SELECT * FROM lojaze.setor";
                            $resultado = mysqli_query($conexao, $sqlproduto);
                            while($linhaSetor = mysqli_fetch_assoc($resultado)) {
                                echo '<option value="'.$linhacliente['(id_cliente'].'"> '.$linhaSetor['nome'].' </option>';
                            }
                            ?>
                        </select>
                    
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-1">
                    <label for="inputQuantidade">Quantidade</label>
                    <input type="text" name="quantidade" class="form-control" id="inputQauntidade" placeholder="Quantiadde">
                </div>
                <div class="form-group col-md-9">
                    <label for="inputFabricante">Preço</label>
                    <input type="text" name="preco" class="form-control" id="inputFabricante" placeholder="Fabricante">
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Informações Extras:</legend>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputDesconto">Data</label>
                    <input type="text" name="data" class="form-control" id="inputDesconto" placeholder="Desconto">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputSetor">Funcionario</label>
                    <select class="form-control" name="funcionario">
                    <option>Escolha...</option>
                        <?php 
                        include_once("conexao.php");
                        $sqlSetor = "SELECT * FROM lojaze.setor";
                        $resultado = mysqli_query($conexao, $sqlFuncionario);
                        while($linhaFuncionario = mysqli_fetch_assoc($resultado)) {
                            echo '<option value="'.$linhaFuncionario['codigo'].'"> '.$linhaFuncionario['nome'].' </option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary" value="Submit" name="submit">Confirmar</button>
    </form>
    <!-- Fim do Formulário de Cadastro de Produto  -->
    <?php
    /* Ligação com Banco de Dados */
    if (isset($_POST["submit"])) {
        include_once("conexao.php"); /* Estabelece a conexão */
        $cliente = $_POST['cliente'];
        $preco = $_POST['preco'];
        $produtos = $_POST['produtos'];
        $quantidade = $_POST['quantidade'];
        $preco = $_POST['preco'];
        $data = $_POST['data'];
        $Funcionario = $_POST['funcionario'];

        $sql = "insert into produto (cliente,preco,produtos,quantidade,preco,data, Funcionario) values ('$cliente','$preco','$Produtos','$quantidade','$preco','$data','$Funcionario')";
        $salvar = mysqli_query($conexao, $sql); /* Escreve os dados no banco */

        if ($salvar) {
            ?>
            <div class="alert alert-success">Venda Realizada com sucesso!</div>
        <?php
    } else {
        die(mysqli_error($conexao));
        ?>
            <div class="alert alert-warning">Venda Não Realizada, Confira os dados preenchidos!</div>
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