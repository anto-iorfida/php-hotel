<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];



?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <!-- <?php
            foreach ($hotels as $hotel) {
                echo "<div>";
                echo "<h2>" . $hotel['name'] . "</h2>";
                echo "<p>" . $hotel['description'] . "</p>";
                echo "<ul>";
                // if ($hotel['parking']) {
                //     echo "<li>Parcheggio disponibile</li>";
                // } else {
                //     echo "<li>Nessun parcheggio</li>";
                // }
                echo "<li>" . ($hotel['parking'] ? "Parcheggio disponibile" :  "Nessun parcheggio") . "</li>";
                echo "<li>Voto: " . $hotel['vote'] . "</li>";
                echo "<li>Distanza dal centro: " . $hotel['distance_to_center'] . " km</li>";
                echo "</ul>";
                echo "</div>";
            }
            ?> -->

    <div class="container mt-4">
        <form action="" method="GET">
            <div class="form-row mb-3">
                <div class="col">
                    <label for="parking">Filtra per parcheggio:</label>
                    <select class="form-control" name="parking" id="parking">
                        <option value="">Tutti gli hotel</option>
                        <option value="true">Con parcheggio</option>
                        <option value="false">Senza parcheggio</option>
                    </select>
                </div>
                <div class="col mt-4">
                    <label for="vote">Filtra per voto (da 1 a 5):</label>
                    <input type="number" class="form-control" name="vote" id="vote" min="1" max="5"  placeholder="Inserisci il voto">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary mt-4">Filtra</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered border-primary">
            <thead>
                <tr class="table-primary">
                    <th scope="col">Nome HOTEL</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Parcheggio</th>
                    <th scope="col">Voto</th>
                    <th scope="col">Distanza Centro</th>
                </tr>
            </thead>
            <tbody>
                <?php


                // verificare se sono presenti parametri nella richiesta get
                $selectedParking = isset($_GET['parking']) ? $_GET['parking'] : '';
                $selectedVote = isset($_GET['vote']) ? $_GET['vote'] : '';

                // filtraree gli hotel in base ai parametri 
                $filterHotels = [];
                foreach ($hotels as $hotel) {
                    if (($selectedParking === '' || ($selectedParking === 'true' && $hotel['parking']) || ($selectedParking === 'false' && !$hotel['parking'])) &&
                        ($selectedVote === '' || $hotel['vote'] >= $selectedVote)
                    ) {
                        $filterHotels[] = $hotel;
                    }
                }

                // tabella degli hotel 
                foreach ($filterHotels as $hotel) {
                    echo "<tr>";
                    echo "<th>" . $hotel['name'] . "</th>";
                    echo "<td>" . $hotel['description'] . "</td>";
                    echo "<td>" . ($hotel['parking'] ? "Parcheggio disponibile" :  "Nessun parcheggio") . "</td>";
                    echo "<td>" . $hotel['vote'] . "</td>";
                    echo "<td>Distanza dal centro: " . $hotel['distance_to_center'] . " km</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>