<?php
$this->title = "Media";
use alexantr\elfinder\ElFinder;

echo ElFinder::widget([
    'connectorRoute' => ['finder/connector'],
    'settings' => [
        'height' => 800,
    ],
    'buttonNoConflict' => true,
]);