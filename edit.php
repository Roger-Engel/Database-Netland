<!DOCTYPE html>
<html lang="en">

<head>
    <title>Netland Paneel</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #2A2323;
            font-family: bold;
            font-size: x-large;
            font-family: Arial, Helvetica, sans-serif;

        }

        h2 {
            color: white;
        }

        h3 {
            color: white;
        }

        a {
            text-decoration: none;
            color: white;
            font-family: bold;
            font-size: large;
            font-family: Arial, Helvetica, sans-serif;
        }

        p {
            border-radius: 10px;
            font-family: bold;
            font-size: large;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            border-color: yellow;
            border-style: solid;
            max-width: 1500px;

        }

        th {
            border-color: #2A2323;
            border-style: solid;
            background-color: #544D4D;
            color: #908686;
            font-family: bold;
            font-size: large;
            font-family: Arial, Helvetica, sans-serif;
        }

        tr {
            border-color: #2A2323;
            border-style: solid;
            background-color: #544D4D;
            color: #908686;
            font-family: bold;
            font-size: x-large;
            font-family: Arial, Helvetica, sans-serif;
        }

        label {
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
</head>

<body>
    <?php

    $localhost = 'localhost';
    $db = 'netland';
    $user = 'bit_academy';
    $pass = 'bit_academy';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$localhost;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
    } catch (\PDOException $e) {
        echo 'error connecting to database: ' . $e->getMessage();
    }

    $row = [];

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $stmt = $pdo->prepare('SELECT * FROM media WHERE id = :id');
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt = $pdo->prepare('UPDATE media SET title = :title, type = :type, rating = :rating, summary = :summary, has_won_awards = :has_won_awards, seasons = :seasons, spoken_in_language = 
        :spoken_in_language, length_in_minutes = :length_in_minutes, youtube_trailer_id = :youtube_trailer_id, country = :country, released_at = :released_at     WHERE id = :id');
        $stmt->bindParam(':title', $_POST['title']);
        $stmt->bindParam(':type', $_POST['type']);
        $stmt->bindParam(':rating', $_POST['rating']);
        $stmt->bindParam(':summary', $_POST['summary']);
        $stmt->bindParam(':has_won_awards', $_POST['has_won_awards']);
        $stmt->bindParam(':seasons', $_POST['seasons']);
        $stmt->bindParam(':spoken_in_language', $_POST['spoken_in_language']);
        $stmt->bindParam(':length_in_minutes', $_POST['length_in_minutes']);
        $stmt->bindParam(':youtube_trailer_id', $_POST['youtube_trailer_id']);
        $stmt->bindParam(':country', $_POST['country']);
        $stmt->bindParam(':released_at', $_POST['released_at']);
        $stmt->bindParam(':id', $_POST['id']);
        $stmt->execute();

        $row = [
            'id' => $_POST['id'],
            'title' => $_POST['title'],
            'type' => $_POST['type'],
            'rating' => $_POST['rating'],
            'summary' => $_POST['summary'],
            'has_won_awards' => $_POST['has_won_awards'],
            'seasons' => $_POST['seasons'],
            'spoken_in_language' => $_POST['spoken_in_language'],
            'length_in_minutes' => $_POST['length_in_minutes'],
            'youtube_trailer_id' => $_POST['youtube_trailer_id'],
            'country' => $_POST['country'],
            'released_at' => $_POST['released_at'],
        ];
    }
    ?>

    <h2>Media Details</h2>
    <?php if (!empty($row)) { ?>
        <h2><?php echo $row['title']; ?></h2>
        <h3>Type: <?php echo $row['type']; ?> | Rating: <?php echo $row['rating']; ?></h3>
        <p><?php echo $row['summary']; ?></p>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
            <label for="title">Title:</label>
            <input type="text" name="title" value="<?php echo $row['title']; ?>" />
            <label for="type">Type:</label>
            <select name="type">
                <option value="Movie" <?php echo ($row['type'] === 'Movie') ? 'selected' : ''; ?>>Movie</option>
                <option value="Series" <?php echo ($row['type'] === 'Series') ? 'selected' : ''; ?>>Series</option>
            </select>
            <label for="rating">Rating:</label>
            <input type="number" min="0" max="5" step="0.1" name="rating" value="<?php echo $row['rating']; ?>" />
            <label for="summary">Summary:</label>
            <textarea name="summary"><?php echo $row['summary']; ?></textarea>

            <label for="awards">Has won awards:</label><br>
            <input type="text" name="has_won_awards" value="<?php echo $row['has_won_awards']; ?>">

            <label for="seasons">Seasons:</label><br>
            <input type="text" name="seasons" value="<?php echo $row['seasons']; ?>">

            <label for="spoken_in_language">Spoken Language:</label><br>
            <input type="text" name="spoken_in_language" value="<?php echo $row['spoken_in_language']; ?>">

            <label for="length_in_minutes">Duur:</label><br>
            <input type="text" name="length_in_minutes" value="<?php echo $row['length_in_minutes']; ?>">

            <label for="youtube_trailer_id">Youtube trailer id:</label><br>
            <input type="text" name="youtube_trailer_id" value="<?php echo $row['youtube_trailer_id']; ?>">

            <label for="country">Country of origin:</label><br>
            <input type="text" name="country" value="<?php echo $row['country']; ?>">

            <label for="released_at">Released at:</label><br>
            <input type="text" name="released_at" value="<?php echo $row['released_at']; ?>">

            <button type="submit">Update</button>
            <a href="index.php">Terug</a>

        </form>
    <?php } else { ?>
        <p>No media found with that ID</p>
    <?php } ?>






</body>

</html>