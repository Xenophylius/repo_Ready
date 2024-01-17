<?php
session_start();
if (empty($_SESSION['id']) &&
    empty($_SESSION['pseudo']) &&
    empty($_SESSION['mail'])) {
    header('Location: index.php');
} else {
    if(!empty($_SESSION['numberQuestion'])) {
        $_SESSION['numberQuestion'] = $_SESSION['numberQuestion'] + 1; 
        } else {
        $_SESSION['numberQuestion'] = 0;
        $_SESSION['numberQuestion'] = $_SESSION['numberQuestion'] + 1; 
        }

        if($_SESSION['numberQuestion'] > 10) {
            header('Location: validateAnswer.php');
        }
include_once './partials/header.php';
?>

    <div class="container-fluid text-center w-75 h-25 align-items-center">
    <img src="./img/—Pngtree—quiz time bubble speech banner_9147207.png" alt="Logo Quizz" id="logo" class="mx-auto">
    
        <div class="row h-50 text-center mb-5">
            <div class="col-12 w-100 border border-light border-3 rounded-2 py-3">
                
                <?php
                    require_once 'connexion.php';
                    $arrayQuestion = [];

                    
                    
                  

                    while (!$arrayQuestion) {
                    $numberQuestion = rand(1, 100);
                    $question = $db->prepare("SELECT * FROM question WHERE id=?");
                    $question->execute([$numberQuestion]);
                    $arrayQuestion = $question->fetch();
                    }

                    $response = $db->prepare("SELECT * FROM answer WHERE id_question=? ORDER BY content_answer DESC");
                    $response->execute([$numberQuestion]);
                    $arrayresponse = $response->fetchAll();
                    
                    echo '<i class="text-success">' . ucfirst($arrayQuestion['category']) . ' :  </i><br> ';
                    echo '<strong> ' . $arrayQuestion['content_question'] . '</strong>';
                     
                ?>
            </div>
        </div>
        
            <form action="validateAnswer.php" method="post">
                <div class="row h-50 align-items-center">
                    <button type="submit" name="response" value="<?= $arrayresponse[0]['good_answer'] ?>" class="col-12 col-lg-6 border border-light border-3 rounded-4 bg-transparent text-light my-3 " id="buttonHover"><?= $arrayresponse[0]['content_answer'] ?></button>
                    <button type="submit" name="response" value="<?= $arrayresponse[1]['good_answer'] ?>" class="col-12 col-lg-6 border border-light border-3 rounded-4 bg-transparent text-light my-3 " id="buttonHover"><?= $arrayresponse[1]['content_answer'] ?></button>
                    <button type="submit" name="response" value="<?= $arrayresponse[2]['good_answer'] ?>" class="col-12 col-lg-6 border border-light border-3 rounded-4 bg-transparent text-light my-3 " id="buttonHover"><?= $arrayresponse[2]['content_answer'] ?></button>
                    <button type="submit" name="response" value="<?= $arrayresponse[3]['good_answer'] ?>" class="col-12 col-lg-6 border border-light border-3 rounded-4 bg-transparent text-light my-3 " id="buttonHover"><?= $arrayresponse[3]['content_answer'] ?></button>
                </div>
            </form>
        
           <?php

?>
    </div>



<?php 

include_once './partials/footer.php';
}
?>