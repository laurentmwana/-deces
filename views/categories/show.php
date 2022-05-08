<!-- directory return -->
<div class="directory">
    <a href="<?= $route->generateUri("categorie.index") ?>" class="directory-link"><i class="fa fa-arrow-left"></i></a>
</div>
<!-- end directory return -->
<!-- container -->
<div class="container">
    <section class="section">
        <h1 class="section-header"> Description de la categorie ( <?= $categorie->getCategorie() ?> )</h1>
        <div class="section-body">
            <div class="card-full">
                <div class="card-body">
                    <p class="body-desc"><?= $categorie->getContent() ?></p>
                    <p class="body-date">Créer <?= $categorie->getDateCreate()->format("d/m/Y  à  H:i:s ") ?></p>
                    <p class="body-date">Derniere modification <?= $categorie->getDateCreate()->format("d/m/Y  à  H:i:s ") ?></p>
                </div>
            </div>
            <table class="table table-direct" table-responsive>
                <tr class="tr-header">
                    <th class="th-cel">Nom </th>
                    <th class="th-cel">Type </th>
                    <th class="th-cel">Actions</th>
                    <th class="th-cel">Date de création</th>
                </tr>
                
                <tr class="tr-body" >
                    <td class="td-cel"><?= $categorie->getCategorie() ?></td>
                    <td class="td-cel"><?= $categorie->getType() ?></td>
                    <td class="td-cel td-action">
                        <a href="" class="action-link"><i class="fa fa-trash"></i></a>
                        <a href="" class="action-link"><i class="fa fa-edit"></i></a>
                    </td>
                    <td class="td-cel"><?= $categorie->getDateCreate()->format("d/m/Y") ?></td>
                </tr>
            </table>
        </div>
    </section>
</div>
<!-- end container  -->
