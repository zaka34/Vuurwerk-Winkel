<!DOCTYPE html>
<html>
  <head>
    <title>Vuurwerk Shop HYP3 | Home</title>
    <link rel="stylesheet" href="./css/vuurwerkshop6.css">

  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">HYP3</span> Vuurwerk SHOP</h1>
        </div>
        <nav>
          <ul>
            <li> <a href="home.php">home</a> </li>
            <li> <a href="knalvuurwerk.php">knalvuurwerk</a> </li>
            <li> <a href="siervuurwerk.php">siervuurwerk</a> </li>
            <li> <a href="alles.php">geheel assortiment</a> </li>
            <li> <a href="winkelwagen.php">winkelwagen</a> </li>
            <li> <a href="ons.php">over ons</a> </li>
            
          </ul>
        </nav>
      </div>
    </header>
    



    <section id="showcase">
      <div class="container">
        <h1>HYP3 vuurwerk shop</h1>
        <p>knallend en veilig 2020 in ! </p>
      </div>
    </section>

    <section id="newsletter">
      <div class="container">
        <h1>knalvuurwerk</h1>
        <form>
          <button type="submit" class="button_1"><a href="winkelwagen.php">winkelwagen</a> <img src="./img/winkelwagen.jpg"> </button>   
        </form>
      </div>
    </section>




    <section id="wrapper">
      <div class="wrapper">
      <?php 

try { 

$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "knalvuurwerk"; 

    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
    $result = $conn -> query("SELECT * from product"); 
    $result->setFetchMode(PDO::FETCH_ASSOC); 

    echo " <br> .<br>"; 
    }
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}


$result = $conn -> query("SELECT * from product");
    echo "<div class= wrapper>";
    while ($row = $result->fetch()) { 
        echo"<div class='box'>";
    echo "<img src=".$row['url_afbeelding'] . ">";
    echo"<div class='url_afbeelding'></div>";
    echo '<h3>'. $row['naam'] . "<h3>";
    echo"<div class='naam'></div>";
    echo "&euro;".$row['prijs'] . "<br>";
    echo"<div class='prijs'></div>";
    //echo "<button> product toevoegen </button>";
    echo '<button type="button"> ' . 'toevoegen</button>';
    echo '</div>'; 

    }
    echo '</div>'; 
    
    ?>

</div>
    </section>

    <footer>
      <p>HYP3 Techniek College Rotterdam 1G , Copyright &copy; 2019/2020</p>
    </footer>
  </body>
</html>