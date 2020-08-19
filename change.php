<html>
<head>
    <meta charset="UTF-8">
    <title>Change | JensLeaks</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://jensmemes.tilera.xyz/img/favicon.ico">
    <!-- Das neueste kompilierte und minimierte CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optionales Theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Das neueste kompilierte und minimierte JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="style.css">
</head>
<body>


    <?php
    include "config.php";
    $sql = "SELECT * FROM leaks WHERE id=".$_GET['id'];
    $db_erg = mysqli_query( $con, $sql );
    if ( ! $db_erg )
    {
        die('Ungültige Abfrage: ' . mysqli_error());
    }
    if(isset($_POST['updateleak'])){

        $name = $_POST['name'];
        $realname = $_POST['realname'];
        $phonenumber= $_POST['phonenumber'];
        $email = $_POST['email'];
        $wohnort = $_POST['wohnort'];
        $adresse = $_POST['adresse'];
        $kontonummer = $_POST['kontonummer'];
        $pic = $_POST['pic'];
        $bestMeme = $_POST['bestMeme'];

        $sql = "UPDATE `leaks` SET `name` = '$name', `realname` = '$realname', `phoneNumber` = '$phonenumber', `email` = '$email', `wohnort` = '$wohnort', `adresse` = '$adresse', `bestMeme` = '$bestMeme', `face` = '$pic' WHERE `leaks`.`id` = 4";

        if(!mysqli_query($con, $sql)){
            echo "ERROR_INSERTING_SQL: ".mysqli_error($con);
        }else{
            echo "Leak erfolgreich hinzugefügt!";
            header('Location: index.php');
        }
    }
    while ($zeile = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC))
    {
        echo '
        <h2><b>Ändern: </b>'.$zeile['name'].'</h2>
        
        <form action="#" method="post">
         <i>Name: </i><input type="text" name="name" class="input input-sm input-add" value="'.$zeile['name'].'"><br>
         <i>RealName: </i><input type="text" name="realname" class="input input-sm input-add" value="'.$zeile['realname'].'"><br>
         <i>Handynummer: </i><input type="text" name="phonenumber" class="input input-sm input-add" value="'.$zeile['phoneNumber'].'"><br>
         <i>EMail Adresse: </i><input type="email" name="email" class="input input-sm input-add" value="'.$zeile['email'].'"><br>
         <i>Wohnort: </i><input type="text" name="wohnort" class="input input-sm input-add" value="'.$zeile['wohnort'].'"><br>
         <i>Adresse: </i> <input type="text" name="adresse" class="input input-sm input-add" value="'.$zeile['adresse'].'"><br>
         <i>Bestes Meme (URL): </i><input type="text" name="kontonummer" class="input input-sm input-add" value="'.$zeile['bestMeme'].'"><br>
         <i>kontonummer: </i><input type="text" name="pic" class="input input-sm input-add" value="'.$zeile['kontonummer'].'"><br>
         <i>Profilbild-URL: </i><input type="text" name="bestMeme" class="input input-sm input-add" value="'.$zeile['face'].'"><br>
         <i>Name: </i> <input type="submit" name="updateleak" value="Absenden" class=" submit-add">
        </form>
        
        
';
    }
    mysqli_free_result( $db_erg);

    ?>
</body>
</html>