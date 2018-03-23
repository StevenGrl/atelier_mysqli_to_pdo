<?php
include 'connect.php';
// Connection
$pdo = new PDO(DSN, USER, PASS);

$id = $_GET['idArticle'];

$sql = 'SELECT * FROM Article where id = :id;';

$prep = $pdo->prepare($sql);

$prep->bindValue(':id', $id, PDO::PARAM_INT);

$selectExist = $prep->execute();

if ($selectExist !== NULL) {
    $sqlDelete = 'DELETE FROM Article where id = :id;';
    $prepDelete = $pdo->prepare($sqlDelete);
    $prepDelete->bindValue(':id', $id, PDO::PARAM_INT);
    $countDelete = $prepDelete->execute();
    if ($countDelete > 0) {
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

