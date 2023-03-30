<?php
require_once('conexao.php');
if (empty($_GET['id'])) {
  header('Location: index.php');
}
$id_livro = $_GET['id'];
$sql_livro = "SELECT * FROM Livros WHERE id = $id_livro AND status = 1";
$resultado_livro = $conexao->query($sql_livro);
if ($resultado_livro->num_rows != 1) {
  header('Location: index.php');
}
$sql_usuarios = "SELECT * FROM Usuarios";
$resultado_usuarios = $conexao->query($sql_usuarios);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Empréstimo</title>
</head>
<body>
  <h1>Empréstimo</h1>
  <form method="post" action="emprestimo_confirmacao.php">
    <input type="hidden" name="id_livro" value="<?php echo $id_livro ?>">
    <label>Usuário:</label>
    <select name="id_usuario">
      <?php while($usuario = $resultado_usuarios->fetch_assoc()) { ?>
      <option value="<?php echo $usuario['id'] ?>"><?php echo $usuario['nome'] ?></option>
      <?php } ?>
    </select>
    <br>
    <input type="submit" value="Confirmar empréstimo">
  </form>
  <p><a href="index.php">Voltar à página inicial</a></p>
</body>
</html>
