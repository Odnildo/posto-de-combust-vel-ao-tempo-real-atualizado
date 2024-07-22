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

// Verifica se o ID do pedido foi passado na URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    // Deleta o pedido e os itens associados
    $conexao->query("DELETE FROM itens_pedido WHERE pedido_id = $id");
    $conexao->query("DELETE FROM pedidos WHERE id = $id");

    // Redireciona após a exclusão
    header("Location: ver_pedidos.php");
    exit;
} else {
    echo "ID do pedido inválido.";
    exit;
}

$conexao->close();
