<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<?php
/* @var $this \yii\web\View */

/* @var $content string */

use lo\modules\noty\Wrapper;
use yii\helpers\Html;
use ronashdkl\kodCms\assets\AppAsset;

AppAsset::register($this);
if($this->title==null){
    $this->title = $this->params['config']('name');
}

$this->beginPage(); ?>
<html lang="<?= Yii::$app->language ?>" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">




    <meta name="author" content="<?= $this->params['seo']('author')?>">
    <meta name="description" content="<?= $this->params['seo']('summary')?>">
    <meta name="keyword" content="<?= $this->params['seo']('keyword')?>">
   <!-- <meta property="og:locale" content="sv_SE" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?/*=$this->params['seo']('title')*/?>" />
    <meta property="og:description" content="<?/*= $this->params['seo']('summary')*/?>" />
    <meta property="og:url" content="https://www.pastordennisflyttfirma.se" />
    <meta property="og:image" content="https://www.pastordennisflyttfirma.se/pastordennis_kodknackare.jpg" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:site_name" content="<?/*=$this->params['config']('name')*/?>" />
    -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="<?= $this->params['seo']('summary')?>" />
    <meta name="twitter:title" content="<?=$this->params['seo']('title')?>" />
    <meta name="twitter:image" content="<?=$this->params['config']('logo')?>" />

    <?php $this->registerCsrfMetaTags() ?>
    <!-- Document title -->
    <title><?=$this->params['seo']('title')?></title>
    <meta name="google-site-verification" content="<?=$this->params['seo']('google_site_verification')?>" />
    <!-- Site Icons -->
     <meta name="msapplication-TileColor" content="#ff6601">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link rel="icon" href="/images/favicon.png">
    <meta name="theme-color" content="#ff6601">
    <!-- Stylesheets & Fonts -->
    <?php $this->head() ?>
</head>
<body data-spy="scroll" data-target=".fixed-top">
<?php $this->beginBody() ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/sv_SE/sdk.js#xfbml=1&version=v5.0"></script>
<!-- Preloader -->
<div class="spinner-wrapper">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<!-- end of preloader -->
<!-- Body Inner -->
<div>
      <!-- Header -->

    <!-- end: Header -->
    <?php

    if (isset($this->blocks['top_content'])) {
        echo $this->blocks['top_content'];
    }
    if (isset($this->blocks['side_content'])) {
        ?>
        <div class="row">
            <div class="col-sm-12 col-sm-8">
                <?= $content; ?>
            </div>
            <div class="col-sm-12 col-sm-4">
                <?= $this->blocks['side_content']; ?>
            </div>
        </div>
        <?php
    } else {

        echo $content;

    }

    if (isset($this->blocks['bottom_content'])) {
        echo $this->blocks['bottom_content'];
    }
    ?>

</div>






<!-- Request -->
<div id="request" class="form-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-container">
                    <h2>Fill The Following Form To Request A Meeting</h2>
                    <p>Evolo is one of the easiest and feature packed marketing automation apps in the market. Discover what it can do for your business organization right away.</p>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-check"></i>
                            <div class="media-body"><strong class="blue">Automate your marketing</strong> activities and get results today</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i>
                            <div class="media-body"><strong class="blue">Interact with all your</strong> targeted customers at a personal level</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i>
                            <div class="media-body"><strong class="blue">Convince them to buy</strong> your company's awesome products</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i>
                            <div class="media-body"><strong class="blue">Save precious time</strong> and invest it where you need it the most</div>
                        </li>
                    </ul>
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
            <div class="col-lg-6">

                <!-- Request Form -->
                <div class="form-container">
                    <form id="requestForm" data-toggle="validator" data-focus="false">
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="rname" name="rname" required>
                            <label class="label-control" for="rname">Full name</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control-input" id="remail" name="remail" required>
                            <label class="label-control" for="remail">Email</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control-input" id="rphone" name="rphone" required>
                            <label class="label-control" for="rphone">Phone</label>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <select class="form-control-select" id="rselect" required>
                                <option class="select-option" value="" disabled selected>Interested in...</option>
                                <option class="select-option" value="Personal Loan">Starter</option>
                                <option class="select-option" value="Car Loan">Medium</option>
                                <option class="select-option" value="House Loan">Complete</option>
                            </select>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group checkbox">
                            <input type="checkbox" id="rterms" value="Agreed-to-Terms" name="rterms" required>I agree with Evolo's stated <a href="privacy-policy.html">Privacy Policy</a> and <a href="terms-conditions.html">Terms & Conditions</a>
                            <div class="help-block with-errors"></div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control-submit-button">REQUEST</button>
                        </div>
                        <div class="form-message">
                            <div id="rmsgSubmit" class="h3 text-center hidden"></div>
                        </div>
                    </form>
                </div> <!-- end of form-container -->
                <!-- end of request form -->

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of form-1 -->
<!-- end of request -->


<!-- Video -->
<div class="basic-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Check Out The Video</h2>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-lg-12">

                <!-- Video Preview -->
                <div class="image-container">
                    <div class="video-wrapper">
                        <a class="popup-youtube" href="https://www.youtube.com/watch?v=fLCjQJCekTs" data-effect="fadeIn">
                            <img class="img-fluid" src="images/video-frame.svg" alt="alternative">
                            <span class="video-play-button">
                                    <span></span>
                                </span>
                        </a>
                    </div> <!-- end of video-wrapper -->
                </div> <!-- end of image-container -->
                <!-- end of video preview -->

                <p>This video will show you a case study for one of our <strong>Major Customers</strong> and will help you understand why your startup needs Evolo in this highly competitive market</p>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of basic-3 -->
<!-- end of video -->





