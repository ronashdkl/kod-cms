<?php
use yii\authclient\widgets\AuthChoice;
?>
<?php $authAuthChoice = AuthChoice::begin([
    'baseAuthUrl' => ['site/auth']
]);

?>
hi
    <ul class="list-group">
        <?php foreach ($authAuthChoice->getClients() as $client): ?>
            <li class="list-group-item"><?php echo $authAuthChoice->clientLink($client) ?></li>
        <?php endforeach; ?>
    </ul>
<?php AuthChoice::end(); ?>