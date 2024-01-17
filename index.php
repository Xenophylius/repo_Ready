<?php
session_start();
    if (!empty($_SESSION["pseudo"]) && !empty($_SESSION["mail"])) {
        header('Location: quizz.php');
    } else {
    require_once './partials/header.php';
?>

<div class="main">
        <h1 class="text-warning text-center mt-2">LE CHAT</h1>
        <div class="rounded-3 m-3 p-3 ">
            <div class="row text-center">
                <div class="col-12 col-md-5 rounded-3 mx-auto bg-second">
                    <h2 class="rounded-3 mx-auto my-2 text-warning">Inscription</h2>
                    <form action="register.php" method="post">
                        <div class="form-floating mb-3 text-dark">
                            <input type="text" class="form-control " id="pseudo" placeholder="Pseudo" name="pseudo">
                            <label for="pseudo">Pseudo</label>
                        </div>
                        <div class="form-floating mb-3 text-dark">
                            <input type="email" class="form-control " id="mail" placeholder="name@example.com" name="mail">
                            <label for="mail">Adresse mail</label>
                        </div>
                        <div class="form-floating text-dark">
                            <input type="password" class="form-control " id="password" placeholder="Password" name="password">
                            <label for="password">Mot de passe</label>
                        </div>
                        <button type="submit" class="btn btn-warning my-3"><i class="fa-solid fa-user-plus fa-sm mx-2" style="color: #2e3f5c;"></i>Inscription</button>
                    </form>
                </div>
                <div class="col-12 col-md-5 rounded-3 mx-auto bg-second my-4 my-md-auto ">
                    <h2 class="rounded-3 m-2 mx-auto text-warning ">Connexion</h2>
                    <form action="login.php" method="post">
                        <div class="form-floating mb-3 text-dark">
                            <input type="email" class="form-control " id="mail" placeholder="name@example.com" name="mail">
                            <label for="mail">Adresse mail</label>
                        </div>
                        <div class="form-floating text-dark">
                            <input type="password" class="form-control " id="password" placeholder="Password" name="password">
                            <label for="password">Mot de passe</label>
                        </div>
                        <button type="submit" class="btn btn-warning my-3"><i class="fa-solid fa-user fa-sm mx-2" style="color: #2e3f5c;"></i>Connexion</button>
                    </form>
                </div>
            </div>
        </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="app.js"></script>
    </body>

    </html>

<?php } ?>