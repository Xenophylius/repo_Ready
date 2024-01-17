<?php
session_start();
if (empty($_SESSION['id']) &&
    empty($_SESSION['pseudo']) &&
    empty($_SESSION['mail'])) {
        header('Location: index.php');
} else {
    include_once './partials/header.php';
    require_once 'connexion.php';
    $id_user = $_SESSION['id'];

    $profil = $db->query("SELECT * FROM score WHERE id_user=$id_user ORDER BY score DESC");
    $score = $profil->fetchAll(); ?>
    <div class="container-fluid text-center">
    <h1 class="text-success">VOS SCORES</h1> 

   <?php foreach($score as $key => $value) {     
    ?>
        <div class="border border-light">
            <h3 class="text-warning">SCORE : <?= $score[$key]['score'] ?></h3>
            <i class="text-light">DATE : <?= $score[$key]['date_score'] ?></i>
        </div>
        
   <?php  } ?> 
   </div> <?php

    include_once './partials/footer.php';
} 
?>