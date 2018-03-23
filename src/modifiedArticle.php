<?php
include 'connect.php';
// Connection
$pdo = new PDO(DSN, USER, PASS);

$id = $_POST['id'];
$title = $_POST['titleArticle'];
$contents = $_POST['contentsArticle'];
$author = $_POST['authorArticle'];

echo 'id : ' . $id . '<br/>';
echo 'titre : ' . $title . '<br/>';
echo 'contents : ' . $contents . '<br/>';
echo 'auteur : ' . $author . '<br/>';

$sql = "UPDATE Article SET titre = :title, auteur = :author, contenu = :contents where id = :id;)";

$prep = $pdo->prepare($sql);

$prep->bindValue(':id', $id, PDO::PARAM_INT);
$prep->bindValue(':title', $title, PDO::PARAM_INT);
$prep->bindValue(':contents', $contents, PDO::PARAM_INT);
$prep->bindValue(':author', $author, PDO::PARAM_INT);

$count = $prep->execute();

if ($count > 0) {
    ?>
    <h1>Votre article a bien été modifié ! :)</h1>
    <?php
} else {
    ?>
    <h1>Une erreur est survenue et votre article n'a pas été modifié ! :(</h1>
    <?php
}
?>
    <p>Vous serez redirigé dans 5 secondes ! Merci de patienter quelques instant :D</p>
<?php

header("refresh:5;url=./printArticle.php");
exit();