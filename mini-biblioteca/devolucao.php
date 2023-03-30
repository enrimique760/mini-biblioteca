<?php
require_once('conexao.php');
if (empty($_GET['id'])) {
  header('Location: index.php');
}
$id_livro = $_GET['id'];
$sql_livro = "SELECT * FROM Livros WHERE id = $id_livro AND status = 0";
$resultado_livro = $conexao->query($sql_livro);
if ($resultado_livro->num_rows != 1) {
  header('Location: index.php');
}
$sql_emprestimo = "SELECT * FROM Emprestimos WHERE id_livro = $id_livro AND data_devolucao >= CURDATE() ORDER BY id DESC LIMIT 1";
$resultado_emprestimo
