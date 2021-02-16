<?php
$anime_list = [];

file_exists('images/') && $images = 'images/';

if (file_exists('anime_list.json')) {
    $json = file_get_contents('anime_list.json');
    $anime_list = json_decode($json, true);
}

$anime_summary = count($anime_list);
$scanned_directory = array_diff(scandir($images), ['..', '.']);
$random_img = array_rand(array_flip($scanned_directory), 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Watchlist</title>
    <link rel="preconnect" href="https://fonts.gstsatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@500&family=Roboto+Condensed&display=swap">
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-image: url(<?php echo $images.$random_img; ?>)">
    <div class="container">
        <div class="section">
            <div class="form">
                <form action="server.php" method="post">
                    <input type="text" name="anime_name" placeholder="Enter your anime" required>
                    <button class="btn">New anime +</button>
                </form>
                <div class="total">
                    <p>
                        <?php echo $anime_summary > 0 ? "Total anime to watch: $anime_summary" : 'No anime to watch...'; ?>
                    </p>
                </div>
                <div class="clock">
                    <span>Time: </span><span class="time"></span>
                </div>
            </div>
            <div class="anime__list">
                <h3>Anime to watch</h3>
                <ul class="scroll">
                    <?php foreach ($anime_list as $anime_name => $anime): ?>
                        <li class="anime__list-item">
                            <form action="change_status.php" method="post">
                                <input type="hidden" name="anime_name" value="<?php echo $anime_name; ?>">
                                <input type="checkbox" <?php echo $anime['completed'] ? 'checked' : ''; ?> >
                            </form>
                            <?php echo $anime_name; ?>
                            <form action="delete.php" method="post">
                                <input type="hidden" name="anime_name" value="<?php echo $anime_name; ?>">
                                <button class="btn">Delete anime</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>    
    </div>    

    <script type="text/javascript" src="script.js"></script>
</body>
</html>