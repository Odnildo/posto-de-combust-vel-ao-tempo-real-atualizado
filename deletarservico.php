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

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  
  $sql = "DELETE FROM servicos WHERE id = $id";

  if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('Fluído deletado com sucesso'); window.location.href='verservico.php';</script>";
  } else {
    echo "Erro ao deletar registro: " . $conn->error;
  }
} else {
  echo "ID não definido";
}

$conn->close();
?>
