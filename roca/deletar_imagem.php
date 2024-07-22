<?php
// verificar se o ID da imagem foi fornecido na URL
if (isset($_GET['id'])) {
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

    // Obter o ID da imagem
    $id_imagem = $_GET['id'];

    // Excluir a imagem do banco de dados
    $query_delete = "DELETE FROM imagens WHERE id = $id_imagem";
    $resultado_delete = $conexao->query($query_delete);

    // Verificar se a consulta foi bem-sucedida
    if ($resultado_delete) {
        echo "<script type='text/javascript'>alert('Imagem deletada com Sucesso'); window.location.href='tabela_de_carros.php';</script>";

    } else {
        echo "Erro ao deletar a imagem: " . $conexao->error;
    }

    // Fechar a conexão com o banco de dados
    $conexao->close();
} else {
    echo "ID da imagem não fornecido.";
}
?>
