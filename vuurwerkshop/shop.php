<?php 

try { 

$servername = "localhost"; 
$username = "root"; 
$password = "";
$dbname = "vuurwerk1_select"; 

    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
    $result = $conn -> query("SELECT * from product"); 
    $result->setFetchMode(PDO::FETCH_ASSOC); 

    echo "Connected successfully<br>"; 
    }
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}


$result = $conn -> query("SELECT * from product");
while ($row = $result->fetch()) { 
        echo $row['naam'] . "<br>"; 
        echo $row['prijs'] . "<br>"; 
        echo "<img src=".$row['url_afbeelding'] . ">"; 

}

?>
