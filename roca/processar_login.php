<?php
session_start();

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
        $usuario_digitado = $_POST["username"];
        $senha_digitada = $_POST["password"];

        // Consulta o banco de dados para encontrar o usuário
        $sql = "SELECT id, username, password, role FROM usuario WHERE username = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $usuario_digitado);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Verifica a senha
            if (password_verify($senha_digitada, $row["password"])) {
                // Login bem-sucedido
                $_SESSION["user_id"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["role"] = $row["role"];

                if ($row["role"] == 'admin') {
                    // Se o usuário for um administrador, redireciona para a página de admin
                    echo "<script type='text/javascript'>alert('Seja Bem Vindo Admin'); window.location.href='admin.php';</script>";

                    exit();
                } else {
                    // Se o usuário for um usuário comum, redireciona para a página do usuário
                    echo "<script type='text/javascript'>alert('Seja Bem Vindo'); window.location.href='carros.php';</script>";

                    exit();
                }
            } else {
                // Senha incorreta
                header("Location: entrar.php?erro=2");
                exit();
            }
        } else {
            // Usuário não encontrado
            header("Location: entrar.php?erro=1");
            exit();
        }
    }
}

// Se o formulário não foi submetido corretamente, redireciona de volta à página de login
header("Location: login.php");
exit();
?>
