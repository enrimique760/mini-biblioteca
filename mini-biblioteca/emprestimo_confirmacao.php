<?php
require_once('conexao.php');
$livro_id = $_POST['livro_id'];
$usuario_id = $_POST['usuario_id'];
$data_emprestimo = date('Y-m-d');
$data_devolucao = date('Y-m-d', strtotime('+7 days'));
$sql = "INSERT INTO Emprestimos (livro_id, usuario_id, data_emprestimo, data_devolucao) VALUES ('$livro_id', '$usuario_id', '$data_emprestimo', '$data_devolucao')";
if ($conexao->query($sql) === TRUE) {
  // Atualizar status do livro para emprestado
  $sql_update = "UPDATE Livros SET status='emprestado' WHERE id='$livro_id'";
  if ($conexao->query($sql_update) === TRUE) {
    header('Location: lista_emprestimos.php');
  } else {
    echo "Erro ao atualizar status do livro: " . $conexao->error;
  }
} else {
  echo "Erro ao realizar empréstimo: " . $conexao->error;
}
$conexao->close();
?>
