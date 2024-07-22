<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o arquivo foi enviado sem erros
    if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == 0) {
        
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

        // Diretório onde as imagens serão salvas
        $diretorioDestino = 'uploads/';
        if (!is_dir($diretorioDestino)) {
            mkdir($diretorioDestino, 0777, true);
        }

        $nomeArquivo = basename($_FILES["imagem"]["name"]);
        $caminhoArquivo = $diretorioDestino . $nomeArquivo;

        // Move o arquivo para o diretório destino
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $caminhoArquivo)) {
            // Insere o caminho da imagem no banco de dados
            $query = "INSERT INTO imagens (nome, tipo, caminho) VALUES (?, ?, ?)";
            $stmt = $conexao->prepare($query);
            $stmt->bind_param("sss", $_FILES["imagem"]["name"], $_FILES["imagem"]["type"], $caminhoArquivo);

            if ($stmt->execute()) {
                echo "<script type='text/javascript'>alert('Imagem Cadastrada com Sucesso'); window.location.href='admin.php';</script>";
            } else {
                echo "Erro ao cadastrar a imagem: " . $stmt->error;
            }

            // Fecha a conexão com o banco de dados
            $stmt->close();
        } else {
            echo "Erro ao mover a imagem para o diretório destino.";
        }

        $conexao->close();
    } else {
        echo "Erro no envio da imagem.";
    }
}
?>
