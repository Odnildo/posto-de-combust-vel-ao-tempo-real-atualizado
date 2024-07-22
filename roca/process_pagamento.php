<?php
$servername = "localhost";  // Substitua pelo endereço do servidor MySQL
$username = "root";         // Substitua pelo usuário do banco de dados
$password = "";             // Substitua pela senha do banco de dados
$dbname = "venda_de_carros";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $address = htmlspecialchars($_POST['address']);
    $paymentMethod = htmlspecialchars($_POST['payment-method']);
    $cartData = json_decode($_POST['cartData'], true);

    if (empty($cartData)) {
        echo "<script>
            alert('Nenhum item no carrinho. Adicione itens ao carrinho para finalizar o pedido!');
            window.location.href = 'pagamentos.php';
        </script>";
        exit();
    }

    $totalAmount = 0;
    foreach ($cartData as $item) {
        $totalAmount += $item['price'];
    }

    // Inserir dados do pedido na tabela 'pedidos'
    $stmt = $conn->prepare("INSERT INTO pedidos (nome, email, endereco, metodo_pagamento, total) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssd", $name, $email, $address, $paymentMethod, $totalAmount);

    if ($stmt->execute()) {
        $pedidoId = $stmt->insert_id;  // Obter o ID do pedido recém-criado

        // Inserir dados dos itens na tabela 'itens_pedido'
        $stmtItem = $conn->prepare("INSERT INTO itens_pedido (pedido_id, carro, preco) VALUES (?, ?, ?)");
        $stmtItem->bind_param("isd", $pedidoId, $carro, $preco);

        foreach ($cartData as $item) {
            $carro = $item['car'];
            $preco = $item['price'];
            $stmtItem->execute();
        }

        $stmtItem->close();

        // Limpar o carrinho após a finalização
        echo "<script>
            localStorage.removeItem('cart');
            alert('Pedido realizado  com sucesso!');
            window.location.href = 'carros.php';  // Redirecionar para a página inicial
        </script>";
    } else {
        echo "Falha ao processar o pedido: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
