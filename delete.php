<?php
$json = file_get_contents('anime_list.json');
$animeList = json_decode($json, true);

$animeName = $_POST['anime_name'];

unset($animeList[$animeName]);

file_put_contents('anime_list.json', json_encode($animeList, JSON_PRETTY_PRINT));

header('Location: index.php');
?>