<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel='stylesheet' href='index.css'>
</head>

<body>

    <body>
        <section>
            <div class="form-box">
                <div class="form-value">
                    <form  action="processar_login.php" method="post">
                        <h2>Login</h2>
                        <div class="inputbox"> <ion-icon name="person-circle-outline"></ion-icon> <input type="text" id="username" name="username" required>
                            <label>Usuário</label>
                        </div>
                        <div class="inputbox"> <ion-icon name="lock-closed-outline"></ion-icon>  <input type="password" id="password" name="password" required><label>Senha</label> </div>
                        <button type="submit">Iniciar Sessão</button>
                        <div class="register">
                            <p>Não tem uma conta? <a href="cadastro.php">Cadastra-se</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section> 
    </body>
</body>

</html>