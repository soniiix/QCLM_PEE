<?php

include('../include/questionnaire-debut.php');

$activePoeles = "active";

$lesProduits = getProduitByType($bdd, "Poêles antiadhésives");

include('../include/questionnaire-fin.php');