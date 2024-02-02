<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('include/head.php');


    $lesReponses = getReponseByIdUser($bdd, 1);

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
                            1,
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
                            1,
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
        $url = 'aliments.php?success=' . $success;
        header("Location: $url");
    }
    $lesReponses = getReponseByIdUser($bdd, 1);
    ?>
</head>

<body>
    <?php
    include('include/loading.php');

    $activeAliments = "active";
    include('include/headers.php');
    $lesProduits = getProduitByType($bdd, "aliments"); ?>



    <form action="" method="post">
        <br>
        <?php if ($_GET['success'] == '1') { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Vos réponses ont bien été enregistrées.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } elseif ($_GET['success'] == '0') { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erreur !</strong> Vos réponses n'ont pas été enregistrées.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <table class="table table-striped table-hover align-middle">
            <thead class="align-middle">
                <tr>
                    <th scope="col" style="width: 11%">Produit&nbsp;:</th>
                    <th scope="col" style="width: 15%">Marque du produit&nbsp;:</th>
                    <th scope="col" style="width: 22%">Pictogrammes de l'emballage&nbsp;:</th>
                    <th scope="col" style="width: 10%">L'emballage a-t-il un risque de présence de PEE&nbsp;?</th>
                    <th scope="col" style="width: 8%">Le packaging santé est-il trompeur&nbsp;?</th>
                    <th scope="col" style="width: 10%">Repérez-vous des PEE dans la liste des ingrédients&nbsp;?</th>
                    <th scope="col" style="width: 8%">Y a-t-il un Écolabel&nbsp;?</th>
                    <th scope="col" style="width: 10%">Scanné avec&nbsp;:</th>
                    <th scope="col" style="width: 1%">Action&nbsp;:</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($lesProduits as $unProduit) {
                    if ((isset($_GET['editClicked'])) ? $unProduit['id'] == $_GET['editClicked'] : $lesReponses[$unProduit['id'] - 1]['marqueProduit'] == '' || $lesReponses[$unProduit['id'] - 1]['pictoEmballage'] == '') { ?>
                        <tr>
                            <input type="hidden" value="<?php echo $unProduit['id'] ?>" name=<?php echo "idProduit_" . $i ?>>
                            <input type="hidden" value="<?php echo true ?>" name=<?php echo "modified_" . $i ?>>
                            <td><label><?php echo $unProduit['nomProduit']; ?></label></td>
                            <td><input type="text" class="form-control" value="<?php echo $lesReponses[$unProduit['id'] - 1]['marqueProduit'] ?>" name=<?php echo "marqueProduit_" . $i ?>></td>
                            <td><input type="text" class="form-control" value="<?php echo $lesReponses[$unProduit['id'] - 1]['pictoEmballage'] ?>" name=<?php echo "pictoEmballage_" . $i ?>></td>
                            <td>
                                <select class="form-select" value="<?php echo $lesReponses[$unProduit['id'] - 1]['emballagePEE'] ?>" name=<?php echo "emballagePEE_" . $i ?>>
                                    <?php if ($lesReponses[$unProduit['id'] - 1]['emballagePEE'] == '1') { ?>
                                        <option value="1">Oui</option>
                                        <option value="0">Non</option>
                                    <?php } else { ?>
                                        <option value="0">Non</option>
                                        <option value="1">Oui</option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-select" value="<?php echo $lesReponses[$unProduit['id'] - 1]['packagingTrompeur'] ?>" name=<?php echo "packagingTrompeur_" . $i ?>>
                                    <?php if ($lesReponses[$unProduit['id'] - 1]['packagingTrompeur'] == '1') { ?>
                                        <option value="1">Oui</option>
                                        <option value="0">Non</option>
                                    <?php } else { ?>
                                        <option value="0">Non</option>
                                        <option value="1">Oui</option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-select" value="<?php echo $lesReponses[$unProduit['id'] - 1]['ingredientPEE'] ?>" name=<?php echo "ingredientPEE_" . $i ?>>
                                    <?php if ($lesReponses[$unProduit['id'] - 1]['ingredientPEE'] == '1') { ?>
                                        <option value="1">Oui</option>
                                        <option value="0">Non</option>
                                    <?php } else { ?>
                                        <option value="0">Non</option>
                                        <option value="1">Oui</option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-select" value="<?php echo $lesReponses[$unProduit['id'] - 1]['ecolabel'] ?>" name=<?php echo "ecolabel_" . $i ?>>
                                    <?php if ($lesReponses[$unProduit['id'] - 1]['ecolabel'] == '1') { ?>
                                        <option value="1">Oui</option>
                                        <option value="0">Non</option>
                                    <?php } else { ?>
                                        <option value="0">Non</option>
                                        <option value="1">Oui</option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <select class="form-select" value="<?php echo $lesReponses[$unProduit['id'] - 1]['scannerAvec'] ?>" name=<?php echo "scannerAvec_" . $i ?>>
                                    <?php if ($lesReponses[$unProduit['id'] - 1]['scannerAvec'] == 'INCIBeauty') { ?>
                                        <option value="INCIBeauty">INCIBeauty</option>
                                        <option value="Yuka">Yuka</option>
                                        <option value="Scan4chem">Scan4chem</option>
                                        <option value="Quelcosmetic">Quelcosmetic</option>
                                    <?php } elseif ($lesReponses[$unProduit['id'] - 1]['scannerAvec'] == 'Yuka') { ?>
                                        <option value="Yuka">Yuka</option>
                                        <option value="INCIBeauty">INCIBeauty</option>
                                        <option value="Scan4chem">Scan4chem</option>
                                        <option value="Quelcosmetic">Quelcosmetic</option>
                                    <?php } elseif ($lesReponses[$unProduit['id'] - 1]['scannerAvec'] == 'Scan4chem') { ?>
                                        <option value="Scan4chem">Scan4chem</option>
                                        <option value="INCIBeauty">INCIBeauty</option>
                                        <option value="Yuka">Yuka</option>
                                        <option value="Quelcosmetic">Quelcosmetic</option>
                                    <?php } else { ?>
                                        <option value="Quelcosmetic">Quelcosmetic</option>
                                        <option value="INCIBeauty">INCIBeauty</option>
                                        <option value="Yuka">Yuka</option>
                                        <option value="Scan4chem">Scan4chem</option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td class="text-center">
                                <?php if (isset($_GET['editClicked']) && $unProduit['id'] == $_GET['editClicked']) { ?>
                                    <button type="submit" name="btn-submit" class="btn btn-outline-success"><i class="bi bi-check-lg"></i></button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <input type="hidden" value="<?php echo $unProduit['id'] ?>" name=<?php echo "idProduit_" . $i ?>>
                            <input type="hidden" value="<?php echo false ?>" name=<?php echo "modified_" . $i ?>>
                            <td><label><?php echo $unProduit['nomProduit']; ?></label></td>
                            <td><label><?php echo $lesReponses[$unProduit['id'] - 1]['marqueProduit']; ?></label></td>
                            <td><label><?php echo $lesReponses[$unProduit['id'] - 1]['pictoEmballage']; ?></label></td>
                            <td>
                                <?php if ($lesReponses[$unProduit['id'] - 1]['emballagePEE'] == '1') { ?>
                                    <label>Oui</label>
                                <?php } else { ?>
                                    <label>Non</label>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($lesReponses[$unProduit['id'] - 1]['packagingTrompeur'] == '1') { ?>
                                    <label>Oui</label>
                                <?php } else { ?>
                                    <label>Non</label>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($lesReponses[$unProduit['id'] - 1]['ingredientPEE'] == '1') { ?>
                                    <label>Oui</label>
                                <?php } else { ?>
                                    <label>Non</label>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($lesReponses[$unProduit['id'] - 1]['ecolabel'] == '1') { ?>
                                    <label>Oui</label>
                                <?php } else { ?>
                                    <label>Non</label>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if ($lesReponses[$unProduit['id'] - 1]['scannerAvec'] == 'INCIBeauty') { ?>
                                    <label>INCIBeauty</label>
                                <?php } elseif ($lesReponses[$unProduit['id'] - 1]['scannerAvec'] == 'Yuka') { ?>
                                    <label>Yuka</label>
                                <?php } elseif ($lesReponses[$unProduit['id'] - 1]['scannerAvec'] == 'Scan4chem') { ?>
                                    <label>Scan4chem</label>
                                <?php } else { ?>
                                    <label>Quelcosmetic</label>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <?php if (!isset($_GET['editClicked'])) { ?>
                                    <button type="submit" value="aliments.php?editClicked=<?php echo $unProduit['id'] ?>" name="btn-editClicked" class="btn btn-outline-warning"><i class="bi bi-pencil-square"></i></button>
                                <?php } ?>
                            </td>
                        </tr>
                <?php }
                    $i++;
                } ?>
            </tbody>
        </table>

        <div class="position-relative py-2 px-4 d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-success btn-block" type="submit" name="btn-submit">Valider</button>
        </div>

    </form>
    <br>
</body>

</html>