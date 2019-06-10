<!--Menu-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!--Links do Menu-->
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">

      <?php
        if ( session_status() != PHP_SESSION_ACTIVE ){
            session_start();
        }
        if(!isset($_SESSION['usuarioNiveisAcessoId'])){/* Verifica se a variavel usuarioNiveisAcessoId não existe */
            $_SESSION['usuarioNiveisAcessoId'] = 1;
        }
        if ( $_SESSION['usuarioNiveisAcessoId'] == 0) {/* Se for Administrador */
          echo "<li class 'nav-item'><a class='nav-link' href='index.php'>Home</a></li>";
          echo "<li class 'nav-item'><a class='nav-link' href='produto.php'>Produtos</a></li>";
          echo "<li class 'nav-item'><a class='nav-link' href='cadastroUsuario.php'>Cadastrar Usuário</a></li>";
          echo "<li class 'nav-item'><a class='nav-link' href='visualizarUsuario.php'>Visualizar Usuário</a></li>";
          echo "<li class 'nav-item'><a class='nav-link' href='visualizarFuncionario.php'>Visualizar Funcionários</a></li>";
          echo "<li class 'nav-item'><a class='nav-link' href='visualizarCliente.php'>Visualizar Clientes</a></li>";
          echo "<li class 'nav-item'><a class='nav-link' href='cadastroSetor.php'>Cadastrar Setor</a></li>";
          echo "<li class 'nav-item'><a class='nav-link' href='visualizarSetor.php'>Visualizar Setor</a></li>";
          echo "<li class 'nav-item'><a class='nav-link' href='cadastroProduto.php'>Cadastrar Produto</a></li>";
          echo "<li class 'nav-item'><a class='nav-link' href='visualizarProduto.php'>Visualizar Produto</a></li>";
        }
        else if ($_SESSION['usuarioNiveisAcessoId'] == 2) {/* Se nnfor Vendedor */
          echo "<li class 'nav-item'><a class='nav-link' href='index.php'>Home</a></li>";
          echo "<li class 'nav-item'><a class='nav-link' href='produto.php'>Produtos</a></li>";
          echo "<li class 'nav-item'><a class='nav-link' href='cadastroProduto.php'>Cadastrar Produto</a></li>";
          echo "<li class 'nav-item'><a class='nav-link' href='visualizarProduto.php'>Visualizar Produto</a></li>";
        }
        else {/* Se for cliente */
          echo "<li class 'nav-item'><a class='nav-link' href='index.php'>Home</a></li>";
          echo "<li class 'nav-item'><a class='nav-link' href='produto.php'>Produtos</a></li>";
        }
      ?>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <!-- ***
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="produto.php">Produtos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cadastroUsuario.php">Cadastrar Usuário</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="visualizarUsuario.php">Visualizar Usuário</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="exibirUsuario.php">Exibir Usuário</a>
      </li>
      <li>
        <a class="nav-link" href="visualizarFuncionario.php">Visualizar Funcionário</a>
      </li>
      <li>
        <a class="nav-link" href="visualizarCliente.php">Visualizar Cliente</a>
      </li>
      <li>
        <a class="nav-link" href="cadastroSetor.php"> Cadastrar Setor</a>
      </li>
      <li>
        <a class="nav-link" href="visualizarSetor.php">Visualizar Setor</a>
      </li>
      <li>
        <a class="nav-link" href="exibirSetor.php">Exibir Setor</a>
      </li>
      <li>
        <a class="nav-link" href="CadastroProduto.php">Cadastrar Produto</a>
      </li>
      <li>
        <a class="nav-link" href="VisualizarProduto.php">Visualizar Produto</a>
      </li>
      
       -->
    </ul>
  </div>
  <!--Links do Menu-->
</nav>
<!--Menu-->