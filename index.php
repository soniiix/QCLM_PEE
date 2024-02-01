<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('include/head.php'); ?>
</head>
<body>
    <?php
        include('include/headers.php');
        $lesProduits = getReponseByIdUser($bdd, 1);

        foreach($lesProduits as $unProduit) {
            var_dump($unProduit["emballagePEE"]);
            var_dump($unProduit);
        }
    ?>
</body>
</html>

