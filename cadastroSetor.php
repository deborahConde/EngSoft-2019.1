<?php
    session_start();
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro de Setor</title>
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
    <!-- Script para fazer a máscara. Com ele, você pode definir qualquer tipo de máscara com o comando onkeypress="mascara(this, '###.###.###-##')". -->
    <script language="JavaScript">
        function mascara(t, mask) {
            var i = t.value.length;
            var saida = mask.substring(1, 0);
            var texto = mask.substring(i);
            console.log(i, texto, texto.substring(0, 1), saida);
            //if (texto.substring(0, 1) != saida) {
              //  console.log(texto.substring(0, 1));
                //t.value += texto.substring(0, 1);
            //}
        }
    </script>
    <!-- Fim do script -->
    <!-- Formulário de Cadastro de Setor -->
    <form action="" method="POST" target="_self">
        <fieldset>
            <legend>Setor:</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Nome</label>
                    <input type="name" name="nome" class="form-control" id="inputName" placeholder="Nome">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCode">Codigo</label>
                    <input type="text" name="codigo" class="form-control" id="inputCode" placeholder="Codigo">
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
    <!-- Fim do Formulário de Cadastro de Setor  -->
    <?php
    /* Ligação com Banco de Dados */
    if (isset($_POST["submit"])) {
        include_once("conexao.php"); /* Estabelece a conexão */
        $nome = $_POST['nome'];
        $codigo = $_POST['codigo'];
        $administrador = $_POST['administrador'];
        $sql = "insert into setor (codigo,nome,administrador) values ('$codigo','$nome','$administrador')";
        $salvar = mysqli_query($conexao, $sql); /* Escreve os dados no banco */
        if ($salvar) {
            ?>
            <div class="alert alert-success">Setor cadastrado com sucesso!</div>
        <?php
    } else {
        die(mysqli_error($conexao));
        ?>
            <div class="alert alert-warning">Falha ao cadastrar Setor!</div>
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