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

$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
   
    <title>Detalhes do Item</title>
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
    .item-details {
        text-align: center;
        margin: 20px;
    }

    .item-details img {
        max-width: 100px;
        height: 900px;
        margin-bottom: 20px;
    }

    .item-details h2 {
        margin: 20px 0;
    }

    .item-details p {
        margin: 10px 0;
    }

    .item-details form {
        margin-top: 20px;
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

        .item-details  button {
            margin: 1rem 0; /* Margem para o botão */
            background-color: #007bff; /* Cor de fundo do botão */
            border: none; /* Remove a borda padrão */
            color: #fff; /* Cor do texto do botão */
            padding: 0.5rem 1rem; /* Preenchimento do botão */
            border-radius: 4px; /* Bordas arredondadas para o botão */
            cursor: pointer; /* Cursor de ponteiro para indicar que é clicável */
        }
</style>

</head>
<header>
        <h1>ROCA´s company Lda</h1>
        <nav>
            <ul>
                <li><a href="carros.php">Home</a></li>
                <li><a href="frotas.php">Carros</a></li>
                <li><a href="entrar.php">Conta</a></li>
             
            </ul>
        </nav>
    </header>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php if ($item): ?>
        <div class="item-details">
            <img src="img/<?= htmlspecialchars($item['nome']) ?>" alt="<?= htmlspecialchars($item['carro']) ?>" style="max-width: 100%;">
            <h2><?= htmlspecialchars($item['carro']) ?></h2>
            <p>Preço: <?= htmlspecialchars($item['preco']) ?> AOA</p>
            <p>Descrição: <?= htmlspecialchars($item['descricao']) ?></p>
            <form method="post" action="javascript:addToCart('<?= htmlspecialchars($item['carro']) ?>', <?= htmlspecialchars($item['preco']) ?>)">
                <button type="submit">Adicionar ao Carrinho</button>
            </form>
        </div>
    <?php else: ?>
        <p>Item não encontrado.</p>
    <?php endif; ?>

       

    <footer class="text-white text-center text-lg-start bg-dark">
            <div class="container footer-content">
                <div class="row mt-4">
                    <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                        <h5 class="text-uppercase mb-4">Sobre a empresa</h5>
                        <p>
                        A ROCA's Company Lda é uma líder no setor de venda de carros, dedicada a fornecer veículos de alta qualidade e serviços excepcionais. 
                        </p>
                        <p>
                        Desde a nossa fundação, temos o compromisso de oferecer a melhor experiência de compra de veículos, atendendo às necessidades e expectativas dos nossos clientes com profissionalismo e atenção aos detalhes.
                        </p>
                        <div class="mt-4">
                            <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-facebook-f"></i></a>
                            <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-dribbble"></i></a>
                            <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-twitter"></i></a>
                            <a type="button" class="btn btn-floating btn-light btn-lg"><i class="fab fa-google-plus-g"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                        <ul class="fa-ul" style="margin-left: 1.65em;">
                            <li class="mb-3">
                                <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">Morro Bento, 00-967, Luanda</span>
                            </li>
                            <li class="mb-3">
                                <span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-2">JorgeRoca@gmail.com</span>
                            </li>
                            <li class="mb-3">
                                <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+ 244 931 306 306</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="text-center footer-bottom">
                © 2024 Copyright:
                <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
            </div>
        </footer>

    <script>
        function addToCart(car, price) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.push({ car: car, price: price });
            localStorage.setItem('cart', JSON.stringify(cart));
            alert(car + ' foi adicionado ao carrinho!');
            updateCart();
        }

        function updateCart() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let cartTableBody = document.getElementById('cartTable') ? document.getElementById('cartTable').getElementsByTagName('tbody')[0] : null;
            let totalPrice = 0;

            if (cartTableBody) {
                cartTableBody.innerHTML = '';  // Clear existing items

                cart.forEach(item => {
                    let row = cartTableBody.insertRow();
                    row.insertCell(0).innerText = item.car;
                    row.insertCell(1).innerText = item.price.toLocaleString('pt-BR', { style: 'currency', currency: 'AOA' });
                    let removeCell = row.insertCell(2);
                    let removeButton = document.createElement('button');
                    removeButton.innerText = 'Remover';
                    removeButton.onclick = () => {
                        cart = cart.filter(cartItem => cartItem !== item);
                        localStorage.setItem('cart', JSON.stringify(cart));
                        updateCart();
                    };
                    removeCell.appendChild(removeButton);
                    totalPrice += item.price;
                });

                document.getElementById('totalPrice').innerText = totalPrice.toLocaleString('pt-BR', { style: 'currency', currency: 'AOA' });
            }
        }

        function checkout() {
            window.location.href = 'pagamentos.php';
        }

        window.onload = updateCart;
    </script>
</body>
</html>
