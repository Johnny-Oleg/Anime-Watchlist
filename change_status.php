<?php
if (file_exists('anime_list.json')) {
    $json = file_get_contents('anime_list.json');
    $anime_list = json_decode($json, true);
}

$anime_name = $_POST['anime_name'];
$anime_list[$anime_name]['completed'] = !$anime_list[$anime_name]['completed'];

file_put_contents('anime_list.json', json_encode($anime_list, JSON_PRETTY_PRINT));

header('Location: index.php');
?>