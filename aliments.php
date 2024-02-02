<?php

include('questionnaire-debut.php');

$activeAliments = "active";

$lesProduits = getProduitByType($bdd, "Aliments");

include('questionnaire-fin.php');