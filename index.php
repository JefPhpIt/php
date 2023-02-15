<?php

$names = [
    'jef' => 'De conti',
    'yoann' => 'dufour',
    'matthieu' => 'chabot'
];

$videoGames = ['MW2', 'God of wars', 'Super Mario Bros', 'Sonic', 'GTA V', 'Fifa 23', 'Street Fighter 2', 'Mario Kart 8', 'Uncharted 4', 'Worms', 'Tetris'];

$users = [];
$i = 0;
foreach ($names as $lastName => $firstName) {
    $users[$i]['lastName'] = $lastName;
    $users[$i]['firstName'] = $firstName;
    $randomNumber = random_int(1, 10);

    for ($y = 0; $y < $randomNumber; $y++) {
        $keyVideoGames =array_rand($videoGames);
        $users[$i]['videoGames'][$y]['name'] = $videoGames[$keyVideoGames];
        $users[$i]['videoGames'][$y]['hour'] = $keyVideoGames;
    }
    $i++;
}

//echo '<pre>';
//print_r($users);
//echo '</pre>';
//die();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row mt-5">
        <div class="col-12">
            <h1>Liste des utilisateurs</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <form action="result.php" method="post">
                    <form>
                        <div class="mb-3">
                            <label for="search" class="form-label">Rechercher un utilisateur</label>
                            <input type="text" class="form-control" name="search" id="search">
                        </div>
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </form>
                </form>
            </div>
        </div>
        <div class="row mt-3">
            <?php
            foreach ($users as $user) {
                ?>
                <div class="col-sm-12 col-md-4">
                    <div class="card text-center">
                        <div class="card-header">
                            <?= ucfirst($user['lastName']) . ' ' . strtoupper($user['firstName']) ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Lise des jeux vidéos</h5>
                            <?php
                            $totalHour = 0;
                            foreach ($user['videoGames'] as $videoGame) {
                                echo '<p>' . $videoGame['name'] . ' = ' .$videoGame['hour'] . 'h</p>';
                                $totalHour = $totalHour + $videoGame['hour'];
                            }
                            ?>
                        </div>
                        <div class="card-footer text-muted">
                            <?=  'Total d\'heure de jeux : ' . $totalHour . 'h' ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>