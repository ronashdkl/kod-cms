<?php


use kartik\file\FileInput;
use yii\helpers\FileHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\widgets\ActiveForm; ?>

<div class="panel">
    <div class="panel-body">
        <?= Html::a('Create new Backup', Url::toRoute(['/admin/backup/data'], ['role' => 'modal-remote', 'class' => 'btn btn-success'])) ?>

    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="panel">
            <div class="panel-heading">
                <strong>Site data Files</strong>
            </div>
            <div class="panel-body">
                <ul class="nav nav-stacked">
                    <?php
                    $files = FileHelper::findFiles(Yii::getAlias('@app/storage/data'), ['only' => ['*.json']]);
                    foreach ($files as $file) {
                        $path = explode('\\', $file);
                        $name = array_pop($path);

                        ?>

                        <li><a href="#"><i class="fa fa-gear"></i> <?= $name ?> [<?= Yii::$app->formatter->asSize(filesize($file)) ?>] <span
                                        class="pull-right badge bg-green-active"><?= date("F d Y H:i:s.", filemtime($file)) ?></span></a>
                        </li>


                        <?php
                    }

                    ?>  </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-6">

        <div class="panel">
            <div class="panel-heading">
                <strong>Download Backups </strong>
            </div>
            <div class="panel-body">

                <?php
                $files =Yii::getAlias('@app/storage/data_backup.zip');
                echo Html::a('<i class="fa fa-file-zip-o"> </i> data_backup.zip [' . Yii::$app->formatter->asSize(filesize($file)) . ']', '/admin/backup/index?download=true&name=data_backup.zip') . "<br/></br/>";


                ?>
            </div>
        </div>

        <div class="panel">
            <div class="panel-heading">
                <strong>Upload Backup </strong>
            </div>
            <div class="panel-body">
                <p>Rename your file name as (backup.zip)
                </p>
                <?php
                $form = ActiveForm::begin();
                echo $form->field($model, 'file')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'zip,application/octet-stream,application/zip,application/x-zip,application/x-zip-compressed', 'multiple' => false],
                ]);
                echo Html::submitButton('Upload', ['class' => 'btn btn-success']);
                ActiveForm::end();
                ?>
            </div>
        </div>
    </div>
</div>
<div class="panel">
    <div class="panel-body">
        <?= Html::a('Create new media Backup', Url::toRoute(['/admin/backup/media'], ['role' => 'modal-remote', 'class' => 'btn btn-success'])) ?>

    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="panel">
            <div class="panel-heading">
                <strong>Media Folders</strong>
            </div>
            <div class="panel-body">
                <ul class="nav nav-stacked">
                    <?php

                    $dirs = FileHelper::findDirectories(Yii::getAlias('@webroot/media'), ['recursive' => false]);
                    foreach ($dirs as $folder) {
                        $path = explode('\\', $folder);
                        $name = array_pop($path);

                        ?>

                        <li><a href="#"><i class="fa fa-folder-open"></i> <?= $name; ?> <span
                                        class="pull-right badge bg-green-active"><?= date("F d Y H:i:s.", filemtime($folder)) ?></span></a>
                        </li>


                        <?php
                    }

                    ?>  </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel">
            <div class="panel-heading">
                <strong>Download media Backup </strong>
            </div>
            <div class="panel-body">

                <?php
                $media = Yii::getAlias('@webroot/media/media_backup.zip');
                echo (is_file($media)) ? Html::a('<i class="fa fa-file-zip-o"> </i> Media_backup.zip [' . Yii::$app->formatter->asSize(filesize(Yii::getAlias('@webroot/media/media_backup.zip'))) . ']', '/media/media_backup.zip') . "<br/></br/>" : null;

                ?>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading">
                <strong><a href="/admin/media" target="_blank">Click here</a> to upload media </strong>
            </div>

        </div>
    </div>
</div>