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

// Responder mensagem do usuário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resposta = $_POST['resposta'];
    $id = $_POST['id'];

    $query = "UPDATE mensagens SET resposta = ? WHERE id = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("si", $resposta, $id);

    if ($stmt->execute()) {
        echo "<script type='text/javascript'>alert('Resposta enviada com sucesso'); window.location.href='mensagem_admin.php';</script>";
    } else {
        echo "Erro ao enviar a resposta: " . $stmt->error;
    }

    $stmt->close();
}

// Buscar mensagens
$query = "SELECT * FROM mensagens";
$resultado = $conexao->query($query);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Mensagens - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<a href="admin.php" class="btn btn-secondary mt-3">Voltar para a Página Inicial</a>
   
    <div class="container mt-5">
        <h2>Mensagens dos Usuários</h2>
        <div class="list-group">
            <?php while ($linha = $resultado->fetch_assoc()): ?>
                <div class="list-group-item">
                    <h5 class="mb-1"><?= htmlspecialchars($linha['nome']) ?></h5>
                    <p class="mb-1"><?= htmlspecialchars($linha['mensagem']) ?></p>
                    <?php if (!empty($linha['resposta'])): ?>
                        <small class="text-muted">Resposta: <?= htmlspecialchars($linha['resposta']) ?></small>
                    <?php else: ?>
                        <form method="post" class="mt-3">
                            <div class="mb-3">
                                <label for="resposta" class="form-label">Responder:</label>
                                <textarea class="form-control" id="resposta" name="resposta" rows="2" required></textarea>
                            </div>
                            <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                            <button type="submit" class="btn btn-primary">Enviar Resposta</button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
</html>

<?php
$conexao->close();
?>
