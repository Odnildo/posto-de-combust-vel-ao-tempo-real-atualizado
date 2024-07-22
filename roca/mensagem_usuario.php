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

// Enviar mensagem do usuário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $mensagem = $_POST['mensagem'];

    $query = "INSERT INTO mensagens (nome, mensagem) VALUES (?, ?)";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("ss", $nome, $mensagem);

    if ($stmt->execute()) {
        echo "<script type='text/javascript'>alert('Mensagem enviada com sucesso'); window.location.href='mensagem_usuario.php';</script>";
    } else {
        echo "Erro ao enviar a mensagem: " . $stmt->error;
    }

    $stmt->close();
}

// Buscar mensagens e respostas
$query = "SELECT * FROM mensagens";
$resultado = $conexao->query($query);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Mensagens</title>
    <link rel="stylesheet" href="stylte.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    
<style>
      
</style>

</head>
<body>

<a href="carros.php" class="btn btn-secondary mt-3">Voltar para a Página Inicial</a>
   
    <div class="container mt-5">
        <h2>Enviar Mensagem</h2>
        <form method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="mensagem" class="form-label">Mensagem:</label>
                <textarea class="form-control" id="mensagem" name="mensagem" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <h2 class="mt-5">Mensagens e Respostas</h2>
        <div class="list-group">
            <?php while ($linha = $resultado->fetch_assoc()): ?>
                <div class="list-group-item">
                    <h5 class="mb-1"><?= htmlspecialchars($linha['nome']) ?></h5>
                    <p class="mb-1"><?= htmlspecialchars($linha['mensagem']) ?></p>
                    <?php if (!empty($linha['resposta'])): ?>
                        <small class="text-muted">Resposta do Admin: <?= htmlspecialchars($linha['resposta']) ?></small>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>

<?php
$conexao->close();
?>
