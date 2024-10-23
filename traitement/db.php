<?php
// Informations de connexion à la base de données
$host = 'localhost'; // Adresse du serveur (généralement localhost)
$user = 'root'; // Nom d'utilisateur de la base de données
$password = ''; // Mot de passe de la base de données
$dbname = 'reseau'; // Nom de la base de données

// Création de la connexion
$conn = new mysqli($host, $user, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
?>