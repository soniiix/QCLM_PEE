<?php

function getLesProduits($bdd) {
    $req = "SELECT * FROM produits;";
    $res = $bdd->prepare($req);
    $res->execute();
    $lesProduits = $res->fetchAll();
    return $lesProduits;
}

function getProduitByType($bdd, $type) {
    $req = "SELECT * FROM produits WHERE produits.typeProduit = :type;";
    $res = $bdd->prepare($req);
    $res->bindParam(":type", $type);
    $res->execute();
    $lesProduits = $res->fetchAll();
    return $lesProduits;
}

function getReponseByIdUser($bdd, $idUser) {
    $req = "SELECT * FROM questionnaire WHERE idUser = :idUser;";
    $res = $bdd->prepare($req);
    $res->bindParam(":idUser", $idUser);
    $res->execute();
    $lesReponses = $res->fetchAll();
    return $lesReponses;
}

function updateReponse($bdd, $idUser, $idProduit, $marqueProduit, $pictoEmballage, $emballagePEE, $packagingTrompeur, $ingredientPEE, $ecolabel, $scannerAvec) {
    $req = "UPDATE questionnaire 
    SET  marqueProduit = :marqueProduit, pictoEmballage = :pictoEmballage, emballagePEE = :emballagePEE, packagingTrompeur = :packagingTrompeur, ingredientPEE = :ingredientPEE, ecolabel = :ecolabel, scannerAvec = :scannerAvec, dateModif = :dateModif
    WHERE :idUser = idUser AND :idProduit = idProduit;";
    $res = $bdd->prepare($req);
    $res->bindParam(":idUser", $idUser);
    $res->bindParam(":idProduit", $idProduit);
    $res->bindParam(":marqueProduit", $marqueProduit);
    $res->bindParam(":pictoEmballage", $pictoEmballage);
    $res->bindParam(":emballagePEE", $emballagePEE);
    $res->bindParam(":packagingTrompeur", $packagingTrompeur);
    $res->bindParam(":ingredientPEE", $ingredientPEE);
    $res->bindParam(":ecolabel", $ecolabel);
    $res->bindParam(":scannerAvec", $scannerAvec);
    //c'est ici que l'on peut modifier le format de la date de modif (voir plus bas également)
    $res->bindParam(":dateModif", date('Y-m-d H:i:s', time()));
    $res->execute();
}

function addReponse($bdd, $idUser, $idProduit, $marqueProduit, $pictoEmballage, $emballagePEE, $packagingTrompeur, $ingredientPEE, $ecolabel, $scannerAvec){
    $req = "INSERT INTO questionnaire(idUser, idProduit, marqueProduit, pictoEmballage, emballagePEE, packagingTrompeur, ingredientPEE, ecolabel, scannerAvec, dateModif)
    VALUES(:idUser, :idProduit, :marqueProduit, :pictoEmballage, :emballagePEE, :packagingTrompeur, :ingredientPEE, :ecolabel, :scannerAvec, :dateModif);";
    $res = $bdd->prepare($req);
    $res->bindParam(":idUser", $idUser);
    $res->bindParam(":idProduit", $idProduit);
    $res->bindParam(":marqueProduit", $marqueProduit);
    $res->bindParam(":pictoEmballage", $pictoEmballage);
    $res->bindParam(":emballagePEE", $emballagePEE);
    $res->bindParam(":packagingTrompeur", $packagingTrompeur);
    $res->bindParam(":ingredientPEE", $ingredientPEE);
    $res->bindParam(":ecolabel", $ecolabel);
    $res->bindParam(":scannerAvec", $scannerAvec);
    //c'est ici que l'on peut modifier le format de la date de modif
    $res->bindParam(":dateModif", date('Y-m-d H:i:s', time()));
    $res->execute();
}

function getLesUsers($bdd){
    $req = "SELECT * FROM users";
    $res = $bdd->prepare($req);
    $res->execute();
    $lesUsers = $res->fetchAll();
    return $lesUsers;
}

function addUser($bdd, $id, $nom, $prenom){
    $lesUsers = getLesUsers($bdd);
    foreach($lesUsers as $unUser){
        if ($unUser['id'] == $id){
            return ;
        }
    }
    $req = "INSERT INTO users(id, nom, prenom)
    VALUES(:id, :nom, :prenom);";
    $res = $bdd->prepare($req);
    $res->bindParam(":id", $id);
    $res->bindParam(":nom", $nom);
    $res->bindParam(":prenom", $prenom);
    $res->execute();
}

function getReponsesByDate($bdd, $dateDebut, $dateFin){
    $req = "SELECT users.nom, users.prenom, produits.typeProduit, produits.nomProduit, questionnaire.marqueProduit, questionnaire.pictoEmballage, questionnaire.emballagePEE, questionnaire.packagingTrompeur, questionnaire.ingredientPEE, questionnaire.ecolabel, questionnaire.scannerAvec, questionnaire.dateModif
    FROM questionnaire
    INNER JOIN produits ON questionnaire.idProduit = produits.id
    INNER JOIN users ON questionnaire.idUser = users.id
    WHERE dateModif BETWEEN :dateDebut AND :dateFin;
    ORDER BY users.nom, users.prenom;";
    $res = $bdd->prepare($req);
    $res->bindParam(":dateDebut", $dateDebut);
    $res->bindParam(":dateFin", $dateFin);
    $res->execute();
    $lesReponses = $res->fetchAll();
    return $lesReponses;
}


function getAllReponses($bdd) {
    $req = "SELECT users.nom, users.prenom, produits.typeProduit, produits.nomProduit, questionnaire.marqueProduit, questionnaire.pictoEmballage, questionnaire.emballagePEE, questionnaire.packagingTrompeur, questionnaire.ingredientPEE, questionnaire.ecolabel, questionnaire.scannerAvec, questionnaire.dateModif
    FROM questionnaire
    INNER JOIN produits ON questionnaire.idProduit = produits.id
    INNER JOIN users ON questionnaire.idUser = users.id
    ORDER BY users.nom, users.prenom;";
    $res = $bdd->prepare($req);
    $res->execute();
    $lesReponses = $res->fetchAll();
    return $lesReponses;
}

function checkIfUserExists($bdd, $idUser){
    $req = "SELECT * FROM users WHERE id = :idUser";
    $res = $bdd->prepare($req);
    $res->bindParam(":idUser", $idUser);
    $res->execute();
    $leUser = $res->fetch();
    return (is_null($leUser))?(false):(true);
}