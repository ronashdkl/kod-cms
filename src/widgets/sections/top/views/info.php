<?php

?>
<div class="top_header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10">
                <ul>
                    <li><a href="/kontakt/#google_map" class="wow slideInLeft" data-wow-duration="2s"
                           title="<?=$this->params['config']('address');?>">
                            <i class="ti ti-map-alt"></i> <?=$this->params['config']('address');?></a></li>
                                                <li><a href="tel::<?=$this->params['config']('phone');?>" class="wow slideInLeft" data-wow-duration="2.5s" title="Contact Number"><i class="fa fa-phone"></i>&nbsp;<?=$this->params['config']('phone');?></a></li>
                    <li><a href="mailto::<?=$this->params['config']('email');?>" class="wow slideInLeft" data-wow-duration="3s" title="Mail Adderess"><i class="fa fa-envelope"></i>&nbsp;<?=$this->params['config']('email');?></a></li>
                </ul>
            </div>
            <div class="col-sm-2 text-right social_links">
                <a rel="alternate" target="_blank" href="<?=$this->params['social']('facebook')->url;?>" class="wow slideInDown" data-wow-duration="2s" title="Facebook"><i class="fa fa-facebook"></i></a>
                <a rel="alternate" target="_blank" href="<?=$this->params['social']('instagram')->url;?>" class="wow slideInDown" data-wow-duration="2.5s" title="Instagram"><i class="fa fa-instagram"></i></a>
                </ul>
            </div>
        </div>
    </div>
</div>

