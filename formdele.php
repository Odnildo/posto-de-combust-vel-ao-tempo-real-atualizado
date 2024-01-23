<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Deletar Fluidos</title>
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

    #delete-btn {
      background-color: red;
      color: white;
    }
  </style>
</head>
<body>

<div class="container">
  <h1>Deletar Fluidos</h1>

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

  <form action="deletarfluidos.php" method="get">
    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
    <p>Tem certeza de que deseja deletar o seguinte fluido?</p>
    <p>Tipo: <?php echo $tipo; ?></p>
    <p>Nome: <?php echo $nome; ?></p>
    <p>Litros: <?php echo $litro; ?></p>
    <p>Preço: <?php echo $preco; ?></p>
    <p>Estado: <?php echo $estado; ?></p>
    <button type="submit" id="delete-btn">Deletar</button>
  </form>
</div>

</body>
</html>
