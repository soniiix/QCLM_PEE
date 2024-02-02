<?php

include('questionnaire-debut.php');

$activeMenagers = "active";

$lesProduits = getProduitByType($bdd, "Produits ménagers");

include('questionnaire-fin.php');