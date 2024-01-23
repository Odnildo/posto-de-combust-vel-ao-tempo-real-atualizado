<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Serviços</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="CSS/fluido.css">
  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<div class="navbar" id="myNavbar">
  <a href="index.php">Admin  |</a>
  <a href="verfluidos.php">Fluídos</a>
  <a href="servicos.php">Cadastrar Serviços</a>
  <a href="verservico.php">Servíços</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<br>
<br>
<br>
  <h1>Serviços</h1>
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

  $sql = "SELECT * FROM servicos";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table><thead><tr><th>ID</th><th>Nome</th><th>Descrição</th><th>Preço</th><th>Ações</th></tr></thead><tbody>";
    // Saída de cada linha
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["nome"]."</td><td>".$row["descricao"]."</td><td>".$row["preco"]."</td>";
        echo "<td><a href='editarservico.php?id=".$row["id"]."' class='btn btn-edit'>Editar</a> ";
        echo "<a href='form-dele-servico.php?id=".$row["id"]."' class='btn btn-delete'>Deletar</a></td></tr>";
      }
      echo "</tbody></table>";
    } else {
      echo "0 resultados";
    }
    $conn->close();
    ?>
  

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
