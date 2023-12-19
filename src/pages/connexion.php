<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion ENT</title>
</head>

<body>
    <section id="connexion">
        <header>
            <h1>ENT Université Gustave Eiffel</h1>
            <img src="" alt="">
        </header>
    <?php
    // $new_psswrd=password_hash("admin",PASSWORD_DEFAULT);
    // echo $new_psswrd;


    ?>
    <div>
        <p>Lorem ipsum dolor sit amet consectetur. Consequat pharetra diam pellentesque mi et sed potenti pulvinar vitae. 
Et scelerisque congue at vel cursus tempor id faucibus molestie. Vitae consectetur adipiscing turpis eleifend id at arcu urna. Ipsum nisl euismod aliquam congue lacus semper pharetra ornare aliquam.</p>

        <?php
            if(isset($_GET["err"])){
                echo "<span>Identifiant / mot de passe incorrect</span>";
            }
        ?>
        <form action="./src/scripts/login.php">
            <div>
                <label for="login">Identifiant</label>
                <input type="text" name="login" id="login" required>
            </div>
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>
            </div>
                <input type="submit" value="Connexion" id="btn_connexion">
        </form>
    </div>
</section>
</body>
</html>