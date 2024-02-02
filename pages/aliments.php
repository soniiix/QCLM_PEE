<?php

include('../include/questionnaire-debut.php');

$activeAliments = "active";

$lesProduits = getProduitByType($bdd, "Aliments");

include('../include/questionnaire-fin.php');