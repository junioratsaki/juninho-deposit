<?php
    session_start();
    require '../traitement/db.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['name'], $_POST['surname'], $_POST['password'])) {
    
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $password = $_POST['password'];
    
            $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE name = ? AND password = ?");
            $stmt->bind_param('ss', $name, $password);
            $stmt->execute();
            $result = $stmt->get_result();
    
                if ($result->num_rows === 1) {
                    $user = $result->fetch_assoc();
                    
                    $_SESSION['id_utilisateur'] = $user['id_utilisateur'];
                    setcookie('id', $user['id_utilisateur'], time() + (86400 * 30), "/");
    
                    echo "
                        <script>
                        window.location.href='acceuil.php';
                        </script>
                    ";
                } else {
                    echo "
                        <script>
                        alert('Nom ou mot de passe incorrect.');
                        window.location.href='connexion.php';
                        </script>
                    ";
                    }
    
            $stmt->close();
        }
    }
    $conn->close();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container">
        <form action="" method="post" class="form">
            <h1>Se connecter</h1>
            <label for="name">Entrez votre nom</label>
            <input type="text" id="name" name="name" placeholder="Nom" required><br><br>
            <label for="surname">Entrez votre prénom</label>
            <input type="text" id="surname" name="surname" placeholder="Prénom" required><br><br>
            <label for="password">Entrez votre mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Mot de passe" required><br><br>
            <button type="submit">S'inscrire</button>
            <p>Vous n'avez pas encore de compte ? <a href="index.php">Inscrivez-vous</a></p>
        </form>
    </div>
</body>
</html>