<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Ver Fluidos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="CSS/fluido.css">
  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<div class="navbar" id="myNavbar">
  <a href="index.php">Admin  |</a>
  <a href="verfluidos.php">Fluídos</a>
  <a href="fluidos.php">Cadastrar Fluídos</a>
  <a href="verservico.php">Servíços</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>


<br>
<br>
<br>
  <h1>Ver Fluidos</h1>
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

  $sql = "SELECT * FROM fluidos";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table><thead><tr><th>ID</th><th>Tipo</th><th>Nome</th><th>Litros</th><th>Preço</th><th>Estado</th><th>Ações</th></tr></thead><tbody>";
    // Saída de cada linha
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["tipo"]."</td><td>".$row["nome"]."</td><td>".$row["litro"]."</td><td>".$row["preco"]."</td><td>".$row["estado"]."</td>";
        echo "<td><a href='editarfluidos.php?id=".$row["id"]."' class='btn btn-edit'>Editar</a> ";
        echo "<a href='formdele.php?id=".$row["id"]."' class='btn btn-delete'>Deletar</a></td></tr>";
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
