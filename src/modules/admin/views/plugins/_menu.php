<?php

/* 
 * This file is part of the yii2-plugins-system module
 */

use yii\bootstrap\Nav;

echo Nav::widget([
            'options' => [
                'class' => 'nav-tabs',
                'style' => 'margin-bottom: 15px'
            ],
            'items' => [
                [
                    'label' => Yii::t('plugin', 'Items'),
                    'url' => ['/plugins/plugin/index'],
                ],
               /* [
                    'label' => Yii::t('plugin', 'Events'),
                    'url' => ['/plugins/event/index'],
                ],
                [
                    'label' => Yii::t('plugin', 'Shortcodes'),
                    'url' => ['/plugins/shortcode/index'],
                ],
                [
                    'label' => Yii::t('plugin', 'Categories'),
                    'url' => ['/plugins/category/index'],
                ],
                [
                    'label' => Yii::t('plugin', 'Info'),
                    'url' => ['/plugins/plugin/info'],
                ],*/
                [
                    'label' => Yii::t('plugin', 'Install'),
                    'url' => ['/plugins/plugin/install'],
                ],
            ]
        ]);