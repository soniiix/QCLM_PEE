<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Administration PEE</title>
    <meta content="" name="description">
    <link href="assets/images/favicon.png" rel="icon">
    <link href="assets/images/favicon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <?php
    include("bdd/biblioAccesBDD.php");
    include("bdd/functions.php");
    $bdd = seConnecter();
    date_default_timezone_set('Europe/Paris');


    if(!isset($_GET['mb542lvl'])){
        $url = '../error.php';
        header("Location: $url");
    }

    
    $dateDebut = "0000-00-00 00:00:00";
    $dateFin = "9999-12-31 23:59:59";

    if (isset($_POST['btnSearch'])) {
        $dateDebut = $_POST['dateDebut'] . " 00:00:00";
        $dateFin = $_POST['dateFin'] . " 23:59:59";
        $lesReponses = getReponsesByDate($bdd, $dateDebut, $dateFin);
    } elseif (isset($_POST['btnReset'])) {
        $lesReponses = getAllReponses($bdd);
    } else {
        $lesReponses = getAllReponses($bdd);
    }

    ?>
</head>

<body>
    <header class="header_part">
        <h4>Administration - Export PEE</h4>
    </header>

    <!-- =======  Data-Table  = Start  ========================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="data_table">

                    <!-- =====  date picker ===== -->
                    <form class="row row-cols-lg-auto g-2 align-items-center" method="POST">
                        <div class="col-12">
                            <label>Rechercher du</label>
                        </div>
                        <div class="col-12">
                            <input type="date" name="dateDebut" class="form-control" placeholder="Date de début" required></input>
                        </div>
                        <div class="col">
                            <label>au</label>
                        </div>
                        <div class="col-12">
                            <input type="date" name="dateFin" class="form-control" placeholder="Date de fin" required></input>
                        </div>
                        <div class="col-12">
                            <div class="btn-group" role="group">
                                <button type="submit" name="btnSearch" class="btn btn-secondary">Valider</button>
                    </form>
                            <form method="POST">
                                <button type="submit" name="btnReset" class="btn btn-secondary">Réinitialiser</button>
                            </div>
                    </form>
                                
                        </div>
                    

                    <table id="example" class="table table-striped table-hover align-middle table-bordered">
                        <thead class="table align-middle">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Type de produit</th>
                                <th scope="col">Nom du produit</th>
                                <th scope="col">Marque</th>
                                <th scope="col" class="large-col">Pictogramme de l'emballage</th>
                                <th scope="col">Risque Présence PEE</th>
                                <th scope="col">Packaging santé trompeur</th>
                                <th scope="col" class="medium-col">PEE dans la liste des ingrédients</th>
                                <th scope="col">Présence d'un écolabel</th>
                                <th scope="col">Scanné avec</th>
                                <th scope="col" class="medium-col">Date de la dernière modification</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($lesReponses as $uneReponse) { ?>
                                <tr>
                                    <td><?php echo $uneReponse['nom'] ?></td>
                                    <td><?php echo $uneReponse['prenom'] ?></td>
                                    <td><?php echo $uneReponse['typeProduit'] ?></td>
                                    <td><?php echo $uneReponse['nomProduit'] ?></td>
                                    <td><?php echo $uneReponse['marqueProduit'] ?></td>
                                    <td><?php echo $uneReponse['pictoEmballage'] ?></td>
                                    <td><?php echo ($uneReponse['emballagePEE'] == 1) ? ("Oui") : ("Non") ?></td>
                                    <td><?php echo ($uneReponse['packagingTrompeur'] == 1) ? ("Oui") : ("Non") ?></td>
                                    <td><?php echo ($uneReponse['ingredientPEE'] == 1) ? ("Oui") : ("Non") ?></td>
                                    <td><?php echo ($uneReponse['ecolabel'] == 1) ? ("Oui") : ("Non") ?></td>
                                    <td><?php echo $uneReponse['scannerAvec'] ?></td>
                                    <td><?php echo $uneReponse['dateModif'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- =======  Data-Table  = End  ===================== -->
    <!-- ============ Java Script Files  ================== -->


    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script src="assets/js/pdfmake.min.js"></script>
    <script src="assets/js/vfs_fonts.js"></script>
    <script src="assets/js/custom.js"></script>


</body>

</html>