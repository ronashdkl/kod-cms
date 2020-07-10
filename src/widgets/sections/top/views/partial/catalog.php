<?php
/**
 * @var $list object
 */
$service = \ronashdkl\kodCms\modules\admin\models\Tree::find()->Where(['id' => $list->{$list->type}])->one();
$catalogsQuery = $service->children();
if ($catalogsQuery->count() > 0) {
    $catalogs = $catalogsQuery->all();


    ?>
    <li class="nav-item dropdown <?=$list->responsive_only?'responsive_only':null?>"><a href="javascript:;" class="nav-link dropdown-toggle" id="navbarDropdown"
                                                                                        role="button" aria-haspopup="true" aria-expanded="false"><?= $service->name ?></a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <?php
        foreach ($catalogs as $catalog) {
            $link = $list->link;
            if ($link == null) {
                if ($catalog->link == null) {
                    $link = '/tjanster/' . $catalog->name;
                } else {
                    $link = $catalog->link;
                }
            }
            ?>
            <a rel="alternate" hreflang="<?=Yii::$app->language?>" href="<?= $link ?>" class="dropdown-item">
                <span class="item-text">
                <i
                        class="fa fa-angle-double-right"></i> <?= $catalog->name ?></span></a>
            <div class="dropdown-items-divide-hr"></div>
            <?php
        }
        ?>
    </div>
    </li>
    <?php
} else {
    $catalogsQuery = $service->getPosts();
    if ($catalogsQuery->count() > 0) {
        $catalogs = $catalogsQuery->asArray()->all();
        ?>
        <li class="nav-item dropdown <?=$list->responsive_only?'responsive_only':null?>"><a rel="alternate" href="javascript:;" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $service->name ?></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                foreach ($catalogs as $catalog) {
                    ?>
                   <a rel="alternate"  class="dropdown-item" href="<?= ($list->link == null) ? '/info/' . $catalog['slug'] : $list->link ?>">
                       <span class="item-text">  <i class="fa fa-angle-double-right"></i> <?= $catalog['title'] ?></span></a>
                    <div class="dropdown-items-divide-hr"></div>
                    <?php
                }
                ?>
           </div>
        </li>
        <?php
    } else {
        return null;
    }
}
?>
