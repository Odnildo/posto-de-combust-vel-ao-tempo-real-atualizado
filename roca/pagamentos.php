
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
         
        
    </style>
</head>
<body>
    <header>
        <h1 style="text-align: center;">ROCA´s company Lda</h1>
        <nav>
            <ul>
                <li><a href="carros.php">Home</a></li>
                <li><a href="frotas.php">Carros</a></li>
                <li><a href="entrar.php">Contatos</a></li>
            </ul>
        </nav>
    </header>
    <section></section>
    <section></section>
    
    <section id="payment">
        <h2>Finalizar Pedido</h2>
        <form id="paymentForm" action="process_pagamento.php" method="post">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="address">Endereço:</label>
            <input type="text" id="address" name="address" required>

            <h3>Item no Carrinho:</h3>
            <div id="selectedItem"></div>

            <label for="payment-method">Método de Pagamento:</label>
            <select id="payment-method" name="payment-method" required>
                <option value="">Selecione um método de pagamento</option>
                <option value="transferencia-bancaria">Transferência Bancária</option>
                <option value="boleto">Boleto</option>
            </select>

            <input type="hidden" id="cartData" name="cartData">

            <button type="submit">Finalizar Pedido</button>
        </form>
    </section>
    <section></section>
    <section></section>
    
 

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
        function loadItem() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let selectedItemDiv = document.getElementById('selectedItem');
            let totalAmount = 0;

            if (cart.length > 0) {
                selectedItemDiv.innerHTML = '';
                cart.forEach(item => {
                    selectedItemDiv.innerHTML += `${item.car} - ${item.price.toLocaleString('pt-BR', { style: 'currency', currency: 'AOA' })}<br>`;
                    totalAmount += item.price;
                });

                document.getElementById('cartData').value = JSON.stringify(cart);
                document.getElementById('payment-method').disabled = false;  // Habilitar o método de pagamento
            } else {
                selectedItemDiv.innerText = 'Nenhum carro selecionado.';
                document.getElementById('paymentForm').onsubmit = function(event) {
                    event.preventDefault();
                    alert('Você precisa adicionar itens ao carrinho para finalizar a compra!');
                };
                document.getElementById('payment-method').disabled = true;  // Desabilitar o método de pagamento
            }

            document.getElementById('selectedItem').innerHTML += `<br>Total: ${totalAmount.toLocaleString('pt-BR', { style: 'currency', currency: 'AOA' })}`;
        }

        window.onload = loadItem;
    </script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
