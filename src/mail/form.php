<div style="width:100% !important;">
    <!--[if (!mso)&(!IE)]><!-->
    <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
        <!--<![endif]-->
        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
        <div style="color:#0D0D0D;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
            <div style="font-size: 12px; line-height: 1.2; color: #0D0D0D; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;">
                <p style="font-size: 28px; line-height: 1.2; text-align: center; word-break: break-word; mso-line-height-alt: 34px; margin: 0;"><span style="font-size: 28px;"><strong><span style="font-size: 28px;">Prisförfrågan</span></p>
            </div>
        </div>
        <!--[if mso]></td></tr></table><![endif]-->
        <div align="center" class="img-container center">
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="" align="center"><![endif]--><img align="center" alt="Image" border="0" class="center" src="https://pastordennisflyttfirma.se/images/divider.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 318px; display: block;" title="Image" width="318"/>
            <!--[if mso]></td></tr></table><![endif]-->
        </div>
        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
<!--      content-->
        <div style="color:#555555;font-family:Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
            <div style="font-size: 18px; line-height: 1.5; color: #555555; font-family: Montserrat, Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 18px;">
                <?= \yii\widgets\DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'type',
                        'service',
                        'date',
                        'name',
                        'number',
                        'email',
                        'phone',
                        'current_address',
                        'current_city',
                        'current_living_space',
                        'current_residence',
                        'current_residence_lift',
                        'current_residence_floor',
                        'new_address',
                        'new_city',
                        'new_living_space',
                        'new_residence',
                        'new_residence_lift',
                        'new_residence_floor',
                        'grid_deductions',
                        'counted_cubic',
                        'other_info']
                ])?>
                <hr>
                <?php
                if($model->kubik!=null){
                    ?>
                    <style>
                        #kubik{
                            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                            border-collapse: collapse;
                            width: 100%;
                        }

                       #kubik td, #kubik th {
                            border: 1px solid #ddd;
                            padding: 8px;
                        }

                        #kubik tr:nth-child(even){background-color: #f2f2f2;}

                        #kubik tr:hover {background-color: #ddd;}

                        #kubik th {
                            padding-top: 12px;
                            padding-bottom: 12px;
                            text-align: left;
                            background-color: #f47920;
                            color: white;
                        }
                    </style>
                <strong>Kubik Information</strong>
                    <table id="kubik">
                        <tr>
                            <th>Name</th>
                            <th>st</th>
                            <th>Rate</th>
                            <th>Result</th>
                        </tr>
                        <?php
                        foreach ($model->kubik['items'] as $k){
                            echo "<tr>";
                            echo "<td>";
                            echo $k['name'];
                            echo "</td>";
                            echo "<td>";
                            echo $k['input']." st";
                            echo "</td>";
                            echo "<td>";
                            echo $k['rate'];
                            echo "</td>";
                            echo "<td>";
                            echo $k['output']." m3";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                        <?php
                            echo "<tr>";
                            echo "<td>";

                            echo "</td>";
                            echo "<td>";

                            echo "</td>";
                            echo "<td>";
                            echo "Total";
                            echo "</td>";
                            echo "<td>";
                            echo $model->kubik['total']." m3";
                            echo "</td>";
                            echo "</tr>";
                        ?>
                    </table>
                <?php
                }
                ?>



            </div>
        </div>
<!--content end-->
        <!--[if mso]></td></tr></table><![endif]-->
        <div align="center" class="img-container center">
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="" align="center"><![endif]--><img align="center" alt="Image" border="0" class="center" src="https://pastordennisflyttfirma.se/images/divider.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 318px; display: block;" title="Image" width="318"/>
            <!--[if mso]></td></tr></table><![endif]-->
        </div>
        <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">
            <tbody>
            <tr style="vertical-align: top;" valign="top">
                <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 30px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; width: 100%;" valign="top" width="100%">
                        <tbody>
                        <tr style="vertical-align: top;" valign="top">
                            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
        <div align="center" class="img-container center fixedwidth">
            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="" align="center"><![endif]--><img align="center" border="0" class="center fixedwidth" src="https://media0.giphy.com/media/JPm9P0EDVmJ4ygbjbR/giphy.gif?cid=20eb4e9d1bc3f84738a4e2454c223942b83cf96797161c41&amp;rid=giphy.gif" style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 172px; display: block;" width="172"/>
            <!--[if mso]></td></tr></table><![endif]-->
        </div>
        <!--[if (!mso)&(!IE)]><!-->
    </div>
    <!--<![endif]-->
</div>

