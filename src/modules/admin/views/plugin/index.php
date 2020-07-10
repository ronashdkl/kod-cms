<?php
/**
 * @var array $list
 */

use yii\bootstrap\Html;

$this->title = Yii::t('app','Plugins');
$this->params['breadcrumbs'][] = Yii::t('app','Admin');
$this->params['breadcrumbs'][] = Yii::t('app',$this->title);
?>

<div class="panel">
    <div class="panel-heading bg-aqua">
        Manage Plugins
    </div>
    <div class="panel-body">
<p>After disabled the plugin, go to <a href="/admin/config/page">Manage Blocks</a> and click save.</p>
        <table class="table">

            <thead>
            <tr>


            <th>
                Name
            </th>
            <th>
                Version
            </th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($list as $key => $plugin){
               ?>
            <tr>
                <td><?=$plugin['meta']['name']?> <?= $plugin['meta']['time']?></td>
                <td><?=$plugin['meta']['version']?></td>
                <td><?=
                        Html::a($plugin['meta']['status']?'Disable':'Active',['/admin/plugin/status','key'=>$key,],[
                                'class'=>$plugin['meta']['status']?'btn btn-danger':'btn btn-success'
                        ])?></td>
            </tr>
            <?php
            }
            unset($file);
            ?>
            </tbody>
        </table>
    </div>
</div>