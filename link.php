<?php 
declare(strict_types=1);
require_once('elements/header.php'); 
require_once('data/config.php');

date_default_timezone_set('Africa/Casablanca');

$hour_now = (int)date('H');
$time_now = date('H:i');

$creneaux = CRENEAUX[date('N')-1];
$open = in_creneaux($hour_now, $creneaux);

$color = $open ? 'green' : 'red';

$data = $_GET ?? null;
$day = (int)($data['jour'] ?? null);

$time = (int)($data['time'] ?? null);
$creneaux = CRENEAUX[$day];
$is_open = in_creneaux($time, $creneaux);

?>




<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Vérifier l'ouverture du restaurant</h2>
            <?php if($is_open): ?>
                <div class="alert alert-success">
                    Le restaurant sera ouvert
                </div>
            <?php else : ?>
                <div class="alert alert-danger">
                    Le restaurant sera fermé
                </div>
            <?php endif ?>
            <form action="#" method="get">
                <div class="form-group">
                    <h4>Choisissez le jour</h4>
                    <?= select('jour', $day, JOURS) ?>  
                    <h4>Entrer l'heure</h4>
                    <input type="number" class="form-control" name="time" min="0" max="23" class="form-control" placeholder="<?= $_GET['time'] ?? 'Entrer votre heure' ?>">
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Vérifier</button>
            </form>
        </div>
        <div class="col-md-4">
            <h3>Horaires d'ouvertures du restaurant</h3>
            <?php if($open): ?>
                <div class="alert alert-success">
                    <?= $time_now ?>  Le restaurant est actuellement ouvert
                </div>
            <?php else : ?>
                <div class="alert alert-danger">
                    <?= $time_now ?>  Le restaurant est actuellement fermé
                </div>
            <?php endif ?>
            <ul>
                <?php foreach(JOURS as $k => $jour): ?> 
                    <li <?php if ($k+1 === (int)date('N')): ?> style="color: <?= $color ?>" <?php endif ?>> 
                        <strong><?= $jour ?></strong>:       
                        <?= creneaux_html(CRENEAUX[$k]) ?>
                    </li>
                <?php endforeach ?>
            </ul>     
        </div>
    </div>
</div>

<?php require_once('elements/footer.php'); ?>
