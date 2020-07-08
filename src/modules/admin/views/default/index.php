<?php
$this->title = 'Dashboard';

use cinghie\mailchimp\widgets\Subscription; ?>



<div class="row">
    <div class="col-sm-12">
        <div class="lbp-slider">
            <?=
            \ronashdkl\kodCms\widgets\slider\SliderWidget::widget([
                    'admin'=>true,
                'width'=>'97%'
            ]);
            ?>
        </div>

    </div>

</div>

<hr>
