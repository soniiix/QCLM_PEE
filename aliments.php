<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('include/head.php');

    $lesReponses = getReponseByIdUser($bdd, 1);

    if (isset($_POST['btn-submit'])) {
        $lesLignes = $_POST;
        $i = 0;
        $exist = false;
        foreach ($lesLignes as $uneLigne) {
            $exist = false;
            foreach ($lesReponses as $uneReponse) {
                if ($_POST['idProduit_' . $i] == $uneReponse['idProduit']) {
                    $exist = true;
                }
            }
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
            $i++;
        }
    }
    $lesReponses = getReponseByIdUser($bdd, 1);
    ?>
</head>

<body>
    <?php
    $activeA = "active";
    include('include/headers.php');
    $lesProduits = getProduitByType($bdd, "aliments");
    ?>
    
<!-- <div class="card">
  <div class="card-body"> -->
    

    <form action="aliments.php" method="post">
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
                foreach ($lesProduits as $unProduit) { ?>
                    <tr>
                        <input type="hidden" value="<?php echo $unProduit['id'] ?>" name=<?php echo "idProduit_" . $i ?>>
                        <td><label><?php echo $unProduit['nomProduit']; ?></label></td>
                        <td><input type="text" class="form-control" value="<?php echo $lesReponses[$unProduit['id'] - 1]['marqueProduit'] ?>" name=<?php echo "marqueProduit_" . $i ?>></td>
                        <td><input type="text" class="form-control" value="<?php echo $lesReponses[$unProduit['id'] - 1]['pictoEmballage'] ?>" name=<?php echo "pictoEmballage_" . $i ?>></td>
                        <td>
                            <select class="form-select" value="<?php echo $lesReponses[$unProduit['id'] - 1]['emballagePEE'] ?>" name=<?php echo "emballagePEE_" . $i ?>>
                                <option value="1">Oui</option>
                                <option value="0">Non</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select" value="<?php echo $lesReponses[$unProduit['id'] - 1]['packagingTrompeur'] ?>" name=<?php echo "packagingTrompeur_" . $i ?>>
                                <option value="1">Oui</option>
                                <option value="0">Non</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select" value="<?php echo $lesReponses[$unProduit['id'] - 1]['ingredientPEE'] ?>" name=<?php echo "ingredientPEE_" . $i ?>>
                                <option value="1">Oui</option>
                                <option value="0">Non</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select" value="<?php echo $lesReponses[$unProduit['id'] - 1]['ecolabel'] ?>" name=<?php echo "ecolabel_" . $i ?>>
                                <option value="1">Oui</option>
                                <option value="0">Non</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-select" value="<?php echo $lesReponses[$unProduit['id'] - 1]['scannerAvec'] ?>" name=<?php echo "scannerAvec_" . $i ?>>
                                <option value="INCIBeauty">INCIBeauty</option>
                                <option value="Yuka">Yuka</option>
                                <option value="Scan4chem">Scan4chem</option>
                                <option value="Quelcosmetic">Quelcosmetic</option>
                            </select>
                        </td>
                        <td class="text-center">
                            <!-- <button class="btn btn-success"><i class="bi bi-check-square"></i></button>&nbsp; -->
                            <button class="btn btn-outline-warning"><i class="bi bi-pencil-square"></i></button>
                        </td>
                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>

        <div class="position-relative py-2 px-4 d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-success btn-block" type="submit" name="btn-submit">Valider</button>
        </div>

    </form>
    <br>
  <!-- </div></div> -->
</body>

</html>