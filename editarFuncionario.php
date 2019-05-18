<?php session_start(); ?>
<?php
if (isset($_POST["cpf"])) {
    include_once("conexao.php");
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $endereco = $_POST['endereco'];
    $complemento = $_POST['complemento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];
    $salario = $_POST['salario'];
    $cargo = $_POST['cargo'];
    $atualizar = "UPDATE `lojaze`.`usuarios` SET `nome`='$nome', `email`='$email',`telefone`='$telefone',`cpf`='$cpf',`endereco`='$endereco',`complemento`='$complemento',`cidade`='$cidade',`estado`='$estado',`cep`='$cep' WHERE (cpf=\"" . $_GET['cpf'] . "\")";

    $atualizarFuncionario = "UPDATE `lojaze`.`usuarios` SET `salario`='$email',`cargo`='$telefone' WHERE (id=\"" . $_POST['codigoFunc'] . "\") \"and\" (cpf=\"" . $_GET['cpf'] . "\")";
    $salvar = mysqli_query($conexao, $atualizar);
    $salvar2 = mysqli_query($conexao,$atualizarFuncionario);
}
?>
<?php
include_once("conexao.php"); /* Estabelece a conexão */
$sql = "SELECT * FROM usuarios where cpf='$_GET[cpf]'";
$resultado = mysqli_query($conexao, $sql);
if (mysqli_num_rows($resultado) === 1) {
    $linha = mysqli_fetch_assoc($resultado);
    $sql2 = "SELECT * FROM funcionarios WHERE (cpf=\"" . $linha['cpf'] . "\")" ;
    $resultado2 = mysqli_query($conexao, $sql2);
    $linha2 = mysqli_fetch_assoc($resultado2);
}
?>

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
    <!-- Script para fazer a máscara. Com ele, você pode definir qualquer tipo de máscara com o comando onkeypress="mascara(this, '###.###.###-##')". -->
    <script language="JavaScript">
        function mascara(t, mask) {
            var i = t.value.length;
            var saida = mask.substring(1, 0);
            var texto = mask.substring(i);
            console.log(saida, texto);
            if (texto.substring(0, 1) != saida) {
                t.value += texto.substring(0, 1);
            }
        }
    </script>
    <!-- Fim do script -->
    <!-- Formulário de Cadastro de Usuário -->
    <form action="" method="POST" target="_self" onsubmit="javascript:window.location.reload()">
        <fieldset>
            <legend>Informações Pessoais:</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="name" name="email" class="form-control" id="inputEmail4" placeholder="Email" value="<?php echo htmlspecialchars($linha['email']) ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="inputEmail4">Nome</label>
                    <input type="name" name="nome" class="form-control" id="inputNome4" placeholder="Nome" value="<?php echo htmlspecialchars($linha['nome']) ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputPassword4">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="inputTelefone4" placeholder="(11)1111-1111" onkeypress="mascara(this, '(##)####-####')" maxlength="12" value="<?php echo htmlspecialchars($linha['telefone']) ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputPassword4">CPF</label>
                    <input type="text" name="cpf" class="form-control" id="inputCPF4" placeholder="111.111.111-11" onkeypress="mascara(this, '###.###.###-##')" maxlength="14" value="<?php echo htmlspecialchars($linha['cpf']) ?>">
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Informações Residenciais:</legend>
            <div class="form-group">
                <label for="inputAddress">Endereço</label>
                <input type="text" name="endereco" class="form-control" id="inputAddress" placeholder="Av. Rio Branco" value="<?php echo htmlspecialchars($linha['endereco']) ?>">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Complemento</label>
                <input type="text" name="complemento" class="form-control" id="inputAddress2" placeholder="Apartmento, estudio, or andar" value="<?php echo htmlspecialchars($linha['complemento']) ?>">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Cidade</label>
                    <input type="text" name="cidade" class="form-control" id="inputCity" placeholder="Cidade" value="<?php echo htmlspecialchars($linha['cidade']) ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Estado</label>
                    <select id="inputState" name="estado" class="form-control" value="<?php echo htmlspecialchars($linha['estado']) ?>">
                        <option selected>Escolha...</option>
                        <option>AC</option>
                        <option>AL</option>
                        <option>AP</option>
                        <option>AM</option>
                        <option>BA</option>
                        <option>CE</option>
                        <option>DF</option>
                        <option>ES</option>
                        <option>GO</option>
                        <option>MA</option>
                        <option>MT</option>
                        <option>MS</option>
                        <option>MG</option>
                        <option>PA</option>
                        <option>PB</option>
                        <option>PR</option>
                        <option>PE</option>
                        <option>PI</option>
                        <option>RJ</option>
                        <option>RN</option>
                        <option>RS</option>
                        <option>RO</option>
                        <option>RR</option>
                        <option>SC</option>
                        <option>SP</option>
                        <option>SE</option>
                        <option>TO</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">CEP</label>
                    <input type="text" name="cep" class="form-control" id="cep" onkeypress="mascara(this, '##.###-###')" placeholder="11.111-111" maxlength="10" value="<?php echo htmlspecialchars($linha['cep']) ?>">
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Dados do Funcionario:</legend>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputCodigo">Codigo</label>
                    <input type="text" name="codigoFunc" class="form-control" id="codigoFunc" placeholder="xxxx.xx.xx.xx" maxlenght="20" value="<?php echo htmlspecialchars($linha2['id']) ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputSalario">Salario</label>
                    <input type="number" name="salario" class="form-control" id="salario" value="<?php echo htmlspecialchars($linha2['salario']) ?>" >
                </div>
                <div class="form-group col-md-5">
                    <label for="inputCargo">Cargo</label>
                    <select id="inputCargo" name="cargo" class="form-control" value="<?php echo htmlspecialchars($linha2['cargo']) ?>">
                        <option selected>Escolha...</option>
                        <option>Vendedor</option>
                        <option>Administrador</option>
                    </select>       
                </div>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary" value="Submit" name="submit">Confirmar</button>
    </form>

</body>

<?php
include "footer.php";
?>

</html>