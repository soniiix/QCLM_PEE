<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('../include/head.php');
    session_start();

    $idUser = $_SESSION['userId'];

    $lesReponses = getReponseByIdUser($bdd, $idUser);

    if (isset($_POST['btn-submit']) || isset($_POST['btn-editClicked'])) {
        $lesLignes = $_POST;
        $i = 0;
        $exist = false;
        $success = '1';
        try {
            foreach ($lesLignes as $uneLigne) {
                $exist = false;
                foreach ($lesReponses as $uneReponse) {
                    if ($_POST['idProduit_' . $i] == $uneReponse['idProduit']) {
                        $exist = true;
                    }
                }
                if ($_POST['modified_' . $i] == true) {
                    if ($exist) {
                        updateReponse(
                            $bdd,
                            $idUser,
                            $_POST['idProduit_' . $i],
                            $_POST['marqueProduit_' . $i],
                            $_POST['pictoEmballage_' . $i],
                            $_POST['emballagePEE_' . $i],
                            $_POST['packagingTrompeur_' . $i],
                            $_POST['ingredientPEE_' . $i],
                            $_POST['ecolabel_' . $i],
                            $_POST['scannerAvec_' . $i]
                        );
                    } else {
                        addReponse(
                            $bdd,
                            $idUser,
                            $_POST['idProduit_' . $i],
                            $_POST['marqueProduit_' . $i],
                            $_POST['pictoEmballage_' . $i],
                            $_POST['emballagePEE_' . $i],
                            $_POST['packagingTrompeur_' . $i],
                            $_POST['ingredientPEE_' . $i],
                            $_POST['ecolabel_' . $i],
                            $_POST['scannerAvec_' . $i]
                        );
                    }
                }
                $i++;
            }
        } catch (Exception $e) {
            $success = '0';
        }
    }
    if (isset($_POST['btn-editClicked'])) {
        $url = $_POST['btn-editClicked'];
        header("Location: $url");
    } elseif (isset($_POST['btn-submit'])) {
        $url = $_SERVER['PHP_SELF'] . '?success=' . $success;
        header("Location: $url");
    }
    $lesReponses = getReponseByIdUser($bdd, $idUser);
    ?>
</head>

<body>
    <?php
    include('../include/loading.php');
