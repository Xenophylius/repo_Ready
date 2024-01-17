<?php
session_start();
if (
    empty($_SESSION['id']) &&
    empty($_SESSION['pseudo']) &&
    empty($_SESSION['mail'])
) {
    header('Location: index.php');
} else {
    include_once './partials/header.php';
    require_once 'connexion.php';
    $id_user = $_SESSION['id'];

    $trophees = $db->query("SELECT * FROM score INNER JOIN user ON score.id_user = user.id ORDER BY score DESC, date_score ASC");
    $bestTrophees = $trophees->fetchAll();
    include './functions/utility.php';

?>
    
    <div class="container-fluid text-center my-3 h-50">
        <h1>PODIUM</h1>
        <div class="row justify-content-center align-items-end mx-1 my-3">
            <div class="col-2 bg-secondary" id="podium2">
                <h2><?= ucfirst($bestTrophees[1]['nickname']) ?></h2>
                <p><h3 class="text-dark">SCORE : <?= $bestTrophees[1]['score'] ?> </h3></p>
                <p><i class="text-light">DATE : <?= $bestTrophees[1]['date_score'] ?></i></p>
                <i class="fa-solid fa-award fa-bounce fa-2xl" style="color: #000000;"></i>
            </div>
            <div class="col-2 bg-warning " id="podium1">
                <h2><?= ucfirst($bestTrophees[0]['nickname']) ?></h2>
                <p><h3 class="text-dark">SCORE : <?= $bestTrophees[0]['score'] ?> </h3></p>
                <p><i class="text-light">DATE : <?= $bestTrophees[0]['date_score'] ?></i></p>
                <i class="fa-solid fa-medal fa-bounce fa-2xl" style="color: #000000;"></i>
            </div>
            <div class="col-2" id="podium3">
                <h2><?= ucfirst($bestTrophees[2]['nickname']) ?></h2>
                <p><h3 class="text-dark">SCORE : <?= $bestTrophees[2]['score'] ?> </h3></p>
                <p><i class="text-light">DATE : <?= $bestTrophees[2]['date_score'] ?></i></p>
                <i class="fa-solid fa-award fa-bounce fa-2xl" style="color: #000000;"></i>
            </div>
        </div>
    <div class="row-fluid">
        <h1 class="text-success">TABLEAU DES SCORES</h1>


        <?php foreach ($bestTrophees as $key => $value) {
        ?>
            <div class="border border-light col-12">
                <h3 class="text-warning">SCORE : <?= $bestTrophees[$key]['score'] ?> </h3>
                <h5 class="text-success">PSEUDO : <?= ucfirst($bestTrophees[$key]['nickname']) ?> </h5>
                <i class="text-light">DATE : <?= $bestTrophees[$key]['date_score'] ?></i>
            </div>

        <?php  } ?>
    </div> </div> <?php

            include_once './partials/footer.php';
        }
            ?>