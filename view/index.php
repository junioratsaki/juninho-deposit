<?php
session_start();
require "../traitement/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}
    // Hachage du mot de passe
    $password_hache = password_hash($password, PASSWORD_DEFAULT);

    // Insertion des données dans la base de données
if(isset($_POST['name']) AND isset($_POST['surname']) AND isset($_POST['email']) AND isset($_POST['password'])){
    $sql = "INSERT INTO utilisateurs (name, surname, email, password) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss",$name, $surname, $email, $password,);
    $stmt->store_result();
    $stmt->execute();
    echo "
        <script>
            alert('Utilisateur enregistré avec succès !');
            window.location.href='acceuil.php';
        </script>
    ";
} else {
    echo "
        <script>
            window.location.href='index.php';
        </script>
            ";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h1>Inscrivez-vous</h1>
            <div class="form-group"> 
                <label for="photo">Photo de profil</label>  
                <input type="file" id="photo" name="photo" accept="image/*"> 
                <div class="photo-frame">
                    <img id="photoPreview" src="" alt="photo 4x4">  
                </div>  
            </div>
            <label for="name">Entrez votre nom</label>
            <input type="text" id="name" name="name" placeholder="Nom" required><br><br>
            <label for="surname">Entrez votre prénom</label>
            <input type="text" id="surname" name="surname" placeholder="Prénom" required><br><br>
            <label for="email">Entrez votre adresse email</label>
            <input type="email" id="email" name="email" placeholder="Adresse email" required><br><br>
            <label for="password">Entrez votre mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Mot de passe" required><br><br>
            <button type="submit">S'inscrire</button>
            <p>Vous avez déjà un compte ? <a href="connexion.php">Connectez-vous</a></p>
        </form>
    </div>
    <script src="../assets/script.js"></script>
</body>
</html>