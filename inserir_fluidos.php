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
$tipo = $_POST['tipo'];
$nome = $_POST['nome'];
$litro = $_POST['litro'];
$preco = $_POST['preco'];
$estado = $_POST['estado'];

// Insere o novo fluido no banco de dados
$sql = "INSERT INTO fluidos (tipo, nome, litro, preco, estado) VALUES ('$tipo', '$nome', $litro, $preco, '$estado')";

if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('Fluido cadastrado com sucesso'); window.location.href='verfluidos.php';</script>";

} else {
  echo "Erro ao cadastrar fluido: " . $conn->connect_error;
}

$conn->close();
?>

