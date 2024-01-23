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

$id = $_GET['id'];

$sql = "SELECT * FROM fluidos WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Saída dos dados em formato JSON
  echo json_encode($result->fetch_assoc());
} else {
  echo "0 resultados";
}

$conn->close();
?>
