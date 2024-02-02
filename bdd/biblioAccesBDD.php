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