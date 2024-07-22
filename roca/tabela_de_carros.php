<?php
session_start();

// Verifica se o usuário está autenticado e possui permissões de administrador
if (!(isset($_SESSION["user_id"]) && isset($_SESSION["role"]) && $_SESSION["role"] == "admin")) {
    // Se não for um administrador, redireciona para a página do usuário comum ou para a página de login
    header("Location:usuario.php");
    exit();
}
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
$query = "SELECT id, nome, tipo,carro, preco, descricao FROM imagens";
$resultado = $conexao->query($query);

// Verifica se houve resultados
if ($resultado->num_rows > 0) {
    // Retorna os resultados como um array associativo
    $dados = $resultado->fetch_all(MYSQLI_ASSOC);
} else {
    // Retorna um array vazio se não houver resultados
    $dados = [];
}

// Fecha a conexão com o banco de dados
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
            padding: 0;
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

button {
    padding: 8px 12px;
    margin: 4px;
    cursor: pointer;
}

button.editar {
    background-color: #3498db;
    color: #fff;
    border: none;
}

button.deletar {
    background-color: #e74c3c;
    color: #fff;
    border: none;
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
    
  
<main class="container">
    <?php if ($dados): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagem</th>
                    <th>Tipo</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dados as $linha): ?>
                    <tr>
                        <td><?= $linha['id'] ?></td>
                        <td><img src="img/<?= $linha['nome'] ?>" alt="<?= $linha['nome'] ?>" width="50"></td>
                        <td><?= $linha['tipo'] ?></td>
                        <td>
                            <a  style="text-decoration:none;"  href="editar_imagem.php?id=<?= $linha['id'] ?>">Editar</a>
                            <a style="text-decoration:none;" href="deletar_imagem.php?id=<?= $linha['id'] ?>">Deletar </a>
                             </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum dado encontrado.</p>
    <?php endif; ?>
</main>
     
    

    
    
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
