<?php
$title = 'Notre menu';
include_once('header.php');

$lignes = file(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'menu.txt');
foreach($lignes as $k => $ligne) {
    $lignes[$k] = explode("\t", trim($ligne));
}
?>

<div class="container">
    <?php foreach($lignes as $ligne): ?>
        <?php if(count($ligne) === 1): ?>
            <h2><?= $ligne[0] ?></h2>
        <?php else: ?>
            <div class="row">
                <div class="col-sm-8">
                    <p>
                        <strong><?= $ligne[0] ?></strong><br>
                        <?= $ligne[1] ?>
                    </p>
                </div>
                <div class="col-sm-4">
                    <strong><?= number_format($ligne[2], 2,',') ?>€</strong>
                </div>
            </div>
        <?php endif ?>
    <?php endforeach ?>
</div>

<?php require_once('footer.php'); ?>