<?php

require __DIR__ . "/vendor/autoload.php";

use App\Services\ValorantAPI;

$valorantAPI = new ValorantAPI();
$valorantAPI->maps();
$valorantAPI->get();

$mapsData = $valorantAPI->callback();

$maps = array();

foreach ($mapsData->data as $map) {
    $mapName = $map->displayName;
    $coordinates = $map->coordinates;
    $maps[] = array("displayName" => $mapName, "coordinates" => $coordinates);
}

foreach ($maps as $map) {
    echo "Nome do Mapa: " . $map['displayName'] . "<br>";
    echo "Coordenadas: " . $map['coordinates'] . "<br>";

    echo "<br>";
}

echo "<hr>";
