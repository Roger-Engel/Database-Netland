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

    $title = "title";
    $type = "type";
    $rating = "rating";
    $summary = "summary";
    $has_won_awards = "has_won_awards";
    $length_in_minutes = "length_in_minutes";
    $seasons = "seasons";
    $spoken_in_language = "spoken_in_language";
    $youtube_trailer_id = "youtube_trailer_id";
    $country = "country";
    $released_at = "released_at";


    $stmt = $pdo->prepare('SELECT * FROM media WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $pdo->prepare('SELECT * FROM media WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $stmt2 = $pdo->prepare('SELECT * FROM media WHERE id = :id');
    $stmt2->bindParam(':id', $id);
    $stmt2->execute();

    $movie = $stmt->fetch(PDO::FETCH_OBJ);
    $edit_array2 = $stmt2->fetchall(PDO::FETCH_OBJ);

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $type = $_POST['type'];
        $rating = $_POST['rating'];
        $summary = $_POST['summary'];
        $has_won_awards = $_POST['has_won_awards'];
        $length_in_minutes = $_POST['length_in_minutes'];
        $seasons = $_POST['seasons'];
        $spoken_in_language = $_POST['spoken_in_language'];
        $youtube_trailer_id = $_POST['youtube_trailer_id'];
        $country = $_POST['country'];
        $released_at = $_POST['released_at'];

        $stmt = $pdo->prepare('INSERT INTO media (title, type, rating, length_in_minutes, released_at, summary, youtube_trailer_id, has_won_awards, seasons, country, spoken_in_language) VALUES
    (:title, :type, :rating, :length_in_minutes, :released_at, :summary, :youtube_trailer_id, :has_won_awards, :seasons, :country, :spoken_in_language)');
        $stmt->execute([
            'title' => $title, 'type' => $type, 'rating' => $rating, 'length_in_minutes' => $length_in_minutes, 'released_at' => $released_at,
            'summary' => $summary, 'youtube_trailer_id' => $youtube_trailer_id, 'has_won_awards' => $has_won_awards, 'seasons' => $seasons, 'country' => $country,
            'spoken_in_language' => $spoken_in_language
        ]);
    }

    ?>

    <h2>Add New Media</h2>
    <form method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title">
        <label for="type">Type:</label>
        <select id="type" name="type">
            <option value="movie">Movie</option>
            <option value="series">Series</option>
        </select>
        <label for="rating">Rating:</label>
        <input type="number" id="rating" name="rating" min="0" max="5" step="0.1">
        <label for="summary">Summary:</label>
        <textarea id="summary" name="summary"></textarea>
        <label for="has_won_awards">Has Won Awards:</label>
        <input type="checkbox" id="has_won_awards" name="has_won_awards" value="1">
        <label for="length_in_minutes">Length in Minutes:</label>
        <input type="number" id="length_in_minutes" name="length_in_minutes">
        <label for="seasons">Seasons:</label>
        <input type="number" id="seasons" name="seasons">
        <label for="spoken_in_language">Spoken in Language:</label>
        <input type="text" id="spoken_in_language" name="spoken_in_language">
        <label for="youtube_trailer_id">YouTube Trailer ID:</label>
        <input type="text" id="youtube_trailer_id" name="youtube_trailer_id">
        <label for="country">Country:</label>
        <input type="text" id="country" name="country">
        <label for="released_at">Released at:</label>
        <input type="date" id="released_at" name="released_at">
        <input type="submit" name="submit" value="Submit">
    </form>
    <a href="index.php">Terug</a>

    </form>






</body>

</html>