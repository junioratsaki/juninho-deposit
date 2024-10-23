<?php
    session_start();
    require '../traitement/db.php';

    // Création d'une discussion ou récupération de l'existante
    $id_utilisateur1 = 1; // id de l'expéditeur
    $id_utilisateur2 = 2; // id du destinataire
    $id_discussion CreateDiscussion(id_utilisateur1, id_utilisateur2, $conn);

    //Envoi d'un message
    sendMessage($id_discussion, $id_utilisateur1, "Salut, comment ça va ?", $mysqli);

    //récupération des messages
    $messages = getMessages($id_discussion, $mysqli);
    foreach($messages a $message){
        echo "Message :  "
        $message['contenu']." - Envoyé par l'utilisateur " $message['is_destinataire']. "<br>"
    }
?>