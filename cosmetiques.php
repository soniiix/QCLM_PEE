<?php

include('questionnaire-debut.php');

$activeCosmetiques = "active";

$lesProduits = getProduitByType($bdd, "Cosmétiques et produits hygiène");

include('questionnaire-fin.php');