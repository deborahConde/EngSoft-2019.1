<?php
if (isset($_GET['codigo'])) {
  include_once("conexao.php"); /* Estabelece a conexão */
  $sql = "DELETE FROM setor WHERE (setor.codigo='$_GET[codigo]')";
  $resultado = mysqli_query($conexao, $sql);
  mysqli_close($conexao);
  if ($resultado) {
    http_response_code(200);
  }
} else {
  http_response_code(500);
}
?>  
