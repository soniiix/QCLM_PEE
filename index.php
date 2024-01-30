<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('include/head.php'); ?>
</head>
<body>
    <?php
        include('include/headers.php');
        $lesProduits = getReponseByIdUser($bdd, 1);

        var_dump($lesProduits);
    ?>
</body>
</html>

