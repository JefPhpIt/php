<?php
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
<?php

if (!isset($_POST['search']) or empty($_POST['search'])) {
    ?>
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="alert alert-danger" role="alert">
                Champ obligatoire
            </div>
        </div>
    </div>
<?php
    return;
}

    function addColor($hour): string
    {
        $color = '';
        if ($hour >= 100) {
            $color = '#f50f0f';
        } elseif ($hour >= 50) {
            $color = '#f57e0f';
        } else {
            $color = '#45f50f';
        }

        return $color;
    }

    // Create array users
    $names = [
        'jef' => 'De conti',
        'yoann' => 'dufour',
        'matthieu' => 'chabot'
    ];

    $videoGames = ['MW2', 'God of wars', 'Super Mario Bros', 'Sonic', 'GTA V', 'Fifa 23', 'Street Fighter 2', 'Mario Kart 8', 'Uncharted 4', 'Worms', 'Tetris', 'Pong'];

    $users = [];
    $i = 0;
    foreach ($names as $lastName => $firstName) {
        $users[$i]['lastName'] = $lastName;
        $users[$i]['firstName'] = $firstName;
        $randomNumber = random_int(1, 10);

        for ($y = 0; $y < $randomNumber; $y++) {
            $keyVideoGames =array_rand($videoGames);
            $users[$i]['videoGames'][$y]['name'] = $videoGames[$keyVideoGames];
            $users[$i]['videoGames'][$y]['hour'] = $keyVideoGames * 10;
        }
        $i++;
    }
    // End create array users

    // Search user in array
    $search = strtolower($_POST['search']);
    $userExist = false;
    $user = '';

    foreach ($users as $value) {
        if(in_array($search, $value)) {
            $userExist = true;
            $user = $value;
        }
}
    if ($userExist === true) {
        ?>
        <div class="row justify-content-center mt-5">
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
                            echo '<p>' . $videoGame['name'] . ' = <span style="color:'. addColor($videoGame['hour']) . ' ">' . $videoGame['hour'] . 'h</span></p>';
                            $totalHour = $totalHour + $videoGame['hour'];
                        }
                        ?>
                    </div>
                    <div class="card-footer text-muted">
                        <?=  'Total d\'heure de jeux : <span style="color: ' . addColor($totalHour) . '">' . $totalHour . 'h</span>' ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="alert alert-danger" role="alert">
                    Utilisateur introuvable !
                </div>
            </div>
        </div>
    <?php
    }
?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>

