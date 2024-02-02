<?php

include('../include/questionnaire-debut.php');

$activeVetements = "active";

$lesProduits = getProduitByType($bdd, "Vêtements de sports");

include('../include/questionnaire-fin.php');