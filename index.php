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

$has_filter = !empty($_GET);
$parking_only = $_GET["parking"] ?? false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"
        defer></script>
</head>

<body>
    <div class="container my-5">
        <!-- form -->
        <h3>Filters</h3>
        <form method="GET">
            <!-- parking select -->
            <div>
                <label for="parking">Parking only:</label>
                <select name="parking" id="parking">
                    <option value="" selected>Select...</option>
                    <option value="true">Yes</option>
                </select>
            </div>

            <!-- submit button -->
            <button class="my-3" type="submit">Filter</button>
        </form>

        <!-- table -->
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to center</th>
                </tr>
            </thead>
            <!-- body -->
            <tbody>
                <?php foreach ($hotels as $hotel): ?>
                    <!-- IF NO FILTER -->
                    <?php if (!$has_filter): ?>
                        <!-- t-row -->
                        <tr>
                            <?php foreach ($hotel as $key => $value): ?>
                                <!-- t-data -->
                                <td>
                                    <?php
                                    if ($key == "parking" && $value == true) {
                                        $value = "Yes";
                                    } else if ($key == "parking" && $value == false) {
                                        $value = "No";
                                    }
                                    echo $value ?>
                                </td>
                            <? endforeach; ?>
                        </tr>


                        <!-- ELSE PARKING ONLY -->
                    <?php elseif ($parking_only): ?>
                        <!-- t-row -->
                        <tr>
                            <?php foreach ($hotel as $key => $value): ?>
                                <?php if ($hotel["parking"] == true): ?>
                                    <!-- t-data -->
                                    <td>
                                        <?php
                                        if ($key == "parking" && $value == true) {
                                            $value = "Yes";
                                        } else if ($key == "parking" && $value == false) {
                                            $value = "No";
                                        }
                                        echo $value ?>
                                    </td>
                                <? endif; ?>
                            <? endforeach; ?>
                        </tr>
                    <? endif; ?>
                <? endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>