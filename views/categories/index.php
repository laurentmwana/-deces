<?php

use App\Helpers\Text;


?>
<!-- container -->
<div class="container">
    <section class="section">
        <h1 class="section-header"> Categories</h1>
        <div class="section-body" id="blog-4">
            <?php foreach ($categories as $categorie):     ?>
            <div class="card" id="child">
                <h1 class="card-header"><?= Text::extract($categorie->getCategorie(), 180)  ?></h1>
                <div class="card-body">
                    <p class="body-desc"><?= Text::extract($categorie->getContent(), 180) ?></p>
                    <div class="body-date"><?= $categorie->getDateCreate()->format("d/m/Y  à  H:i:s") ?></div>
                </div>
                <div class="card-footer">
                    <a href="<?= $route->generateUri("categorie.show", ["id" => $categorie->getId()]) ?>" class="footer-link"><i class="fa fa-eye"></i> voir plus</a>
                </div>
            </div>
            <?php endforeach ?>
        </div>
</div>
<!-- end container  -->