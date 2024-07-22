<?php
// Configurações do banco de dados
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "venda_de_carros";

// Conecta ao banco de dados
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verifica se a conexão foi estabelecida com sucesso
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

// Consulta SQL para buscar dados
$query = "SELECT id, nome, tipo FROM imagens";
$resultado = $conexao->query($query);

// Verifica se houve resultados
if ($resultado->num_rows > 0) {
    // Retorna os resultados como um array associativo JSON
    $dados = $resultado->fetch_all(MYSQLI_ASSOC);
    echo json_encode($dados);
} else {
    // Retorna um array vazio se não houver resultados
    echo json_encode([]);
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>
