<?php
session_start();

    if (isset($_SESSION['score']) ) {
        if ($_SESSION['numberQuestion'] < 10) {
        $_SESSION['score'] = $_SESSION['score'] + $_POST['response'];
        
        header('Location: quizz.php');
        } else {
            $_SESSION['score'] = $_SESSION['score'] + $_POST['response'];
            require_once 'connexion.php';
            $score = $db->prepare("INSERT INTO score (id_user, score, date_score) VALUE (?,?, now())");
            $score->execute([
                $_SESSION['id'],
                $_SESSION['score']                
            ]);

            include_once './partials/header.php';
            
            ?>

            <section class="container-fluid w-50 h-50 text-center">
                <h1 class="text-warning">Votre score</h1>
                <h4><?= $_SESSION['score'] ?></h4>
                <h1 class="text-warning">Votre nombre de question</h1>
                <h4><?= $_SESSION['numberQuestion'] ?></h4>
            <div class="mt-3">
                <a href="quizz.php" class="btn btn-outline-secondary">TRY AGAIN</a>
                <a href="trophees.php" class="btn btn-outline-warning">TROPHEES</a>
                <a href="dashboard.php" class="btn btn-outline-success">VOTRE PROFIL</a>
            </div>
            </section>

            <?php
            unset($_SESSION['score'], $_SESSION['numberQuestion']);
            include_once './partials/footer.php';
        }
    } else {
        $_SESSION['score'] = 0;
        $_SESSION['score'] = $_SESSION['score'] + $_POST['response'];
        
        header('Location: quizz.php');
    } 

    
    

?>

