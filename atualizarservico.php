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
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];


$sql = "UPDATE servicos SET  nome='$nome', descricao='$descricao', preco='$preco' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "<script type='text/javascript'>alert('serviço atualizado com sucesso'); window.location.href='verservico.php';</script>";

} else {
  echo "Erro ao atualizar registro: " . $conn->error;
}

$conn->close();
?>
