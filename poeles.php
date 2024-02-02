<?php

include('questionnaire-debut.php');

$activePoeles = "active";

$lesProduits = getProduitByType($bdd, "Poêles antiadhésives");

include('questionnaire-fin.php');