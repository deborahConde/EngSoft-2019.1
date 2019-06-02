<?php session_start(); ?>

<?php
include_once("conexao.php"); /* Estabelece a conexão */
$sql = "SELECT * FROM setor where id='$_GET[id]'";
$resultado = mysqli_query($conexao, $sql);
if (mysqli_num_rows($resultado) === 1) {
    $linha = mysqli_fetch_assoc($resultado);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Editar Setor</title>
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
    <!-- Formulário de Cadastro de Setor -->
    <form action="" method="POST" target="_self">
        <fieldset>
            <legend>Setor:</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Nome</label>
                    <input type="name" name="nome" class="form-control" id="inputName" placeholder="Nome" value="<?php echo htmlspecialchars($linha['nome']) ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCode">Codigo</label>
                    <input type="text" name="codigo" class="form-control" id="inputCode" placeholder="Codigo" value="<?php echo htmlspecialchars($linha['id']) ?>">
                </div>
            </div>
            <div>
                <div>
                    <label for="inputNameAdm">Administrador</label>
                    <select class="form-control" name="administrador">
                    <option>Escolha...</option>
                        <?php 
                        include_once("conexao.php");
                        $sqlFuncionario = "SELECT * FROM lojaze.funcionarios";
                        $resultado = mysqli_query($conexao, $sqlFuncionario);
                        while($linhaFuncionario = mysqli_fetch_assoc($resultado)) {
                            $sqlUsuario = "SELECT * FROM usuarios WHERE (cpf=\"" . $linhaFuncionario['cpf'] . "\")";
                            $resultadoUsuario = mysqli_query($conexao, $sqlUsuario);
                            $linha = mysqli_fetch_assoc($resultadoUsuario);
                            echo '<option value="'.$linhaFuncionario['id'].'"> '.$linha['nome'].' </option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary" value="Submit" name="submit">Confirmar</button>
    </form>
    <!-- Fim do Formulário de Cadastro de Setor -->
    <?php
    if (isset($_POST["id"])) {
        include_once("conexao.php");
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $administrador = $_POST['administrador'];

        $atualizar = "UPDATE lojaze.setor SET `id`='$codigo', `nome`='$nome' WHERE (id=\"" . $_GET['id'] . "\")";
        $salvar = mysqli_query($conexao, $atualizar);
    }
    ?>


    </body>

<?php
include "footer.php";
?>

</html>