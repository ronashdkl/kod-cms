<?php

/** @var array $members */
/** @var integer $id */
/** @var string $name */

// Set Title and Breadcrumbs
$this->title = Yii::t('mailchimp', 'List').': '.$name.' ('.$id.')';
$this->params['breadcrumbs'][] = Yii::t('mailchimp', 'Newsletters');
$this->params['breadcrumbs'][] = ['label' => Yii::t('mailchimp', 'Lists'), 'url' => ['lists']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="panel">
    <div class="panel-body">
        <?php
        echo $this->render('_list_default', [
            'members' => $members
        ]);
        ?>

    </div>
</div>

