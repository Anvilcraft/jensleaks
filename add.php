<?php

include "config.php";

if(isset($_POST['addleak'])){

    $name = $_POST['name'];
    $realname = $_POST['realname'];
    $phonenumber= $_POST['phonenumber'];
    $email = $_POST['email'];
    $wohnort = $_POST['wohnort'];
    $adresse = $_POST['adresse'];
    $kontonummer = $_POST['kontonummer'];
    $pic = $_POST['pic'];
    $bestMeme = $_POST['bestMeme'];

    $sql = "INSERT INTO `leaks` (`name`, `realname`, `phoneNumber`, `email`, `wohnort`, `adresse`, `bestMeme`, `kontonummer`, `face`) VALUES ('$name', '$realname', '$phonenumber', '$email', '$wohnort', '$adresse', '$bestMeme', '1234', '$pic')";
	if(strpos($sql,"script")){
		echo "Keine SQL Injection, LordMZTE";
	} else{
		    if(!mysqli_query($con, $sql)){
        echo "ERROR_INSERTING_SQL: ".mysqli_error($con);
    }else{
        echo "Leak erfolgreich hinzugefügt!";
        header('Location: index.php');
    }
	}

}