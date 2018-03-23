<?php
include 'connect.php';
$bdd = mysqli_connect(SERVER, USER, PASS, DB);

$id = $_POST['id'];
$title = mysqli_real_escape_string($bdd, $_POST['titleArticle']);
$contents = mysqli_real_escape_string($bdd, $_POST['contentsArticle']);
$author = mysqli_real_escape_string($bdd, $_POST['authorArticle']);

echo 'id : ' . $id . '<br/>';
echo 'titre : ' . $title . '<br/>';
echo 'contenu : ' . $contents . '<br/>';
echo 'auteur : ' . $author . '<br/>';

$bool = mysqli_query($bdd, "UPDATE Article SET titre = '$title', contenu = '$contents', auteur = '$author' where id = $id;");

if ($bool) {
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