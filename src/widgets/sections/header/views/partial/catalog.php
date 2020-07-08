<?php
/**
 * @var $list object
 */
$service = \ronashdkl\kodCms\modules\admin\models\Tree::find()->Where(['id' => $list->{$list->type}])->one();
$catalogsQuery = $service->children();
if ($catalogsQuery->count() > 0) {
    $catalogs = $catalogsQuery->all();


    ?>
    <li class="nav-item dropdown <?=$list->responsive_only?'responsive_only':null?>"><a href="javascript:;" class="nav-link dropdown-toggle" id="dropdown"
                                      data-toggle="dropdown"><?= $service->name ?></a>
    <div class="dropdown-menu" aria-labelledby="dropdown">
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
            <a rel="alternate" hreflang="sv" href="<?= $link ?>" class="dropdown-item"><i
                        class="fa fa-angle-double-right"></i> <?= $catalog->name ?></a>
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
        <li class="nav-item dropdown <?=$list->responsive_only?'responsive_only':null?>"><a rel="alternate" href="javascript:;" class="nav-link dropdown-toggle" id="dropdown"   data-toggle="dropdown"><?= $service->name ?></a>
        <div class="dropdown-menu" aria-labelledby="dropdown">
                <?php
                foreach ($catalogs as $catalog) {
                    ?>
                   <a rel="alternate"  class="dropdown-item" href="<?= ($list->link == null) ? '/info/' . $catalog['slug'] : $list->link ?>"><i
                                    class="fa fa-angle-double-right"></i> <?= $catalog['title'] ?></a>
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
