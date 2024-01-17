<?php
// Récupération du fichier avec URL
    $apiUrl = "https://quizzapi.jomoreschi.fr/api/v1/quiz?limit=100&category=actu_politique";
    $response = file_get_contents($apiUrl, False);
// Decodage du Json
    $data = json_decode($response);
// Récupération et fitre des données

for ($i = 0; $i <= 22; $i++) {
    $question = $data->quizzes[$i]->question;
    $category = $data->quizzes[$i]->category;
    $answer = $data->quizzes[$i]->answer;
    $badanswer = $data->quizzes[$i]->badAnswers[0];
    $badanswer1 = $data->quizzes[$i]->badAnswers[1];
    $badanswer2 = $data->quizzes[$i]->badAnswers[2];

// Injection SQL
    require_once 'connexion.php';
    
    $injectQuestion = $db->prepare("INSERT INTO question (content_question, category) VALUES ('$question', '$category')");
    $injectQuestion->execute();
    $id_Question = $db->lastInsertId();

    $injectGoodAnswer = $db->prepare("INSERT INTO answer (id_question, content_answer, good_answer) VALUES ('$id_Question', '$answer', 1)");
    $injectGoodAnswer->execute();
    
    $injectBadAnswer = $db->prepare("INSERT INTO answer (id_question, content_answer, good_answer) VALUES ('$id_Question', '$badanswer', 0)");
    $injectBadAnswer->execute();

    $injectBadAnswer1 = $db->prepare("INSERT INTO answer (id_question, content_answer, good_answer) VALUES ('$id_Question', '$badanswer1', 0)");
    $injectBadAnswer1->execute();

    $injectBadAnswer2 = $db->prepare("INSERT INTO answer (id_question, content_answer, good_answer) VALUES ('$id_Question', '$badanswer2', 0)");
    $injectBadAnswer2->execute();

    echo 'ALL GOOD' . $i;

}
?>