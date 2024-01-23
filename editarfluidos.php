<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Editar Fluidos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .container {
      width: 80%;
      margin: auto;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    h1 {
      text-align: center;
    }

    button {
      padding: 10px 20px;
      margin: 10px 0;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    #update-btn {
      background-color: #1E90FF;
      color: white;
    }
  </style>
</head>
<body>

<div class="container">
  <h1>Editar Fluidos</h1>

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
    $sql = "SELECT * FROM fluidos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Saída de cada linha
      while($row = $result->fetch_assoc()) {
        $tipo = $row["tipo"];
        $nome = $row["nome"];
        $litro = $row["litro"];
        $preco = $row["preco"];
        $estado = $row["estado"];
      }
    } else {
      echo "0 resultados";
    }
    $conn->close();
  ?>

  <form action="atualizarfluidos.php" method="post">
    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
    <label for="tipo">Tipo</label><br>
    <input type="text" id="tipo" name="tipo" value="<?php echo $tipo; ?>" required><br>
    <label for="nome">Nome</label><br>
    <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required><br>
    <label for="litro">Litros</label><br>
    <input type="text" id="litro" name="litro" value="<?php echo $litro; ?>" required><br>
    <label for="preco">Preço</label><br>
    <input type="text" id="preco" name="preco" value="<?php echo $preco; ?>" required><br>
    <label for="estado">Estado</label><br>
    <select id="estado" name="estado" required>
      <option value="">Selecione...</option>
      <option value="Disponivel" <?php if ($estado == 'Disponivel') echo 'selected="selected"'; ?>>Disponível</option>
      <option value="Não Disponivel" <?php if ($estado == 'Não Disponivel') echo 'selected="selected"'; ?>>Não Disponivel</option>
    </select><br>
    <button type="submit" id="update-btn">Atualizar</button>
  </form>
</div>

</body>
</html>
