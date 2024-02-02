<?php

include('../include/questionnaire-debut.php');

$activeJardin = "active";

$lesProduits = getProduitByType($bdd, "Mon balcon/mon jardin");

include('../include/questionnaire-fin.php');