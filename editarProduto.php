<?php session_start(); ?>
<?php
    include_once("conexao.php"); /* Estabelece a conexão */
    $sql = "SELECT * FROM produto where id='$_GET[id]'";
    $resultado = mysqli_query($conexao, $sql);
    if (mysqli_num_rows($resultado) == 1) {
        $linha = mysqli_fetch_assoc($resultado);
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar Produto</title>
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
    <!-- Formulário de Cadastro de Produto -->
    <form action="" method="POST" target="_self">
        <fieldset>
            <legend>Informações do Produto:</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNome">Nome</label>
                    <input type="name" name="nome" class="form-control" id="inputNome" placeholder="Nome" value="<?php echo htmlspecialchars($linha['nome']) ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPreco">Preço</label>
                    <input type="text" name="preco" class="form-control" id="inputPreco" placeholder="Preço" value="<?php echo htmlspecialchars($linha['preco']) ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputQuantidade">Quantidade</label>
                    <input type="text" name="quantidade" class="form-control" id="inputQauntidade" placeholder="Quantiadde" value="<?php echo htmlspecialchars($linha['quantidade']) ?>">
                </div>
                <div class="form-group col-md-9">
                    <label for="inputFabricante">Fabricante</label>
                    <input type="text" name="fabricante" class="form-control" id="inputFabricante" placeholder="Fabricante" value="<?php echo htmlspecialchars($linha['fabricante']) ?>">
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Informações Extras:</legend>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputDesconto">Desconto</label>
                    <input type="text" name="desconto" class="form-control" id="inputDesconto" placeholder="Desconto" value="<?php echo htmlspecialchars($linha['desconto']) ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputSetor">Setor</label>
                    <select class="form-control" name="setor">
                    <option>Escolha...</option>
                        <?php 
                        include_once("conexao.php");
                        $sqlSetor = "SELECT * FROM lojaze.setor";
                        $resultado = mysqli_query($conexao, $sqlSetor);
                        while($linhaSetor = mysqli_fetch_assoc($resultado)) {
                            echo '<option value="'.$linhaSetor['codigo'].'"> '.$linhaSetor['nome'].' </option>';
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
        if (isset($_POST["nome"])) {
            include_once("conexao.php");
            $nome = $_POST['nome'];
            $preco = $_POST['preco'];
            $fabricante = $_POST['fabricante'];
            $desconto = $_POST['desconto'];
            $quantidade = $_POST['quantidade'];
            $setor = $_POST['setor'];

            $atualizar = "UPDATE `lojaze`.`produto` SET `nome`='$nome', `preco`='$preco',`fabricante`='$fabricante',`desconto`='$desconto',`quantidade`='$quantidade',`setor`='$setor' WHERE (produto.id=\"" . $_GET['id'] . "\")";
            $salvar = mysqli_query($conexao, $atualizar);
            if ($salvar) {
                ?>
                <div class="alert alert-success">Produto cadastrado com sucesso!</div>
            <?php
            } else {
                die(mysqli_error($conexao));
                ?>
                    <div class="alert alert-warning">Falha ao cadastrar produto!</div>
                <?php
            }
        }
    ?>

</body>

<?php
include "footer.php";
?>

</html>