<?php
$animeList = [];

if (file_exists('anime_list.json')) {
    $json = file_get_contents('anime_list.json');
    $animeList = json_decode($json, true);
}

$animeSummary = count($animeList);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Watchlist</title>
</head>
<body>
    <form action="server.php" method="post">
        <input type="text" name="anime_name" placeholder="Enter your anime">
        <button>New anime</button>
    </form>
    <h3>Anime to watch</h3>
    <?php foreach ($animeList as $animeName => $anime): ?>
        <div>
            <form action="change_status.php" method="post">
                <input type="hidden" name="anime_name" value="<?php echo $animeName; ?>">
                <input type="checkbox" <?php echo $anime['completed'] ? 'checked' : ''; ?> >
            </form>
            <?php echo $animeName; ?>
        </div>
        <form action="delete.php" method="post">
            <input type="hidden" name="anime_name" value="<?php echo $animeName; ?>">
            <button>Delete anime</button>
        </form>
    <?php endforeach; ?>
    <div>
        <p>Total anime to watch <?php echo $animeSummary; ?></p>
    </div>

    <script type="text/javascript" src="script.js"></script>
</body>
</html>