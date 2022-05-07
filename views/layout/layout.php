<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deces  <?= isset($title) ? " ~ {$title}" : "" ?></title>
    <link rel="stylesheet" href="<?= SOURCES . "css" . DIRECTORY_SEPARATOR . "app.css"  ?>">
    <link rel="stylesheet" href="<?= SOURCES . "vendor" . DIRECTORY_SEPARATOR . "fontawesome-free-6.1.1-web" . DIRECTORY_SEPARATOR . "css" . DIRECTORY_SEPARATOR .  "all.css"  ?>">
</head>
<body class="body-main body-dark">
     <!-- header -->
     <div class="header" id="header">
        <div class="header-home">
            <a href="" class="home-brand">
                <span class="fa fa-wheelchair"></span>
                <span class="brand-text">Décès</span>
            </a>
            <a href="#" class="home-responsive" toggle-element="header">
                <span class="fa fa-bars responsive-icon" ></span>
            </a>
            
        </div>
        <nav class="header-navbar" visibled="header">
            <ul class="navbar-list">
                <li class="list"><a href="<?= $route->generateUri("defaults.index") ?>" class="list-link active">Accueil</a></li>
                <li class="list"><a href="<?= $route->generateUri("post.index") ?>" class="list-link">Articles</a></li>
                <li class="list"><a href="<?= $route->generateUri("categorie.index") ?>" class="list-link">Categories</a></li>
                <li class="list"><a href="<?= $route->generateUri("admin.index") ?>" class="list-link">Administration</a></li>
            </ul>
        </nav>
        <div class="header-actions" visibled="header">
            <ul class="actions-list">
                <li class="list"><a href="" class="list-link" toggle-element="search-container"><span class="fa fa-search"></span></a></li>
                <li class="list"><a href="create.html" class="list-link">S'inscrire</a></li>
                <li class="list"><a href="login.html" class="list-link">Se connecter</a></li>
            </ul>
        </div>
    </div>
    <div class="divised"></div>
    <div class="search-container" visibled="search-container">
        <form action="#" class="form">
            <div class="form-group">
                <input type="search" name="search" id="search" placeholder="je vais faire une recherche " class="form-field">
                <button class="form-btn"><i class="fa fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- end header -->
    <?=  $content ?>

    
    <footer class="footer">
        &copy; 2022 laurent mwana ( <span class="fa fa-wheelchair"></span> Décès ), toute réproduction est autorisé
    </footer>

    <script src="<?= SOURCES . "js" . DIRECTORY_SEPARATOR . "app.js"  ?>"></script>
    <script src="<?= SOURCES . "vendor" . DIRECTORY_SEPARATOR . "fontawesome-free-6.1.1-web" . DIRECTORY_SEPARATOR . "js" . DIRECTORY_SEPARATOR .  "all.js"  ?>"></script>
</body>
</html>