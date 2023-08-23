<?php

require __DIR__ . "/vendor/autoload.php";

use App\Services\ValorantAPI;

$valorantAPI = new ValorantAPI();
$valorantAPI->agents();
$valorantAPI->get();

$agentsData = $valorantAPI->callback();

foreach ($agentsData->data as $agent) {
    $displayName = $agent->displayName;
    $description = $agent->description;
    $roleDisplayName = $agent->role->displayName;
    $roleDescription = $agent->role->description;

    $abilitiesData = array();

    foreach ($agent->abilities as $ability) {
        $abilityName = $ability->displayName;
        $abilityDescription = $ability->description;
        $abilitiesData[] = array("name" => $abilityName, "description" => $abilityDescription);
    }

    echo "Nome: " . $displayName . "\n";
    echo "Descrição: " . $description . "\n";
    echo "Função: " . $roleDisplayName . "\n";
    echo "Descrição: " . $roleDescription . "\n";
    echo "\n";

    foreach ($abilitiesData as $ability) {
        echo "Abilidade: " . $ability['name'] . "\n";
        echo "Descrição: " . $ability['description'] . "\n";
        echo "\n";
    }
}
