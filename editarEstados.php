<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
<style>
body {
  margin: 0;
  font-family: Arial, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #000;
}

.navbar a {
  float: left;
  display: block;
  color: #fff;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}


.navbar :hover {

  color: black;
}

.navbar .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .navbar a:not(:first-child) {display: none;}
  .navbar a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .navbar.responsive {position: relative;}
  .navbar.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .navbar.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}

.container {
  width: 80%;
  margin: auto;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
}

h2 {
  text-align: center;
}

button {
  padding: 10px 20px;
  margin: 10px 0;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

#close-btn {
  background-color: red;
  color: white;
}

#update-btn {
  background-color: #1E90FF;
  color: white;
}
</style>
</head>
<body>

<div class="navbar" id="myNavbar">
  <a>Admin  |</a>
  <a href="#news">Voltar</a>
  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">☰</a>
</div>

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
<br>
<br>
<br>
<br>
<br>
<div class="container">
  <h2>Editar Registro</h2>

  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bomba";

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
      die("Conexão falhou: " . $conn->connect_error);
    }

    $id = $_GET['id'];
    $sql = "SELECT id_combustivel,tipo_combustivel, estado, preco FROM combustivel WHERE id_combustivel = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Saída de cada linha
      while($row = $result->fetch_assoc()) {
        $tipo_combustivel = $row["tipo_combustivel"];
        $estado = $row["estado"];
        $preco = $row["preco"];
      }
    } else {
      echo "0 resultados";
    }
    $conn->close();
  ?>

  <form action="atualizar.php" method="post">
    <input type="hidden" id="id_combustivel" name="id_combustivel" value="<?php echo $id; ?>">
    <label for="tipo_combustivel">Combustível</label><br>
    <select id="tipo_combustivel" name="tipo_combustivel" required>
      <option value="">Selecione...</option>
      <option value="Gasolina" <?php if ($tipo_combustivel == 'Gasolina') echo 'selected="selected"'; ?>>Gasolina</option>
      <option value="Gasóleo" <?php if ($tipo_combustivel == 'Gasóleo') echo 'selected="selected"'; ?>>Gasóleo</option>
    </select><br>
    <br>
    <label for="estado">Estado</label><br>
    <select id="estado" name="estado" required>
      <option value="" >Selecione...</option>
      <option value="Disponivel" <?php if ($estado == 'Disponivel') echo 'selected="selected"'; ?>>Disponível</option>
      <option value="Não Disponivel" <?php if ($estado == 'Não Disponivel') echo 'selected="selected"'; ?>>Não Disponivel</option>
    </select><br>
    <br>
    <label for="preco">Preço</label><br>
    <input type="text" id="preco" name="preco" value="<?php echo $preco; ?>" required><br>
    <button type="submit" id="update-btn">Atualizar</button>
    <button type="button" id="close-btn" onclick="window.history.back();">Fechar/Voltar</button>
  </form>
</div>

</body>
</html>
