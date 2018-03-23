<?php
include 'connect.php';
// Connection
$pdo = new PDO(DSN, USER, PASS);

$id = $_GET['idArticle'];

$selectArticle = 'SELECT * FROM Article where id = ' . $id . ';';

$resultArticle = $pdo->query($selectArticle);

$article = $resultArticle->fetch();

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
                        <a href="printArticle.php">Afficher les articles</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="container">
    <?php
    if ($resultArticle === NULL) {
        ?>
        <h1>Cet article n'existe pas ! Try again</h1>
    <?php } ?>
    <form action="modifiedArticle.php" method="POST">
        <input type="hidden" name="id" value="<?= $article['id']; ?>">
        <div class="form-group">
            <label for="titleArticle">Titre de l'article</label>
            <input type="text" name="titleArticle" class="form-control" id="titleArticle"
                   value="<?= $article['titre']; ?>">
        </div>
        <div class="form-group">
            <label for="contentsArticle">Contenu de l'article</label>
            <textarea class="form-control" name="contentsArticle"
                      id="contentsArticle"><?= $article['contenu']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="authorArticle">Nom de l'auteur de l'article</label>
            <input type="text" name="authorArticle" class="form-control" id="authorArticle"
                   value="<?= $article['auteur']; ?>">
        </div>
        <button type="submit" class="btn btn-default">Modifier l'article</button>
    </form>
</div>
</body>
</html>