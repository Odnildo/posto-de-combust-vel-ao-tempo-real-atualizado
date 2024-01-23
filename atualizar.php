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

// Pega os dados do formulário
$id_combustivel = $_POST['id_combustivel'];
$tipo_combustivel = $_POST['tipo_combustivel'];
$estado = $_POST['estado'];
$preco = $_POST['preco'];

// Atualiza o registro no banco de dados
$sql = "UPDATE combustivel SET tipo_combustivel='$tipo_combustivel', estado='$estado', preco='$preco' WHERE id_combustivel=$id_combustivel";

if ($conn->query($sql) === TRUE) {
  
  echo "<script type='text/javascript'>alert('Combustivel atualizado com sucesso'); window.location.href='index.php';</script>";

} else {
  echo "Erro ao atualizar registro: " . $conn->error;
}

$conn->close();
?>
