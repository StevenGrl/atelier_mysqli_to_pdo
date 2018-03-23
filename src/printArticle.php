<?php
include 'connect.php';
// Connection
$pdo = new PDO(DSN, USER, PASS);

$selectAllArticles = $pdo->query('Select * from Article;');

$articles = $selectAllArticles->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Atelier Php Sql - Steven Grillon</title>
</head>
<body>
<header>
    <!--navbar et image de presentation  -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="addarticle.php">Ajouter des articles</a>
                    </li>
                    <li>
                        <a href="#">Afficher les articles</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<h1>Atelier Php Sql - Steven Grillon. :)</h1>
<div class="container">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Contenu</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($articles as $article) {
            ?>
            <tr>
                <td><?= $article['id'] ?></td>
                <td><?= $article['titre'] ?></td>
                <td><?= $article['auteur'] ?></td>
                <td><?= $article['contenu'] ?></td>
                <td><a href="modificationArticle.php?idArticle=<?= $article['id'] ?>"
                       class="glyphicon glyphicon-pencil"></a></td>
                <td><a href="deleteArticle.php?idArticle=<?= $article['id'] ?>" class="glyphicon glyphicon-remove"></a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>


