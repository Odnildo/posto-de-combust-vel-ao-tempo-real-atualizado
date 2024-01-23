<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/cssfile.css">
</head>
<body>
    <!-- Navegação -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">ODANGOL</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">SOBRE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">PRODUTOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">HOME</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Carrossel de Imagens -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/p.jpg" class="d-block w-100" alt="100px;">
            </div>
            <div class="carousel-item">
                <img src="img/s.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/a.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div>
    <br>
    <br>
    <br>

    <h1 class="heading-title"> Tempo Real</h1>
    <!-- Seu código PHP aqui -->
	<!-- Primeira Seção -->



    <div class="container">
        <div class="row">
            <!-- Primeira Seção -->
            <section class="servicos col-lg-6">
                <!-- ... código PHP para a primeira seção ... -->
                <br>
                <br>
                
    <div class="box-container">
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
        // Cria a conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Altere a consulta SQL para buscar o primeiro registro
        $sql = "SELECT * FROM combustivel ORDER BY id_combustivel ASC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Saída de cada linha
            while($row = $result->fetch_assoc()) {
                echo "<div class='box'>";
                echo "<img src='img/icons8_gas_station.ico' alt=''>";
                echo "<h3>".$row["tipo_combustivel"]."</h3>";
                echo "<h3>".$row["estado"]."</h3>";
                echo "<h3>$".$row["preco"]." Kwz Lt</h3>";
                echo "</div>";
            }
        } else {
            echo "0 resultados";
        }
        ?>
    </div>
    <br>
            </section>
<br>
<br>
            <!-- Segunda Seção -->
            <section class="servicos col-lg-6">
                <br>
                <br>
                
                
                <!-- ... código PHP para a segunda seção ... -->
                <div class="box-container">
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
        // Altere a consulta SQL para buscar o segundo registro
        $sql = "SELECT * FROM combustivel ORDER BY id_combustivel ASC LIMIT 1 OFFSET 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Saída de cada linha
            while($row = $result->fetch_assoc()) {
                echo "<div class='box'>";
                echo "<img src='img/icons8_gas_station.ico' alt=''>";
                echo "<h3>".$row["tipo_combustivel"]."</h3>";
                echo "<h3>".$row["estado"]."</h3>";
                echo "<h3>$".$row["preco"]." Kwz Lt</h3>";
                echo "</div>";
            }
        } else {
            echo "0 resultados";
        }
        $conn->close();
        ?>
    </div>

            </section>
        </div>
    </div>

    <!-- Rodapé -->
	<footer class="bg-dark text-white mt-5 p-4 text-center">
  Direitos autorais © <?php echo date("Y"); ?> odmildo
</footer>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/jsfile.js"></script>
</body>
</html>















