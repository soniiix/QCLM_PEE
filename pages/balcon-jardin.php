<?php

include('../include/questionnaire-debut.php');

$activeBalconJardin = "active";

$lesProduits = getProduitByType($bdd, "Mon balcon/mon jardin");

include('../include/questionnaire-fin.php');