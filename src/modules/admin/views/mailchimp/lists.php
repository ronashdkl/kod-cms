<?php

/** @var array $lists */

// Set Title and Breadcrumbs
$this->title = Yii::t('mailchimp', 'Newsletter Lists');
$this->params['breadcrumbs'][] = Yii::t('mailchimp', 'Newsletters');
$this->params['breadcrumbs'][] = $this->title;

$file = Yii::getAlias('@vendor/cinghie/yii2-admin-lte/AdminLTEAsset.php');
?>

<div class="panel">
    <div class="panel-body">
        <?php
        echo $this->render('_lists_default', [
            'lists' => $lists
        ]);
        ?>

    </div>
</div>

