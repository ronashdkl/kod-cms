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
$audio = $this->params['audio']('audio');
$this->registerJs('var TRUCKHORN = '.$audio->playTruckHorn.'; var MENUSOUND = '.$audio->playMenuSound.'; var CALCULATORSOUND = '.$audio->playCalculatorSound.';',\yii\web\View::POS_HEAD);
$this->beginPage(); ?>
<html lang="<?= Yii::$app->language ?>" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    
    

    <meta name="author" content="<?= $this->params['seo']('author')?>">
    <meta name="description" content="<?= $this->params['seo']('summary')?>">
    <meta name="keyword" content="<?= $this->params['seo']('keyword')?>">
    <meta property="og:locale" content="sv_SE" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?=$this->params['seo']('title')?>" />
    <meta property="og:description" content="<?= $this->params['seo']('summary')?>" />
    <meta property="og:url" content="https://www.pastordennisflyttfirma.se" />
    <meta property="og:image" content="https://www.pastordennisflyttfirma.se/pastordennis_kodknackare.jpg" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:site_name" content="<?=$this->params['config']('name')?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="<?= $this->params['seo']('summary')?>" />
    <meta name="twitter:title" content="<?=$this->params['seo']('title')?>" />
    <meta name="twitter:image" content="<?=$this->params['config']('logo')?>" />

    <?php $this->registerCsrfMetaTags() ?>
    <!-- Document title -->
    <title><?=$this->params['seo']('title')?></title>
    <meta name="google-site-verification" content="<?=$this->params['seo']('google_site_verification')?>" />
    <!-- Site Icons -->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ff6601">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ff6601">
    <!-- Stylesheets & Fonts -->
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/sv_SE/sdk.js#xfbml=1&version=v5.0"></script>
<!-- preloader -->
<div id="preloader"></div>

<!-- Body Inner -->
<div>
    <h1 style="display: none">
        Ett nystartat flytt och transport företag</h1>
    <h2 style="display: none">
        <?=$this->params['config']('name')?></h2>
    <h3 style="display: none">
        Utvecklad av : Kodknackare Webblösningar AB </h3>
    <audio id="menu-audio" src="/web/mp3/menu.wav" type="audio/wav"></audio>
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
<p style="display: none">
    Bilderna är från demontering Woodys Landskrona och uppmontering av trähall till Woodys Löddeköpinge. Som ni ser sä är tunga arbeten inga problem för oss 😊😊.
    <br/>

    Rengöring är processen för att ta bort oönskade ämnen, till exempel smuts, smittämnen och andra föroreningar, från ett föremål eller miljö. Rengöring sker i många olika sammanhang och använder många olika metoder.    <br/>
   <br/>

