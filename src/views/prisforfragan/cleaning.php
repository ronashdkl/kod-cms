<?php
/**
 * @var $this \yii\base\View
 */
$this->registerJsFile('@web/web/js/cleaning.js', ['depends' => \ronashdkl\kodCms\assets\AppAsset::class]);
?>

<style>
    .panel-orange {
        background: #ff6600;
    }

    .cleaning-form {
        padding: 10px 20px;
    }


    .cleaning-form a {
        text-decoration-line: underline;
        color: #fff;
    }

    .cleaning-form .btn {
        background: green;
        border-radius: 0px;
        position: relative;
        bottom: 6px;
        left: 10px;
    }

    .cleaning-form hr {
        height: 2px;
        background: #f9f9f9;
        margin: 10px auto;
        width: 100%;
    }

    .cleaning-form .panel-body {
        padding: 0px 10px;
        text-align: justify-all;
    }

    .panel-help {
        padding: 0px 10px;
        border-radius: 5px;
    }

    .panel-help ul {
        line-height: 30px;
        padding: 0px 10px;
    }

    .panel-help .fa {
        color: #ff6600;
    }

    #close {
        color: #000;
        text-decoration-line: none;
    }

    #resultLink {
        background: #ff6600;
        padding: 1px 9px;
        border: 0px;
        cursor: pointer;
    }
</style>
<div class="container">
    <div class="col-sm-12 text-capitalize text-center section_title" style="padding: 20px;">
        <h4 class="font-weight-bold" style="font-size: 26px">Flyttstädning</h4>

        <div class="title_border"></div>
    </div>
    <div style="padding:20px; text-align: center">
        När hemmet eller kontoret är tömt vill man givetvis bara få stänga dörren bakom sig och fokusera på att komma tillrätta i sin nya tillvaro, men här väntar den omfattande flyttstädningen. En flyttstädning är betydligt mycket mer krävande än en storstädning och är man inte ute i god tid kan det vara svårt att hinna med alla moment. Lämna nyckeln till oss så ser vi till så att ditt gamla hem/kontor lämnas i perfekt skick. Våra kunniga lokalvårdare rengör samtliga ytor renligt konstens alla regler och ser till så att resultatet godkänns vid slutbesiktning och blir till belåtenhet. Då vi utlovar 14 dagars städgaranti på vårt arbete.
    </div>
</div>
<div class="row d-flex justify-content-center">

    <div class="col-md-7 mt-5 mb-5">
        <div class="cleaning-form panel  panel-orange">
            <div class="panel-heading text-center text-white">
                <h4>Städning!</h4>
                <hr>
            </div>
            <div class="panel-body mb-5 text-white">
                Vårt främsta mål är att alltid leverera service med hög kvalitet. Vi utför våra städningar från Trelleborg, Vellinge, Malmö, Lund Landskrona till Helsingborg med omnejd.
            </div>
            <div class="mb-5"></div>
            <div class="mb-5  text-white">
                <h4>Vad blir ert pris?</h4>
                <span>Skriv in storlek (kvm) på din bostad för att få ett uppskattat pris för hemstädning per tillfälle.

Vad ingår i priset: Allt städmaterial samt fönsterputsning</span>
            </div>
            <div>
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-12 col-md-5">
                        <input min="1" type="number" style="width: 100%;" placeholder="Min boende yta är (m²)" name="input">
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <button  style="background: green"
                                class="cleaning-btn btn btn-lg btn-success">Räkna ut mitt
                            pris!
                        </button>
                    </div>
                </div>
            </div>
         <!--   <div>
                <div class="row d-flex justify-content-end">
                    <div class="col-md-4">
                        <a data-toggle="collapse" href="#help" role="button" aria-expanded="false"
                           class="help-btn"><u>Vad ingår i priset?</u></a>

                    </div>
                </div>
            </div>

            <div class="mt-5 mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10">
                        <div class="collapse" id="help">
                            <div class="panel panel-help bg-white text-black">
                                <div class="panel-heading">
                                    <h4>Vad ingår i priset?</h4>
                                </div>
                                <div class="panel-body">
                                    <span>Allt städmaterial inklusive miljövänliga rengöringsmedel.</span>
                                    <br>
                                    <span>Varför God Service?</span>
                                    <ul>
                                        <li><i class="fa fa-arrow-circle-o-right"></i> 80% av våra kunder har inkommit
                                            via rekommendation.
                                        </li>
                                        <li><i class="fa fa-arrow-circle-o-right"></i> Marknaden bästa
                                            uppföljningssystem för 100% kundnöjdhet.
                                        </li>
                                        <li><i class="fa fa-arrow-circle-o-right"></i> SMS-bekräftelse vid avslutad
                                            service (Valfritt).
                                        </li>
                                        <li><i class="fa fa-arrow-circle-o-right"></i> Flexibilitet inom våra
                                            abonnemang. Valfrihet att ändra på vad som ska
                                            utföras från gång till gång - inom den avtalade tiden.
                                        </li>
                                        <li><i class="fa fa-arrow-circle-o-right"></i> Samma dag - samma tid - samma
                                            person
                                        </li>
                                        <li><i class="fa fa-arrow-circle-o-right"></i> Full försäkring för ert hem och
                                            för våra servicekonsulter.
                                        </li>
                                        <li><i class="fa fa-arrow-circle-o-right"></i> God Service administrerar
                                            RUT-avdraget med Skatteverket.
                                        </li>
                                        <ul>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           -->

            <!--            result-->
            <div class="mt-5 mb-5 calculation">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10">
                        <div id="calc">
                            <div class="panel-help bg-white text-black">
                                <div class="">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Paket</th>
                                            <th>Pris (efter rut-avdrag)*</th>
                                            <th><a id="close" href="#cleaning-form">Stäng (x)</a></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Städning</td>
                                            <td><span id="result"></span><span>:- / tillfälle*</span></td>
                                            <td><a id="resultLink" href="/prisforfragan/Flyttstädning"
                                                   class="btn btn-success">Anmäl intresse</a></td>
                                        </tr>
                                        </tbody>

                                    </table>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-sm-12">
                                            <p><sup>*</sup>Startavgift på 150 :- samt kostnad för drivmedel 20:- per påbörjad mil tillkommer då detta inte är en rut berätigad kostnad och måste separeras enligt skatteverkets regler.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--            end result-->
        </div>
    </div>

</div>
