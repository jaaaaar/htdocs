
<?php
$pildid = array("pildid/b17.jpg", "pildid/b10.jpg", "pildid/b4.jpg", "pildid/b7.jpg", "pildid/b18.jpg");
$pilt = $pildid[array_rand($pildid)];
?>
<!doctype html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontrolltöö</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .pilt1 {
            background-image: url(pildid/b17.jpg);
            background-size: cover;
        }
        .pilt2 {
            background-image: url(pildid/b10.jpg);
            background-size: cover;
        }
    </style>
  </head>

<body>
        <div class="container">

            <nav class="navbar navbar-expand-lg text-secondary">
                <div class="container-fluid">

                    <a class="navbar-brand p-2" href="#">raltmae.com</a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php">Avaleht</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?leht=pood.php">Pood</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?leht=kontakt.php">Kontakt</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="admin.php">Admin</a>
                            </li>
                            <li class="nav-item text-center mt-2">
                                <i class="bi bi-bag"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
<?php
    if (!empty($_GET['leht'])) {
        $leht = htmlspecialchars($_GET['leht']);
        $lubatud = array('kontakt', 'admin','pood');
        $kontroll = in_array($leht, $lubatud);
        if ($kontroll == true) {
            include($leht . '.php');
        } else {
            echo '<h1 class="text-center mt-4">Lehte ei eksisteeri!</h1>';
        }
    } else {
        ?>
            <?php

            $tekstid = array("parim pakkumine <br>osta 1 saad 1", "kevad/suvi <br>kõik rohelised");
            $tekst = $tekstid[array_rand($tekstid)];
            ?>
            <div class="container">
              <div class="row">
                <div class="col m-2 p-5 pilt1  text-white"> 
                  <h2><?php echo $tekst; ?></h2>
                    <p>parim kleidike sinu neiule ;D</p>
                    <button class="btn btn-outline-dark">Tutvu lähemalt</button>
                </div>
                 <div class="col m-2 p-5 pilt2 text-white">
                    <h2><?php echo $tekst; ?></h2>
                    <p>20% soodsamalt</p>
                    <button class="btn btn-outline-dark">Tutvu lähemalt</button>
                </div>
            </div>
        </div>
            </div>




        <div class="container">
            <div class="row text-center mt-5 mb-5">
                <h2>Parimad pakkumised</h2>
            </div>
            <div class="row">


                <?php
                if ($csv = fopen("tooted.csv", "r")) {
                    fgetcsv($csv);
                    while ($andmed = fgetcsv($csv)) {
                        echo "
                        <div class='col-md-3 mb-3'>
                            <div class='card'>
                                <img src='{$andmed[0]}' class='card-img-top' alt='{$andmed[1]}'>
                                <div class='card-body'>
                                    <h5 class='card-title'>{$andmed[1]}</h5>
                                    <p class='card-text text-success  '>{$andmed[2]}€</p>
                                </div>
                            </div>
                        </div>";
                    }
                    fclose($csv);
                }
                ?>
            </div>
        </div>


        <?php
    }
    ?>

    <footer class="bg-dark py-5 mt-5">
        <div class="container text-light text-center">
            <p>raltmae.com</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>