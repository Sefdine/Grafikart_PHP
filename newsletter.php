<?php

$success = null;
$error = null;
$fichier = __DIR__.DIRECTORY_SEPARATOR.'emails'.DIRECTORY_SEPARATOR. date('Y-m-d');
if(!empty($_POST['email'])) {
    $email = $_POST['email'];
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        file_put_contents($fichier, $email . PHP_EOL, FILE_APPEND);
        $success = 'Votre email a bien été enregistrer';
    } else {
        $error = 'Email Incorrect';
    }
}

require_once('elements/header.php');
?>

<div class="container">
    <h1>S'inscrire à la newsletter</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At soluta voluptatem, esse dolorem maxime eos ea quibusdam ullam, in placeat dolor non fuga tenetur magnam minima adipisci, natus consequuntur sint.</p>
    <?php if($success): ?>
        <div class="alert alert-success">
            <?= $success ?>
        </div>
    <?php elseif($error): ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php endif ?>
    <form action="newsletter.php" method="post" class="form-inline">
        <div class="form-group">
            <input type="email" name="email" placeholder="<?= $email ?? 'Entrer votre email'?>" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
</div>

<?php require_once('elements/footer.php'); ?>