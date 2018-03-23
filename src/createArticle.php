<?php
include 'connect.php';
// Connection
$pdo = new PDO(DSN, USER, PASS);

$title = $_POST['titleArticle'];
$contents = $_POST['contentsArticle'];
$author = $_POST['authorArticle'];

echo 'titre : ' . $title . '<br/>';
echo 'contenu : ' . $contents . '<br/>';
echo 'auteur : ' . $author . '<br/>';

$prep = $pdo->prepare('INSERT INTO Article (titre, contenu, auteur) VALUES (:title, :contents, :author);');

$prep->bindValue(':title', $title, PDO::PARAM_STR);
$prep->bindValue(':contents', $contents, PDO::PARAM_STR);
$prep->bindValue(':author', $author, PDO::PARAM_STR);

$count = $prep->execute();


if ($count > 0) {
    ?>
    <h1>Votre article est bien ajouté à la base de données ! :)</h1>
    <?php
} else {
    ?>
    <h1>Votre article n'a pas été ajouté à la base désolé ! :D</h1>
    <?php
}
?>
    <p>Vous serez redirigé dans 5 secondes ! merci de patienter quelques instant :D</p>
<?php

header("refresh:5;url=./addarticle.php");
exit();