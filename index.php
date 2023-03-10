<!DOCTYPE html>
<html lang="en">

<head>
    <title>Netland Panel</title>

    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #2A2323;
            font-family: Arial, Helvetica, sans-serif;
        }

        a {
            text-decoration: none;
            color: #908686;
            font-weight: bold;
            font-size: large;
        }

        h1,
        h3 {
            color: white;
        }

        table {
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            border: 1px solid #2A2323;
            background-color: #544D4D;
            color: #908686;
            font-weight: bold;
            font-size: large;
            padding: 10px;
            cursor: pointer;
        }

        th:hover {
            background-color: #6E6666;
        }

        .add {
            border: 1px solid #2A2323;
            background-color: #544D4D;
            color: #908686;
            font-weight: bold;
            font-size: large;
            cursor: pointer;
            text-align: center;
            width: 40px;
            height: 55px;
        }

        .add:hover {
            background-color: #6E6666;
        }


        th.sorted-asc,
        th.sorted-desc {
            background-color: #6E6666;
        }

        td {
            border: 1px solid #2A2323;
            background-color: #544D4D;
            color: #908686;
            font-weight: bold;
            font-size: x-large;
            padding: 10px;
        }

        td:hover {
            background-color: #6E6666;
        }
    </style>
</head>

<body>

    <?php
    // Connect to database
    $localhost = 'localhost';
    $db = 'netland';
    $user = 'bit_academy';
    $pass = 'bit_academy';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$localhost;dbname=$db;charset=$charset";

    try {
        $pdo = new PDO($dsn, $user, $pass);
    } catch (\PDOException $e) {
        echo 'Error connecting to database on line: ' . $e->getMessage();
    }

    // Get the column to sort by and the sort order
    $sort = $_GET['sort'] ?? 'title';
    $sort2 = $_GET['sort2'] ?? 'title';
    $order = $_GET['order'] ?? 'asc';
    $order2 = $_GET['order2'] ?? 'asc';


    // Get the data from the database and sort it
    $stmt = $pdo->prepare("SELECT * FROM media WHERE type = 'series' ORDER BY $sort $order");
    $stmt->execute();
    $series_array = $stmt->fetchAll(PDO::FETCH_OBJ);

    $stmt = $pdo->prepare("SELECT * FROM media WHERE type = 'movie' ORDER BY $sort2 $order2");
    $stmt->execute();
    $movies_array = $stmt->fetchAll(PDO::FETCH_OBJ);

    // Helper function to get the opposite sort order
    function getOppositeOrder($order)
    {
        return $order === 'asc' ? 'desc' : 'asc';
    }

    function getOppositeOrder2($order2)
    {
        return $order2 === 'asc' ? 'desc' : 'asc';
    }

    function echoSeries($series_array)
    {
        foreach ($series_array as $key) {
            echo '<tr>';
            echo '<td>' . $key->title . '</td>';
            echo '<td>' . $key->rating . '</td>';
            echo '<td>' . "<a href='detail.php?id=$key->id'>Details</a>" . '</td>';
            echo '</tr>';
        }
    }

    function echoMovies($movies_array)
    {
        foreach ($movies_array as $key) {
            echo    '<tr>';
            echo    '<td>' . $key->title . '</td>';
            echo    '<td>' . $key->length_in_minutes . '</td>';
            echo    '<td>' . "<a href='detail.php?id=$key->id'>Details</a>" . '</td>';
            echo    '</tr>';
        }
    }

    ?>

    <h1>Welkom op het Netland beheerders paneel</h1>


    <!-- Series table -->
    <table>
        <h3>Series</h3>
        <tr>
            <div class="add">
                <p><a href='insert.php'>Add</a></p>
            </div>
            <th class="sortable <?php if ($sort === 'title') {
                                    echo "sorted-$order";
                                } ?>">
                <a href="?sort=title&order=<?php echo getOppositeOrder($order); ?>">Titel</a>
            </th>
            <th class="sortable <?php if ($sort === 'rating') {
                                    echo "sorted-$order";
                                } ?>">
                <a href="?sort=rating&order=<?php echo getOppositeOrder($order); ?>">Rating</a>
            </th>
            <?php echoSeries($series_array); ?>
        </tr>
    </table>

    <!-- Films table -->
    <table>
        <h3>Films</h3>
        <tr>
            <div class="add">
                <p><a href='insert.php'>Add</a></p>
            </div>
            <th class="sortable <?php if ($sort2 === 'title') {
                                    echo "sorted-$order2";
                                } ?>">
                <a href="?sort2=title&order2=<?php echo getOppositeOrder2($order2); ?>">Titel</a>
            </th>
            <th class="sortable <?php if ($sort2 === 'length_in_minutes') {
                                    echo "sorted-$order2";
                                } ?>">
                <a href="?sort2=length_in_minutes&order2=<?php echo getOppositeOrder2($order2); ?>">Duur</a>
            </th>

            <?php echoMovies($movies_array); ?>
        </tr>
    </table>