<?php

include('../include/questionnaire-debut.php');

$activeMenagers = "active";

$lesProduits = getProduitByType($bdd, "Produits ménagers");

include('../include/questionnaire-fin.php');