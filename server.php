<?php

// echo '<pre>';
// var_dump($_POST);
// echo '<pre>';

$animeName = $_POST['anime_name'] ?? '';
$animeName = str_replace(['/', '\\', '<', '>'], '', trim($animeName));

if ($animeName) {
    if (file_exists('anime_list.json')) {
        $json = file_get_contents('anime_list.json');
        $animeList = json_decode($json, true);
    } else {
        $animeList = [];
    }

    $animeList[$animeName] = ['completed' => false];

    file_put_contents('anime_list.json', json_encode($animeList, JSON_PRETTY_PRINT));
}

header('Location: index.php');

?>