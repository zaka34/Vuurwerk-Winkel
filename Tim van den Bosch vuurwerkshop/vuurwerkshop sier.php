<html>
  <head>
    <title>Vuurwerk Shop HYP3 | Home</title>
    <link rel="stylesheet" href="webshop.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
  </head>
  <body>
  	<header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">HYP3</span> Vuurwerk SHOP</h1>
        </div>
        <nav>
          <ul>
            <li> <a><a href="vuurwerkshop home.php">home</a></a></li>
            <li> <a><a href="vuurwerkshop sier.php">siervuurwerk</a></a></li>
            <li> <a><a href="vuurwerkshop knal.php">knalvuurwerk</a></a></li>
            <li> <a> 
            <a href="#" class="btn btn-info btn-lg">
            <span class="glyphicon glyphicon-shopping-cart"></span>winkelwagen</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>
  </body>
<?php

// Auteur: Tim van den Bosch JLSVAPM1G
try {
		// Initialisatie
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vuurwerk";
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$result = $conn -> query("SELECT * FROM `product` WHERE Catagorie='sier'");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		
		//echo "Connected successfully<br>"; 
    }
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

	echo '<div class="vuurwerk">';

while ($row = $result->fetch()) {
	echo '<div class="box">';
	echo "<img src=".$row['URL_Afbeelding'] . " >";
	echo '<h3>'.$row['Naam'] . "</h3>";
	//echo $row['URL_Afbeelding'] . "<br>";
	echo '<h3>'.$row['prijs'] . "</h3>";
	echo '<div class="knop">';
	echo 'bestel'."</br>";
	echo '</div>';
	echo '</div>';
}


?>
</html>