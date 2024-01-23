<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bomba";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

$id = $_POST['id'];
$tipo = $_POST['tipo'];
$nome = $_POST['nome'];
$litro = $_POST['litro'];
$preco = $_POST['preco'];
$estado = $_POST['estado'];

$sql = "UPDATE fluidos SET tipo='$tipo', nome='$nome', litro='$litro', preco='$preco', estado='$estado' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "<script type='text/javascript'>alert('fluido atualizado com sucesso'); window.location.href='verfluidos.php';</script>";

} else {
  echo "Erro ao atualizar registro: " . $conn->error;
}

$conn->close();
?>
