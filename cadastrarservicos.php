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
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];

// Insere o serviço no banco de dados
$sql = "INSERT INTO servicos (nome, descricao, preco) VALUES ('$nome', '$descricao', $preco)";

if ($conn->query($sql) === TRUE) {
  echo "<script type='text/javascript'>alert('Serviço cadastrado com sucesso'); window.location.href='verservico.php';</script>";
} else {
  echo "Erro ao cadastrar serviço: " . $conn->error;
}

$conn->close();
?>
