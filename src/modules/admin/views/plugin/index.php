<?php
/**
 * @var array $list
 */

use yii\bootstrap\Html;
use yii\widgets\Pjax;

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
                <td><?=$plugin['meta']['name']?></td>
                <td><?=$plugin['meta']['version']?></td>
                <td>
                    <?php
                    if($plugin['meta']['installed_at']){
                       echo Html::a($plugin['meta']['status']?'Disable':'Active',['/admin/plugin/status','key'=>$key,],[
                            'class'=>$plugin['meta']['status']?'btn btn-danger':'btn btn-success',
                           'data-pjax'=>'1',
                           'data-method'=>'POST'
                        ]);
                       echo " ";
                       if(isset($plugin['meta']['useMigration'])){
                           echo  Html::a('Update',['/admin/plugin/update','key'=>$key,'id'=>'up'],['class'=>'btn btn-info']);
                           echo " ";
                           echo  Html::a('DownGrade',['/admin/plugin/update','key'=>$key,'id'=>'down'],['class'=>'btn btn-warning']);
                           echo " ";

                       }
                        echo  Html::a('Un Install',['/admin/plugin/uninstall','key'=>$key],['class'=>'btn btn-danger']);

                    }else{
                     echo  Html::a('Install',['/admin/plugin/install','key'=>$key],['class'=>'btn btn-info']);
                    }
                    ?>
                </td>
            </tr>
            <?php
            }
            unset($file);

            ?>
            </tbody>
        </table>

    </div>
</div>
