<html>
<head>
    <meta charset="UTF-8">
    <title>JensLeaks</title>
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
<body onload="hideAdd()">


<h1>JensLeaks - Eine Plattform für Leaks und co</h1>
Made by <a href="https://twitter.com/ITbyHF" target="_blank">ITbyHF</a>, Idea from <a href="https://twitter.com/leytilera" target="_blank">tilera</a>
<br><a href="https://discord.gg/H26RnTS"><img src="discord.png" class="discord"></a>
<?php
include "config.php";
?>

<h2>Neuer Leak</h2>
<button id="btnaddleak" class="btn btn-sm btn-warning">Leak hinzufügen</button>
<script>
    var open = 0;
    function hideAdd(){
        $( "#add" ).hide();
    };
    $( "#btnaddleak" ).click(function() {
        if(open==0){
            $( "#add" ).show("slow");
            open = 1;
        }else if (open==1){
            $( "#add" ).hide("slow");
            open = 0;
        }
    })
</script>
<form action="add.php" method="post">
    <div class="add" id="add">
        <input type="text" name="name" class="input input-sm input-add" placeholder="Name">
        <input type="text" name="realname" class="input input-sm input-add" placeholder="Echter Name">
        <input type="text" name="phonenumber" class="input input-sm input-add" placeholder="Handynummer">
        <input type="email" name="email" class="input input-sm input-add" placeholder="emailadr">
        <input type="text" name="wohnort" class="input input-sm input-add" placeholder="Wohnort">
        <input type="text" name="adresse" class="input input-sm input-add" placeholder="Adresse">
        <input type="text" name="kontonummer" class="input input-sm input-add" placeholder="kontonummer">
        <input type="text" name="pic" class="input input-sm input-add" placeholder="Profilbild-URL">
        <input type="text" name="bestMeme" class="input input-sm input-add" placeholder="Bestes Meme (URL)">
        <input type="submit" name="addleak" value="Absenden" class=" submit-add">
    </div>
</form>

<br><br>
<?php
$sql = "SELECT * FROM leaks";
$db_erg = mysqli_query( $con, $sql );
if ( ! $db_erg )
{
    die('Ungültige Abfrage: ' . mysqli_error());
}
while ($zeile = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC))
{
echo '
<div class="person">
    <table>
        <tr>
            <td><img src="'.$zeile['face'].'" class="faceleak"><br><a href="change.php?id='.$zeile['id'].'"> <img src="pen.png" class="pen"></a></td>
            <td>
                <h3>'.$zeile['name'].'</h3>
                <b>Echter Name: </b> '.$zeile['realname'].'<br>
                <b>Handynummer: </b> '.$zeile['phoneNumber'].'<br>
                <b>EMail: </b> '.$zeile['email'].'<br>
                <b>Wohnort: </b>'.$zeile['wohnort'].'<br>
                <b>Adresse: </b>'.$zeile['adresse'].'<br>
                <b>Kontonummer: </b>'.$zeile['kontonummer'].'<br>
                <b>bestMeme: </b><a href="'.$zeile['bestMeme'].'" class="bestMeme">HERE</a> <br>
            </td>
        </tr>
    </table>
</div>
<br><br>

';
}
mysqli_free_result( $db_erg);
?>



</body>
</html>