<?php
/**
 * @var $list object
 */
$service = \ronashdkl\kodCms\modules\admin\models\Tree::find()->Where(['id' => $list->{$list->type}])->one();
$catalogsQuery = $service->children();
if ($catalogsQuery->count() > 0) {
    $catalogs = $catalogsQuery->all();


    ?>
    <li class="dropdown"><a href="#"><?= $service->name ?></a>
        <ul class="dropdown-menu menu-last" style="">
            <?php
            foreach ($catalogs as $catalog) {
                $link = $list->link;
                if ($link == null) {
                    if($catalog->link==null){
                        $link = '/service/' . $catalog->name;
                    }else{
                        $link = $catalog->link;
                    }
                }
                ?>
                <li><a href="<?= $link ?>"><i
                                class="fa fa-angle-double-right"></i> <?= $catalog->name ?></a></li>
                <?php
            }
            ?>
        </ul>
    </li>
    <?php
} else {
    $catalogsQuery = $service->getPosts();
    if ($catalogsQuery->count() > 0) {
        $catalogs = $catalogsQuery->asArray()->all();
        ?>
        <li class="dropdown"><a href="#"><?= $service->name ?></a>
            <ul class="dropdown-menu menu-last" style="">
                <?php
                foreach ($catalogs as $catalog) {
                    ?>
                    <li><a href="<?= ($list->link == null) ? '/page/' . $catalog['title'] : $list->link ?>"><i
                                    class="fa fa-angle-double-right"></i> <?= $catalog['title'] ?></a></li>
                    <?php
                }
                ?>
            </ul>
        </li>
        <?php
    } else {
        return null;
    }
}
?>
