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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtém os dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $metodo_pagamento = $_POST['metodo_pagamento'];
        $total = $_POST['total'];
        
        // Atualiza o pedido
        $query = "UPDATE pedidos SET nome = ?, email = ?, endereco = ?, metodo_pagamento = ?, total = ? WHERE id = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bind_param("ssssdi", $nome, $email, $endereco, $metodo_pagamento, $total, $id);
        $stmt->execute();
        $stmt->close();
        
        // Redireciona após a atualização
        header("Location: ver_pedidos.php");
        exit;
    }

    // Consulta SQL para obter os detalhes do pedido
    $query = "SELECT nome, email, endereco, metodo_pagamento, total FROM pedidos WHERE id = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $pedido = $resultado->fetch_assoc();
    $stmt->close();
} else {
    echo "ID do pedido inválido.";
    exit;
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda de Carros</title>
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

       

        footer {
            width: 100%;
            background-color: #343a40; /* Cor do fundo do rodapé */
            color: #ffffff; /* Cor do texto */
        }

        .container {
            max-width: 800px;
            margin-top: 30px;
        }

        .footer-content {
            padding: 2rem 0;
        }

        .footer-bottom {
            background-color: rgba(0, 0, 0, 0.2);
            padding: 1rem 0;
        }

        .social-icons a {
            color: #ffffff;
            margin: 0 10px;
            font-size: 1.5rem;
        }

        .footer-logo {
            width: 50px; /* Ajuste conforme o tamanho da imagem */
            height: auto;
            margin-right: 15px;
        }

        .company-info img {
            max-width: 100%;
            height: auto;
        }

        .footer-contact {
            margin-top: 1rem;
        }

     

main {
    padding: 20px 0;
}


table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #333;
    color: #fff;
}



/* Adicione este código ao seu arquivo gallery.css */
 
 
.container {
            max-width: 1200px;
            margin-top: 30px;
        }
        .table {
            margin-bottom: 30px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        
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
        <h2>Editar Pedido #<?= htmlspecialchars($id) ?></h2>
        <form method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($pedido['nome']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($pedido['email']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <textarea class="form-control" id="endereco" name="endereco" rows="3" required><?= htmlspecialchars($pedido['endereco']) ?></textarea>
            </div>
            <div class="mb-3">
                <label for="metodo_pagamento" class="form-label">Método de Pagamento</label>
                <input type="text" class="form-control" id="metodo_pagamento" name="metodo_pagamento" value="<?= htmlspecialchars($pedido['metodo_pagamento']) ?>" required>
            </div>
            <div class="mb-3">
                <label for="total" class="form-label">Total (AOA)</label>
                <input type="number" class="form-control" id="total" name="total" value="<?= htmlspecialchars(number_format($pedido['total'], 2, '.', '')) ?>" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Pedido</button>
            <a href="ver_pedidos.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>



  
  
     
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-7W90XwRoOmbovM8xxYwPCTjzMg8/xD9hpdeRAxX3+hvR93gPj6U6g6t+6HccgH7C" crossorigin="anonymous"></script>

     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>