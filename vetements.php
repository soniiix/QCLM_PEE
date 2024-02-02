<?php

include('questionnaire-debut.php');

$activeVetements = "active";

$lesProduits = getProduitByType($bdd, "Vêtements de sports");

include('questionnaire-fin.php');