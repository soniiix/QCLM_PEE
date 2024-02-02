<?php

include('questionnaire-debut.php');

$activeJardin = "active";

$lesProduits = getProduitByType($bdd, "Mon balcon/mon jardin");

include('questionnaire-fin.php');