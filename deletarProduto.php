<?php
if (isset($_GET['id'])) {
  include_once("conexao.php"); /* Estabelece a conexão */
  $sql = "DELETE FROM produto where id=\"" . $_GET['id'] . "\"";
  $resultado = mysqli_query($conexao, $sql);
  mysqli_close($conexao);
  if ($resultado) {
    http_response_code(200);
  }
} else {
  http_response_code(500);
}
?>  
