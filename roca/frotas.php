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
$query = "SELECT id, nome, tipo,carro,preco FROM imagens";
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

        #cars {
            padding: 2rem 0;
        }

        .car {
            border: 1px solid #ddd; /* Borda sutil para os cards */
            border-radius: 8px; /* Bordas arredondadas */
            overflow: hidden; /* Garante que a imagem não saia dos limites do card */
            background-color: #fff; /* Fundo branco para contraste */
            text-align: center;
            transition: box-shadow 0.3s ease; /* Efeito de transição para o box-shadow */
        }

        .car img {
            width: 100%; /* A imagem ocupa 100% da largura do card */
            height: 150px; /* Altura fixa para a imagem */
            object-fit: cover; /* Ajusta a imagem para cobrir a área do card */
        }

        .car h3 {
            margin: 1rem 0 0.5rem; /* Margem em torno do título */
            font-size: 1.25rem; /* Tamanho da fonte do título */
        }

        .car p {
            margin: 0.5rem 0; /* Margem para os parágrafos */
            font-size: 1rem; /* Tamanho da fonte do texto */
        }

        .car button {
            margin: 1rem 0; /* Margem para o botão */
            background-color: #007bff; /* Cor de fundo do botão */
            border: none; /* Remove a borda padrão */
            color: #fff; /* Cor do texto do botão */
            padding: 0.5rem 1rem; /* Preenchimento do botão */
            border-radius: 4px; /* Bordas arredondadas para o botão */
            cursor: pointer; /* Cursor de ponteiro para indicar que é clicável */
        }

        .car:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Adiciona sombra ao card ao passar o mouse */
        }

        .car-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem; /* Espaçamento entre os cards */
        }


        
.gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.card {
    width: 200px;
    margin: 10px;
    
    border-radius: 8px;
    overflow: hidden;
}

.card img {
    width: 100%;
    height: auto;
    transition: transform 0.3s ease;
}

.card:hover img {
    transform: scale(1.1);
}
         
        
    </style>
</head>
<body>
    <header>
        <h1 style="text-align: center;">ROCA´s company Lda</h1>
        <nav>
            <ul>
                <li><a href="carros.php">Home</a></li>
                <li><a href="frotas.php">Carros</a></li>
                <li><a href="entrar.php">Conta</a></li>
            </ul>
        </nav>
    </header>
    <section></section>
    <section></section>
    <h2>Frotas</h1>

    <main class="container">
    <?php if ($dados): ?>
        <div class="gallery">
            <?php foreach ($dados as $linha): ?>
                <div class="card">
                    <a href="detalhes.php?id=<?= htmlspecialchars($linha['id']) ?>">
                        <img src="img/<?= htmlspecialchars($linha['nome']) ?>" alt="<?= htmlspecialchars($linha['carro']) ?>">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($linha['carro']) ?></h5>
                        <p class="card-price"><?= htmlspecialchars($linha['preco']) ?> AOA</p>
                        <button onclick="addToCart('<?= htmlspecialchars($linha['carro']) ?>', <?= htmlspecialchars($linha['preco']) ?>)">Adicionar ao Carrinho</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Nenhuma imagem cadastrada.</p>
    <?php endif; ?>
</main>




    

<section id="cart">
    <h2>Seu Carrinho</h2>
    <table id="cartTable">
        <thead>
            <tr>
                <th>Carro</th>
                <th>Preço (AOA)</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <!-- Itens serão adicionados aqui dinamicamente -->
        </tbody>
    </table>
    <p>Total: AOA <span id="totalPrice">0</span></p>
    <button onclick="checkout()">Finalizar Pedidos</button>
</section>


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
    </div>

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
        let cartTableBody = document.getElementById('cartTable').getElementsByTagName('tbody')[0];
        let totalPrice = 0;

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

    function checkout() {
        window.location.href = 'pagamentos.php';
    }

    window.onload = updateCart;
</script>

     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
