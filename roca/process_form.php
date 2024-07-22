<?php
$servername = "localhost"; // Nome do servidor onde o banco de dados está hospedado
$username = "root"; // Nome de usuário para acessar o MySQL
$password = ""; // Senha para acessar o MySQL
$dbname = "venda_de_carros"; // Nome do banco de dados que será utilizado

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname); // Cria uma nova conexão MySQLi

// Checar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error); // Termina o script e exibe uma mensagem de erro se a conexão falhar
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica se o método de requisição é POST
    $nome = $_POST['name']; // Obtém o valor do campo 'name' do formulário e o armazena na variável $nome
    $email = $_POST['email']; // Obtém o valor do campo 'email' do formulário e o armazena na variável $email
    $mensagem = $_POST['message']; // Obtém o valor do campo 'message' do formulário e o armazena na variável $mensagem

    // SQL para inserir dados na tabela 'mensagens'
    $sql = "INSERT INTO mensagens (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";

    if ($conn->query($sql) === TRUE) { // Executa a query SQL e verifica se foi bem-sucedida
        // Redirecionar para a página principal com um parâmetro de sucesso
        header("Location: carros.php?success=1"); // Redireciona o navegador para 'carros.php' com o parâmetro de sucesso
        exit(); // Certifique-se de sair após o redirecionamento
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error; // Exibe uma mensagem de erro se a query falhar
    }

    $conn->close(); // Fecha a conexão com o banco de dados
}
?>
