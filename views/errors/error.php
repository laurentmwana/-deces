<?php

$error = "page d'erreur";

?>

<h1>Une erreur est survenue</h1>

<em><?= $message ?> <?= !empty($url) ? "(réference de la route <strong>{$url}) </strong>" : ""  ?></strong></em>