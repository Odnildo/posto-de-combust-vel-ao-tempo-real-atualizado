<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="CSS/fluido.css">
  <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<div class="navbar" id="myNavbar">
  <a href="#home">Admin  |</a>
  <a href="verfluidos.php">Fluídos</a>
  <a href="verservico.php">Servíços</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<br>
<br>
<br>
<br>
<br>

<h2>Combustíveis ao Tempo Real</h2>

<table>
  <tr>
    <th>ID</th>
    <th>Combustível</th> 
    <th>Estado</th>
    <th>Preço</th>
    <th>Ação</th>
  </tr>
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

    $sql = "SELECT id_combustivel,tipo_combustivel, estado, preco FROM combustivel";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Saída de cada linha
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id_combustivel"]."</td><td>".$row["tipo_combustivel"]."</td><td>".$row["estado"]."</td><td>".$row["preco"]."</td>";
        echo "<td><a href='editarEstados.php?id=".$row["id_combustivel"]."'class='btn btn-edit'>Editar</a></td></tr>";
      }
    } else {
      echo "<tr><td colspan='5'>0 resultados</td></tr>";
    }
    $conn->close();
  ?>
</table>

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





