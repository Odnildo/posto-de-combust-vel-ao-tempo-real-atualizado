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

// Verifica se o ID do item foi passado na URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se um novo arquivo foi enviado
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        // Processa o novo arquivo
        $novo_nome = $_FILES['imagem']['name'];
        $novo_tipo = $_FILES['imagem']['type'];
        $novo_caminho = 'img/' . $novo_nome;
        move_uploaded_file($_FILES['imagem']['tmp_name'], $novo_caminho);

        // Atualiza os dados do item
        $nome = $novo_nome;
        $tipo = $novo_tipo;
        $caminho = $novo_caminho;
        $carro = $_POST['carro'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];

        $query = "UPDATE imagens SET nome = ?, tipo = ?, caminho = ?, carro = ?, preco = ?, descricao = ? WHERE id = ?";
        $stmt = $conexao->prepare($query);
        
        if ($stmt === false) {
            die("Erro na preparação da consulta: " . $conexao->error);
        }

        $stmt->bind_param("ssssisi", $nome, $tipo, $caminho, $carro, $preco, $descricao, $id);
        if ($stmt->execute()) {
            echo "<script>alert('Item atualizado com sucesso!'); window.location.href='admin.php';</script>";
        } else {
            echo "Erro ao atualizar o item: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // Atualiza sem novo arquivo
        $nome = $_POST['nome'];
        $tipo = $_POST['tipo'];
        $caminho = $_POST['caminho'];
        $carro = $_POST['carro'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];

        $query = "UPDATE imagens SET nome = ?, tipo = ?, caminho = ?, carro = ?, preco = ?, descricao = ? WHERE id = ?";
        $stmt = $conexao->prepare($query);
        
        if ($stmt === false) {
            die("Erro na preparação da consulta: " . $conexao->error);
        }

        $stmt->bind_param("ssssisi", $nome, $tipo, $caminho, $carro, $preco, $descricao, $id);
        if ($stmt->execute()) {
            echo "<script>alert('Item atualizado com sucesso!'); window.location.href='admin.php';</script>";
        } else {
            echo "Erro ao atualizar o item: " . $stmt->error;
        }

        $stmt->close();
    }
} else {
    if ($id > 0) {
        // Consulta SQL para obter os detalhes do item
        $query = "SELECT id, nome, tipo, caminho, carro, preco, descricao FROM imagens WHERE id = ?";
        $stmt = $conexao->prepare($query);
        
        if ($stmt === false) {
            die("Erro na preparação da consulta: " . $conexao->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $item = $resultado->fetch_assoc();
        $stmt->close();
    } else {
        echo "ID do item inválido.";
        exit;
    }
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda de Carros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zyUjK5dbS2jG0cF26dHn87W2U1gV8rjOwM2wEfd" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zyUjK5dbS2jG0cF26dHn87W2U1gV8rjOwM2wEfd" crossorigin="anonymous">
  
    <link rel="stylesheet" href="stylte.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: rgba(248, 248, 248, 0.8); /* Ajuste a opacidade aqui */
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            backdrop-filter: blur(10px); /* Adiciona um efeito de desfoque de fundo */
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
        }

        nav {
            margin-left: auto;
        }

        main {
            padding-top: 80px; /* Ajuste conforme a altura do seu header */
        }
        h1{
          color:black;

        }

        
        .container {
            max-width: 800px;
            margin-top: 30px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-control {
            border-radius: 0.375rem;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 0.375rem;
            box-shadow: 0 0 0.125rem rgba(0, 0, 0, 0.075);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            border-top-left-radius: 0.375rem;
            border-top-right-radius: 0.375rem;
        }

        .container {
            max-width: 800px;
            margin-top: 30px;
        }
        .form-label {
            margin-bottom: 10px;
            font-weight: bold;
        }
        .form-control, .form-select {
            margin-bottom: 20px;
        }
        .btn-primary {
            margin-top: 10px;
        }
    </style>
 



 

        
    </style>
</head>
<body>
    <header>
        <h1>ROCA´s company Lda</h1>
        <nav>
            <ul>
                <li><a href="admin.php">Home</a></li>
                <li><a href="tabela_de_carros.php">Editar carros</a></li>
                <li><a href="ver_pedidos.php">Pedidos</a></li>
                <li><a href="entrar.php">Sair</a></li>
             
            </ul>
        </nav>
    </header>
 <section></section>
 <section></section>
 <section></section>
 <div class="container">
        <h2 class="mb-4">Editar Item</h2>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="imagem" class="form-label">Escolher Novo Arquivo:</label>
                <input type="file" class="form-control" id="imagem" name="imagem" onchange="updateFields()">
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($item['nome']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo:</label>
                <input type="text" class="form-control" id="tipo" name="tipo" value="<?= htmlspecialchars($item['tipo']) ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="caminho" class="form-label">Caminho:</label>
                <input type="text" class="form-control" id="caminho" name="caminho" value="<?= htmlspecialchars($item['caminho']) ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="carro" class="form-label">Nome do Carro:</label>
                <input type="text" class="form-control" id="carro" name="carro" value="<?= htmlspecialchars($item['carro']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Preço:</label>
                <input type="number" class="form-control" id="preco" name="preco" value="<?= htmlspecialchars($item['preco']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="4" required><?= htmlspecialchars($item['descricao']) ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Item</button>
        </form>
    </div>
 
    
     
    
    <script>
        function updateFields() {
            const fileInput = document.getElementById('imagem');
            const nomeField = document.getElementById('nome');
            const tipoField = document.getElementById('tipo');
            const caminhoField = document.getElementById('caminho');
            const file = fileInput.files[0];

            if (file) {
                nomeField.value = file.name;
                tipoField.value = file.type;
                caminhoField.value = 'img/' + file.name;
                // Aqui você pode adicionar lógica para atualizar outros campos como preço e descrição se necessário.
            }
        }
    </script>
    
    
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