<!-- About -->
<div id="about" class="basic-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>About The Team</h2>
                <p class="p-heading p-large">Meat our team of specialized marketers and business developers which will help you research new products and launch them in new emerging markets</p>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-lg-12">

                <!-- Team Member -->
                <div class="team-member">
                    <div class="image-wrapper">
                        <img class="img-fluid" src="images/team-member-1.svg" alt="alternative">
                    </div> <!-- end of image-wrapper -->
                    <p class="p-large"><strong>Lacy Whitelong</strong></p>
                    <p class="job-title">Business Developer</p>
                    <span class="social-icons">
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x facebook"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x twitter"></i>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                        </span> <!-- end of social-icons -->
                </div> <!-- end of team-member -->
                <!-- end of team member -->

                <!-- Team Member -->
                <div class="team-member">
                    <div class="image-wrapper">
                        <img class="img-fluid" src="images/team-member-2.svg" alt="alternative">
                    </div> <!-- end of image wrapper -->
                    <p class="p-large"><strong>Chris Brown</strong></p>
                    <p class="job-title">Online Marketer</p>
                    <span class="social-icons">
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x facebook"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x twitter"></i>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                        </span> <!-- end of social-icons -->
                </div> <!-- end of team-member -->
                <!-- end of team member -->

                <!-- Team Member -->
                <div class="team-member">
                    <div class="image-wrapper">
                        <img class="img-fluid" src="images/team-member-3.svg" alt="alternative">
                    </div> <!-- end of image wrapper -->
                    <p class="p-large"><strong>Sheila Zimerman</strong></p>
                    <p class="job-title">Software Engineer</p>
                    <span class="social-icons">
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x facebook"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x twitter"></i>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                        </span> <!-- end of social-icons -->
                </div> <!-- end of team-member -->
                <!-- end of team member -->

                <!-- Team Member -->
                <div class="team-member">
                    <div class="image-wrapper">
                        <img class="img-fluid" src="images/team-member-4.svg" alt="alternative">
                    </div> <!-- end of image wrapper -->
                    <p class="p-large"><strong>Mary Villalonga</strong></p>
                    <p class="job-title">Product Manager</p>
                    <span class="social-icons">
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x facebook"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>
                            <span class="fa-stack">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x twitter"></i>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                        </span> <!-- end of social-icons -->
                </div> <!-- end of team-member -->
                <!-- end of team member -->

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of basic-4 -->
<!-- end of about -->


<!-- Contact -->
<div id="contact" class="form-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Contact Information</h2>
                <ul class="list-unstyled li-space-lg">
                    <li class="address">Don't hesitate to give us a call or send us a contact form message</li>
                    <li><i class="fas fa-map-marker-alt"></i>22 Innovative Area, San Francisco, CA 94043, US</li>
                    <li><i class="fas fa-phone"></i><a class="turquoise" href="tel:003024630820">+81 720 2212</a></li>
                    <li><i class="fas fa-envelope"></i><a class="turquoise" href="mailto:office@evolo.com">office@evolo.com</a></li>
                </ul>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100939.98555098464!2d-122.507640204439!3d37.757814996609724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan+Francisco%2C+CA%2C+USA!5e0!3m2!1sen!2sro!4v1498231462606" allowfullscreen></iframe>
                </div>
            </div> <!-- end of col -->
            <div class="col-lg-6">

                <!-- Contact Form -->
                <form id="contactForm" data-toggle="validator" data-focus="false">
                    <div class="form-group">
                        <input type="text" class="form-control-input" id="cname" required>
                        <label class="label-control" for="cname">Name</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control-input" id="cemail" required>
                        <label class="label-control" for="cemail">Email</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control-textarea" id="cmessage" required></textarea>
                        <label class="label-control" for="cmessage">Your message</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group checkbox">
                        <input type="checkbox" id="cterms" value="Agreed-to-Terms" required>I have read and agree with Evolo's stated <a href="privacy-policy.html">Privacy Policy</a> and <a href="terms-conditions.html">Terms Conditions</a>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control-submit-button">SUBMIT MESSAGE</button>
                    </div>
                    <div class="form-message">
                        <div id="cmsgSubmit" class="h3 text-center hidden"></div>
                    </div>
                </form>
                <!-- end of contact form -->

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of form-2 -->
<!-- end of contact -->


<!-- Footer -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-col">
                    <h4>About Evolo</h4>
                    <p>We're passionate about offering some of the best business growth services for startups</p>
                </div>
            </div> <!-- end of col -->
            <div class="col-md-4">
                <div class="footer-col middle">
                    <h4>Important Links</h4>
                    <ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Our business partners <a class="turquoise" href="#your-link">startupguide.com</a></div>
                        </li>
                        <li class="media">
                            <i class="fas fa-square"></i>
                            <div class="media-body">Read our <a class="turquoise" href="terms-conditions.html">Terms & Conditions</a>, <a class="turquoise" href="privacy-policy.html">Privacy Policy</a></div>
                        </li>
                    </ul>
                </div>
            </div> <!-- end of col -->
            <div class="col-md-4">
                <div class="footer-col last">
                    <h4>Social Media</h4>
                    <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                    <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                    <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-google-plus-g fa-stack-1x"></i>
                            </a>
                        </span>
                    <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                    <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-linkedin-in fa-stack-1x"></i>
                            </a>
                        </span>
                </div>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of footer -->
<!-- end of footer -->


<!-- Copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p class="p-small">Copyright © 2020 <a href="https://inovatik.com">Inovatik</a> - All rights reserved</p>
            </div> <!-- end of col -->
        </div> <!-- enf of row -->
    </div> <!-- end of container -->
</div> <!-- end of copyright -->
<!-- end of copyright -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
