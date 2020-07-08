<?php
?>

<section class="m-t-80 p-b-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <a href="/"> <img src="<?=$this->params['config']('logo')?>" style="width: 80%"></a>
            </div>
            <div class="col-lg-6">
                <div class="text-left">
                    <h1 class="text-medium">Server Error!</h1>
                    <p class="lead">We're sorry, something is wrong on our server.</p>
                    <div class="seperator m-t-20 m-b-20"></div><button onclick="window.location.reload()" class="btn" type="button">Reload Page</button>
                </div>
            </div>
        </div>
    </div>
</section>
