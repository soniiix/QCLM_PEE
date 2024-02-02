<?php

include('../include/questionnaire-debut.php');

$activeCosmetiques = "active";

$lesProduits = getProduitByType($bdd, "Cosmétiques et produits hygiène");

include('../include/questionnaire-fin.php');