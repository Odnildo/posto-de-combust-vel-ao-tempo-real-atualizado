 

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

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%; /* Ajuste conforme necessário */
            height: 100%;
            background-color: transparent; /* Remove o fundo */
            border: none; /* Remove a borda */
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.5); /* Cor dos ícones */
            border-radius: 50%; /* Forma redonda para os ícones */
        }

        .carousel-control-prev-icon {
            background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"%3E%3Cpath fill="currentColor" d="M11.493 14.493a.75.75 0 0 1-1.06 1.061l-5.5-5.5a.75.75 0 0 1 0-1.061l5.5-5.5a.75.75 0 0 1 1.06 1.061L7.56 8l3.933 3.933a.75.75 0 0 1 0 1.061z"/%3E%3C/svg%3E');
        }

        .carousel-control-next-icon {
            background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"%3E%3Cpath fill="currentColor" d="M4.507 1.507a.75.75 0 0 1 1.06-1.061l5.5 5.5a.75.75 0 0 1 0 1.061l-5.5 5.5a.75.75 0 0 1-1.06-1.061L8.44 8 .507 4.067A.75.75 0 0 1 4.507 1.507z"/%3E%3C/svg%3E');
        }

        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }

        .carousel-caption h5 {
            font-size: 2rem;
            font-weight: bold;
        }

        .carousel-caption p {
            font-size: 1.2rem;
        }

        .carousel-caption .btn {
            padding: 10px 20px;
            font-size: 1rem;
            background-color: #007bff;
            border: none;
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

        .card-img {
            height: 150px; /* Ajuste conforme necessário */
            object-fit: cover;
        }

        .card-info {
            margin-top: 1rem;
        }

        .cards-container {
            margin: 4rem 0;
        }

        .card {
            background-color: #343a40; /* Cor de fundo do card */
            color: #ffffff; /* Cor do texto */
        }

        .card-title {
            font-size: 1.25rem;
        }

        .card-text {
            font-size: 1rem;
        }
        
    </style>
</head>
<body>
    <header>
        <h1>ROCA´s company Lda</h1>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="frotas.php">Carros</a></li>
                <li><a href="mensagem_usuario.php">Mensgaem</a></li>
                <li><a href="entrar.php">Conta</a></li>
             
            </ul>
        </nav>
    </header>

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/IMG-20240708-WA0028.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Bem-vindo à ROCA's Company</h5>
                    <p>Encontre o carro dos seus sonhos</p>
                    <a href="frotas.php" class="btn btn-primary">Ver Carros</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/IMG-20240708-WA0027.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Qualidade e Confiança</h5>
                    <p>Os melhores veículos para você</p>
                    <a href="frotas.php" class="btn btn-primary">Ver Carros</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/IMG-20240708-WA0026.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Ofertas Imperdíveis</h5>
                    <p>Descontos especiais em veículos selecionados</p>
                    <a href="frotas.php" class="btn btn-primary">Ver Carros</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
    <div class="container">
        <div class="row cards-container">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img src="img/pexels-rpnickson-2526128.jpg" class="card-img" alt="Car 1">
                    <div class="card-body">
                        <h5 class="card-title">Carro Premium</h5>
                        <p class="card-text">Experimente o conforto e a tecnologia dos nossos carros premium.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img src="img/pexels-simranpreet-singh-1157199357-23476484.jpg" class="card-img" alt="Car 2">
                    <div class="card-body">
                        <h5 class="card-title">Carro Esportivo</h5>
                        <p class="card-text">Experimente o conforto e a tecnologia dos nossos carros premium</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img src="img/pexels-pixabay-78793.jpg" class="card-img" alt="Car 3">
                    <div class="card-body">
                        <h5 class="card-title">Carro Familiar</h5>
                        <p class="card-text">Experimente o conforto e a tecnologia dos nossos carros premium</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img src="img/pexels-roman-odintsov-4553618.jpg" class="card-img" alt="Car 4">
                    <div class="card-body">
                        <h5 class="card-title">Carro Ecológico</h5>
                        <p class="card-text">Experimente o conforto e a tecnologia dos nossos carros premium</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

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
