<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="stylte.css"> <!-- Link para o CSS -->
</head>
<body>
    <header>
        <h1>Carrinho de Compras</h1> <!-- Título da página -->
        <nav>
            <ul>
                <li><a href="index.html#home">Home</a></li> <!-- Link para a seção Home -->
                <li><a href="index.html#cars">Carros</a></li> <!-- Link para a seção Carros -->
                <li><a href="index.html#contact">Contato</a></li> <!-- Link para a seção Contato -->
            </ul>
        </nav>
    </header>

    <section id="cart">
        <h2>Seu Carrinho</h2>
        <table id="cartTable">
            <thead>
                <tr>
                    <th>Carro</th> <!-- Nome do carro -->
                    <th>Preço (AOA)</th> <!-- Preço do carro -->
                    <th>Ação</th> <!-- Botão para remover o carro do carrinho -->
                </tr>
            </thead>
            <tbody>
                <!-- Itens do carrinho serão inseridos aqui dinamicamente -->
            </tbody>
        </table>
        <p>Total: AOA <span id="totalPrice">0</span></p> <!-- Mostra o total da compra -->
        <button onclick="proceedToPayment()">Finalizar Compra</button> <!-- Botão para prosseguir para a página de pagamento -->
    </section>

    <footer>
        <p>&copy; 2024 Venda de Carros. Todos os direitos reservados.</p> <!-- Rodapé da página -->
    </footer>

    <script>
        function loadCart() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let cartTable = document.getElementById('cartTable').getElementsByTagName('tbody')[0];
            let totalPrice = 0;

            cartTable.innerHTML = '';
            cart.forEach((item, index) => {
                let row = cartTable.insertRow();
                row.insertCell().textContent = item.car;
                row.insertCell().textContent = item.price.toLocaleString('pt-BR', { style: 'currency', currency: 'AOA' });
                let removeButton = document.createElement('button');
                removeButton.textContent = 'Remover';
                removeButton.onclick = () => {
                    removeFromCart(index);
                };
                row.insertCell().appendChild(removeButton);
                totalPrice += item.price;
            });

            document.getElementById('totalPrice').textContent = totalPrice.toLocaleString('pt-BR', { style: 'currency', currency: 'AOA' });
        }

        function removeFromCart(index) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.splice(index, 1);
            localStorage.setItem('cart', JSON.stringify(cart));
            loadCart();
        }

        function proceedToPayment() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            if (cart.length === 0) {
                alert('O carrinho está vazio. Adicione itens ao carrinho antes de finalizar a compra.');
                return;
            }
            window.location.href = 'pagamentos';  // Redireciona para a página de pagamento
        }

        window.onload = loadCart;  // Carrega o carrinho ao abrir a página
    </script>
</body>
</html>
