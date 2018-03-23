<?php
include 'connect.php';
$bdd = mysqli_connect(SERVER, USER, PASS, DB);

$id = $_GET['idArticle'];

$selectExist = mysqli_fetch_assoc(mysqli_query($bdd, "SELECT * FROM Article where id = $id;"));

if ($selectExist !== NULL) {
    if (mysqli_query($bdd, "DELETE FROM Article where id= $id ")) {
        ?>
        <h1>Votre article a bien été supprimé ! :)</h1>
        <?php
    } else {
        ?>
        <h1>Il y a eu un problème et votre article n'a pas pu être supprimé !</h1>
        <?php
    }
} else {
    ?>
    <h1>Tu veux supprimer un article inexistant ! pas possible :D</h1>
    <?php
}


?>
    <p>Vous serez redirigé dans 5 secondes ! merci de patienter quelques instant :D</p>
<?php

header("refresh:5;url=./printArticle.php");
exit();

