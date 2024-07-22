<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda de Carros</title>
    <link rel="stylesheet" href="stylte.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zyUjK5dbS2jG0cF26dHn87W2U1gV8rjOwM2wEfd" crossorigin="anonymous">
   
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

         


        .container1 {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}
main {
    padding: 20px 0;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 300px;
    margin: auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

label {
    margin-bottom: 10px;
}

input[type="file"] {
    margin-bottom: 20px;
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #45a049;
}
body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1;
        }
        .footer {
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 20px 0;
        }
        .footer a {
            color: #f8f9fa;
            text-decoration: none;
        }
        .footer a:hover {
            color: #adb5bd;
        }
        .social-icons a {
            margin: 0 10px;
            font-size: 1.5em;
        }

    </style>



        
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
                <li><a href="mensagem_admin.php">Mensagens</a></li>
                <li><a href="entrar.php">Sair</a></li>
             
            </ul>
        </nav>
    </header>
 <section></section>
 <section></section>
 <section></section>
    
    <main class="container1">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="imagem">Escolha uma imagem</label>
        <input type="file" name="imagem" id="imagem" accept="image/*" required>
        <br>
        <input type="submit" value="Cadastrar">
    </form>
</main>
     
    

<footer class="footer mt-auto py-3">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5>Sobre Nós</h5>
                    <p>Informações sobre a empresa, missão, visão, etc.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Contato</h5>
                    <p>Email: contato@empresa.com</p>
                    <p>Telefone: (11) 1234-5678</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Redes Sociais</h5>
                    <div class="social-icons">
                        <a href="#" class="text-light"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="mt-3">© 2024 Nome da Empresa. Todos os direitos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-7W90XwRoOmbovM8xxYwPCTjzMg8/xD9hpdeRAxX3+hvR93gPj6U6g6t+6HccgH7C" crossorigin="anonymous"></script>

     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
