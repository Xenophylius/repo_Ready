<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZZ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg text-light">
  <div class="container-fluid text-light">
    <a class="navbar-brand text-light" href="quizz.php">QUIZZ</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="trophees.php"><i class="fa-solid fa-trophy fa-beat-fade fa-lg mx-2" style="color: #FFD43B;"></i>TROPHEES</a>
        </li>
        <li class="nav-item position-absolute top-1 end-0">
        <?php
            if (empty($_SESSION["pseudo"]) && empty($_SESSION["mail"])) { ?>

                <a class="nav-link active text-light " aria-current="page" href="index.php"><i class="fa-solid fa-user-plus fa-beat-fade fa-lg" style="color: #2e3f5c;"></i>      Inscription/Connexion</a>
                
            </div>
            </div>
        </div>
        </nav> 
                
            <?php } else { ?>
                <a class="nav-link text-light" href="dashboard.php"><i class="fa-solid fa-user fa-fade fa-lg mx-2" style="color: #009B4D;"></i><?= ucfirst($_SESSION['pseudo']) ?></a>
            <?php } ?>
            </li>
    </div>
  </div>
</nav>
<?php include './partials/message.php' ?>