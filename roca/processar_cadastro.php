<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "venda_de_carros";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos de usuário e senha estão definidos
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $usuario = $_POST["username"];
        $senha = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash da senha

        // Insere os dados na tabela usuario
        $sql = "INSERT INTO usuario (username, password, role) VALUES (?, ?, 'user')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $usuario, $senha);

        if ($stmt->execute()) {
            // Cadastro bem-sucedido, redireciona para a página de login
            echo "<script type='text/javascript'>alert('Usuário Cadastrado Com Sucesso'); window.location.href='entrar.php';</script>";

            exit();
        } else {
            // Erro no cadastro
            echo "Erro ao cadastrar: " . $stmt->error;
        }
    }
}

// Se o formulário não foi submetido corretamente, redireciona para a página de cadastro
header("Location: cadastro.php");
exit();
?>
