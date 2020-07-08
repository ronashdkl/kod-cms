<?php

?>
<div class="page-menu">
    <div class="container">
        <nav>
            <ul>
                <?php
                foreach ($model->list as $list) {
                    if ($list->type == 'linkToCatalog'){
                    echo $this->render('pagemenu/catalog',['list'=>$list]);
                    } elseif ($list->type == 'linkToPost') {
                        ?>
                        <li><?= \yii\helpers\Html::a($list->name, ['/page/' . $list->{$list->type}]) ?></li>
                        <?php
                    } else {
                        ?>
                        <li><?= \yii\helpers\Html::a($list->name, $list->{$list->type}) ?></li>
                    <?php }
                } ?>
            </ul>
        </nav>
        <div id="pageMenu-trigger">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</div>
