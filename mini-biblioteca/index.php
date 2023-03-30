<?php
require_once('conexao.php');
$sql = "SELECT * FROM Livros WHERE status = 1";
if (!empty($_GET['titulo'])) {
  $titulo = $_GET['titulo'];
  $sql .= " AND titulo LIKE '%$titulo%'";
}
$resultado = $conexao->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Mini Biblioteca</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Mini Biblioteca</h1>
  <form method="get">
    <label>Buscar livro:</label>
    <input type="text" name="titulo" placeholder="Título do livro">
    <input type="submit" value="Buscar">
  </form>
  <h2>Livros disponíveis</h2>
  <?php if ($resultado->num_rows > 0) { ?>
  <table>
    <thead>
      <tr>
        <th>Título</th>
        <th>Autor</th>
        <th>Editora</th>
        <th>Ano</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php while($livro = $resultado->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $livro['titulo'] ?></td>
        <td><?php echo $livro['autor'] ?></td>
        <td><?php echo $livro['editora'] ?></td>
        <td><?php echo $livro['ano'] ?></td>
        <td><a href="emprestimo.php?id=<?php echo $livro['id'] ?>">Emprestar</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php } else { ?>
  <p>Não há livros disponíveis.</p>
  <?php } ?>
  <style>
		.container {
			width: 100%;
			text-align: center;
		}
		
		form {
			width: 50%;
			margin: 0 auto;
			background-color: #eee;
			padding: 20px;
		}
		
		input[type="text"],
		input[type="email"],
		input[type="password"],
		textarea {
			display: block;
			margin-bottom: 10px;
			padding: 10px;
			width: 100%;
			border: 1px solid #ccc;
			border-radius: 3px;
		}
		
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 10px 20px;
			border: none;
			border-radius: 3px;
			cursor: pointer;
		}
	</style>
  <div class="container">
 
		<form>
			<button><a href="novo_usuario.php">Cadastrar novo usuário</a></button>
      <button><a href="lista_livros.php">Ver todos os livros</a></button>
      <button><a href="novo_livro.php">Cadastrar novo livro</a></button>
      <button><a href="lista_usuarios.php">Ver usuários cadastrados</a></button>
		</form> 
	</div>
</body>
</html>
