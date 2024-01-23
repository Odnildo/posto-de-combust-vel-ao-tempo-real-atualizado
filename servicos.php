<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Página Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="CSS/style.css">
  <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: white;
  }

  .container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
  }

  h1 {
    text-align: center;
    color: #333;
  }

  .form-group {
    margin-bottom: 15px;
  }

  label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }

  input[type="text"], input[type="number"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
  }

  button {
    display: block;
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    color: #fff;
    background-color: #007BFF;
    cursor: pointer;
    font-size: 18px;
  }

  button:hover {
    background-color: #0056b3;
  }
</style>
  </head>
<body>
<div class="navbar" id="myNavbar">
  <a href="index.php">Admin  |</a>
  <a href="verfluidos.php">Fluídos</a>
  
  <a href="verservico.php">Servíços</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<div class="container">
  <h1>Cadastrar Serviços</h1>
  <form action="cadastrarservicos.php" method="post" enctype="multipart/form-data">
  
    <div class="form-group">
      <label for="nome">Nome do Serviço:</label>
      <input type="text" id="nome" name="nome" required>
    </div>
    <div class="form-group">
      <label for="descricao">Descrição:</label>
      <input type="text" id="descricao" name="descricao" required>
    </div>
    <div class="form-group">
      <label for="preco">Preço:</label>
      <input type="number" id="preco" name="preco" required>
    </div>
   
    
    <button type="submit">Cadastrar</button>
  </form>
</div>




<!-- Rodapé -->
<!-- <footer class="bg-dark text-white mt-5 p-4 text-center">
  Direitos autorais © <?php echo date("Y"); ?> odmildo
</footer> -->

<script>
function myFunction() {
  var x = document.getElementById("myNavbar");
  if (x.className === "navbar") {
    x.className += " responsive";
  } else {
    x.className = "navbar";
  }
}
</script>
</body>
</html>
