<?php

function seConnecter()
{
   $serveur = 'mysql:host=localhost;port=3306';
   $bdd = 'dbname=perturbateurs';
   $user = 'root';
   $mdp = '';

   try {
      $pdo = new PDO($serveur . ';' . $bdd . ';charset=UTF8', $user, $mdp);
   } catch (PDOException $e) {
      echo ('Erreur : ' . $e->getMessage());
   }
   return $pdo;
}

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
    $res->bindParam(":dateModif", date('Y-m-d h:i:s', time()));
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
    $res->bindParam(":dateModif", date('Y-m-d h:i:s', time()));
    $res->execute();
}

