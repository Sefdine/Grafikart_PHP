<?php
include_once('header.php');

$fichier = __DIR__.DIRECTORY_SEPARATOR.'menu.txt';
$ressource = fopen($fichier, 'r');

?>

<div class="container">
    <?php while($line = fgets($ressource)): ?>
    <h2><?= $line ?></h2>
    <ul>
        <li><?= $line ?></li>
        <li><?= $line ?></li>
        <li><?= $line ?></li>
    </ul>
    <?php endwhile ?>
</div>