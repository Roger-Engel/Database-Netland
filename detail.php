<!DOCTYPE html>
<html lang="en">

<head>
    <title>Netland Panneel</title>
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
    </style>


    <?php

    $id = $_GET['id'];

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

    $stmt = $pdo->prepare('SELECT * FROM media WHERE id = :id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $stmt2 = $pdo->prepare('SELECT * FROM media WHERE id = :id');
    $stmt2->bindParam(':id', $id);
    $stmt2->execute();

    $serie = $stmt->fetch(PDO::FETCH_OBJ);
    $edit_array = $stmt2->fetchall(PDO::FETCH_OBJ);

    function getTitle()
    {
        global $serie;
        return $serie->title;
    }

    function getRating()
    {
        global $serie;
        return $serie->rating;
    }

    function getAward()
    {
        global $serie;
        return $serie->has_won_awards;
    }

    function hasWonAward()
    {
        if (getAward()) {
            return 'ja';
        }

        return 'nee';
    }

    function getSeasons()
    {
        global $serie;
        return $serie->seasons;
    }

    function getCountry()
    {
        global $serie;
        return $serie->country;
    }

    function getSpokenInLanguage()
    {
        global $serie;
        return $serie->spoken_in_language;
    }

    function getSummary()
    {
        global $serie;
        return $serie->summary;
    }

    function getDuur()
    {
        global $serie;
        return $serie->length_in_minutes;
    }

    function getReleased()
    {
        global $serie;
        return $serie->released_at;
    }

    function getYoutube()
    {
        global $serie;
        return $serie->youtube_trailer_id;
    }

    function editKey($edit_array)
    {
        foreach ($edit_array as $key) {
            echo '<tr>';
            echo '<td>' . "Information" . '</td>';
            echo '<td>' . "Information" . '</td>';
            echo '<td>' . "<a href='edit.php?id=$key->id'>Edit</a>" . '</td>';
            echo '</tr>';
        }
    }


    ?>



    <h2><?php echo getTitle(); ?></h2>

    <table>
        <tr>
            <?php echo editKey($edit_array); ?>
        </tr>
        <tr>
            <th>Awards won</th>
            <td><?php echo hasWonAward(); ?></td>
        </tr>
        <tr>
            <th>Seasons</th>
            <td><?php echo getSeasons(); ?></td>
        </tr>
        <tr>
            <th>Country</th>
            <td><?php echo getCountry(); ?></td>
        </tr>
        <tr>
            <th>Spoken in language</th>
            <td><?php echo getSpokenInLanguage(); ?></td>
        </tr>
        <tr>
            <th>Rating</th>
            <td><?php echo getRating(); ?></td>
        </tr>
        <tr>
            <th>Length</th>
            <td><?php echo getDuur(); ?></td>
        </tr>
        <tr>
            <th>Release Date</th>
            <td><?php echo getReleased(); ?></td>
        </tr>
        <tr>
            <th>Youtube trailer id</th>
            <td><?php echo getYoutube(); ?></td>
        </tr>
    </table>
    <h3>Beschrijving:</h3>
    <p><?php echo getSummary(); ?></p>
    <a href="index.php">Terug</a>
    </body>

</html>