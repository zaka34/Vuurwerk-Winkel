<?php
//auteur:Zakaria Aharchaou  klas:1G
 

//initalisatie
$servername = "localhost";
$username = "zaka";
$password = "1234567";

$dropsql = "DROP DATABASE IF EXISTS Overzicht;";
$createsql = "CREATE DATABASE Overzicht;";

$createtable = "CREATE TABLE `Afspraken`(
`maandag` VARCHAR(60), 
`dinsdag` VARCHAR(60), 
`woensdag` VARCHAR(60), 
`donderdag` VARCHAR(60), 
`vrijdag` VARCHAR(60), 
`zaterdag` VARCHAR(60), 
`zondag` VARCHAR(60)
)";


//connectie en PDO
$conn1 = new PDO("mysql:host=$servername; dbname=Overzicht", $username, $password);
$conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$table_insert = (
    "INSERT INTO `Afspraken` VALUES('school<br>','boodschappen<br>','bijles<br>','training<br>','uiteten<br>','voetbal<br>','werken<br>');"
);
//als je hem netjes onder elkaar doe deze "INSERT INTO `Afspraken` VALUES('<br>school<br>','boodschappen<br>','bijles<br>','training<br>','uiteten<br>','voetbal<br>','werken<br>');"  
//als je hem gewoon goed wil voor in database doe deze "INSERT INTO `Afspraken` VALUES('school','boodschappen','bijles','training','uiteten','voetbal','werken');"
$sql = "SELECT * FROM `Afspraken`";

$result = $conn1->prepare($sql);

//functies        
function Connection($servername, $username, $password){
try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully <br>";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}

function CreateDatabase($createsql, $dropsql, $conn){ 
try{
    $conn->exec($dropsql);
    $conn->exec($createsql);
    }
    catch(PDOExcepetion $e){
        Echo "Error " .$e->getMessage();
    }
    echo "Database succesvol aangemaakt. <br>";
}

function CreateTable($conn1,$createtable){
    $conn1->exec($createtable);
    echo "Tabel succesvol aangemaakt. <br>";
}

function InsertTable($conn1, $table_insert){
    $conn1->exec($table_insert);
    echo "Inserten succesvol gelukt. <br>";
}

function PrintTable($result){
    for($i=0; $row = $result->fetch(); $i++){
        echo "<br>maandag " .$row['maandag'];
        echo "dinsdag " .$row['dinsdag'];
        echo "woensdag " .$row['woensdag'];
        echo "donderdag " .$row['donderdag'];
        echo "vrijdag " .$row['vrijdag'];
        echo "zaterdag " .$row['zaterdag'];
        echo "zondag " .$row['zondag'];
    }echo "<br>Printen van tabel succesvol gelukt. <br>";

}



//main
CreateDatabase($createsql, $dropsql, Connection($servername, $username, $password));
CreateTable($conn1,$createtable);
InsertTable($conn1,$table_insert);
$result->execute();
PrintTable($result);



echo "Proces succesvol afgerond. <br>";




?>