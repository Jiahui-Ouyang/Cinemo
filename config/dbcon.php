<?php

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('cinemo-3d3c4-firebase-adminsdk-wqysj-69350afbe1.jsoncinemo-3d3c4-firebase-adminsdk-wqysj-69350afbe1.json')
    ->withDatabaseUri('https://cinemo-3d3c4-default-rtdb.asia-southeast1.firebasedatabase.app');

    $database = $factory->createDatabase();
?>