</p>
<div style="display: none">
    <p>
        Renlighet har olika betydelser beroende på diskussionsfrågan. När det gäller religion är renlighet tillståndet att vara ren utan moralisk kontaminering. När ämnet är på miljön är det tillståndet att vara fritt från smuts. Miljövänlighet är vad de flesta känner till på grund av den dagliga interaktionen med miljön och de effekter de har på individernas liv med avseende på hälsa och förväntningar i samhället. Renhet i miljön inkluderar allt på jordens yta. Det finns olika typer av renlighet i miljön. Det mesta betonas miljörenlighet vid förebyggande av föroreningar och hälsoutbildning i samhället. Religionens renlighet varierar med den specifika religionen och dess övertygelser. Betydelsen av renlighet inses både i andliga och fysiska aspekter. Samhället ställer dubbla standarder för renlighet så att vad som än är rent beundras och kämpas för.
    </p>

    Typer av renlighet:

    Det finns två huvudtyper av renlighet, dvs fysisk renhet och andlig renlighet. Fysisk renlighet har flera undertyper beroende på objektet som rengörs. Fysisk renlighet innebär eliminering av smuts och föroreningar från kroppen, kläder, mat, hus och den yttre miljön. Rengöring av kroppen görs genom hela kroppsbad med tvål och vatten, handtvätt och håller sig borta från smuts. Rengöring av kläder är en tvättprocess där manuell tvätt med händer kan göras eller maskintvätt. Rengöring av miljön sker genom insamling av smuts i miljön och bortskaffande av dem på lämpligt sätt samtidigt som man iakttar renheten i alla de tre aspekterna av miljön, dvs luft, vatten och mark. Vid hantering av mat bör renhet iakttas genom handtvätt och användning av rent matlagnings- och matredskap för att förhindra intag av smuts. Husen och hushållsartiklarna bör också hållas rena, särskilt bostaden, köket, sovrummen och badrummen eftersom vi interagerar med husmiljön oftare.

    Andlig renlighet är i grunden inriktad på att avlägsna moralisk kontaminering och att vara ren i religionens tro och övertygelser. Hos kristna betyder renlighet förlåtelse för synd och att leva enligt Bibelns doktriner. Kristna har också renhet av förhållanden som anses orena, till exempel menstruation och förlossning. Kristna lägger stor vikt vid hygien hos människor. I islam betyder renlighet renheten i individer och de goda sätten för medlemmarna i samhället. Muslimer tror att rening av individernas hjärtan från känslor av negativitet och dåliga laster som svartsjuka gör det möjligt för samhället att vara fredligt hela tiden. Muslimer tror också att renlighet från förhållanden som anses rituellt oren är viktig. Hinduer tror att renlighet är en gudomlig kvalitet som bör utövas av individer. Bhagavad Gita beskriver renlighet i förhållande till det hinduiska samhällets dygder och kvaliteter som individer måste förvärva för att få nåd av Gud. Hinduer utför också renhet genom att besöka de sju floderna för att bada och rena sina sinnen.

    Vikten av renlighet:

    Renlighet är en viktig del av människors liv både fysiskt och andligt. Andlig renlighet är viktig för att vara på rätt väg med din Gud och följa trosuppfattningarna och ritualerna i din religion. Å andra sidan är fysisk renlighet viktig för människans välbefinnande och existens.

    Renlighet är nödvändig för individernas och samhällets hälsa och välbefinnande. Hälsa och renlighet hänför sig till varandra och påverkar varandra. För att vara god hälsa bör man öva på hygien. Hygien är i princip praktiken att upprätthålla god hälsa och förebygga sjukdomar genom renhet. Renhet i kroppen, maten och miljön bidrar till människors välbefinnande. Renhet förebygger sjukdom eftersom smuts vanligtvis har infektionspatogener som orsakar sjukdom hos människor när de utsätts för dem. Hygienisk praxis förespråkas starkt av hälso- och sjukvårdspersonal eftersom det är bättre att förebygga en sjukdom än att vänta och söka behandling för den. Hygieniska förfaranden förlänger individers liv eftersom de kommer att vara fria från sjukdomar.

    Säkerhet möjliggörs genom miljön. Miljön som vi interagerar med måste ofta vara ren så att olyckor kan förebyggas. Till exempel på arbetsplatsen garanterar daglig rengöring att det inte finns några vattenutsläpp på golvet som kan orsaka fall. Att rensa buskar runt hem ger säkerhet från skadliga insekter och djur som ormar. Rengöring innebär inte bara att man rensar buskar och tvättar golv, utan också miljöorganisationen. Genom organisation kan skadliga föremål tas bort så att olyckor kan förebyggas i miljön.
    Varumärkesskydd kan uppnås genom renhet. När det gäller miljövänlighet rengörs och organiseras byggnader och den omgivande miljön. Som marknadsföringsstrategi är renlighet en fördel för varumärket eftersom det kommer att framställa varumärket som organiserat och befrämjande för mänsklig interaktion. I denna konkurrenskraftiga värld är renlighet en prioriterad faktor för varumärken. I livsmedelsindustrin är renheten vad folk tittar på innan de kan engagera sig eftersom hälsovård är viktigt för individer.

    Renlighet möjliggör också förlängning av ett objekts livslängd. Med verktyg och instrument betonas renlighet eftersom smuts orsakar minskad livslängd som i metallföremål, rost orsakar förstörelse av verktygen och instrumenten. I byggnader bevarar renlighet också integriteten och möjliggör längre hållbarhet.

    Renlighet är en moralisk dygd som beundras. När en person är ren, blir sociala relationer och interaktioner lättare eftersom samhället ser smutsiga människor som en olägenhet och de är oåtkomliga. Renlighet är attraktiv och beundransvärd i samhället.

    Sammanfattningsvis är renhet i individernas liv oundviklig. Allt som omger individens liv är livskraftigt för renlighet för att upprätthålla funktionalitet och utveckling. Andlig renlighet är mestadels inriktad på renheten av jaget inför Gud och mänskligheten i alla religioner, även om reningsmetoderna är olika för varje religion. Fysisk renlighet är fördelaktig när det gäller mänsklig interaktion och miljön när det gäller hälsa, säkerhet och livslängd.
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
