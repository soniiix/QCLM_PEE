<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perturbateurs endocriniens</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../script.js"></script>
    <?php
    include("bdd/biblioAccesBDD.php");
    include("bdd/functions.php");
    $bdd = seConnecter();
    date_default_timezone_set('Europe/Paris');
    ?>
</head>

<body>
    <?php
    session_start();

    $lms_url = 'https://demo.dgtlms.fr/';
    $client = new soapclient($lms_url . 'ws.php?wsdl');
    $userId = array();
    $userId[0] = $_POST["userid"];
    $userInfos = ($client->__call("getUserInfosByUserId5_2_1", $userId));

    $_SESSION['userId'] = $userInfos->user_id;

    if ($userInfos->level_id == 1) {
    } else {
        addUser($bdd, $userInfos->user_id, $userInfos->lastname, $userInfos->firstname);

        $url = 'pages/aliments.php';
        header("Location: $url");
    }



    // Génération d'une clé SSO pour l'utilisateur
    /*
    $fct_parameters = array(
        'uid' => $user_id
    );
    $sso_key = ($client->__call("createSSOSecurityKey", $fct_parameters));
    if ($sso_key) {
        echo 'Clé sso générée pour l\'utilisateur:' . $sso_key . '<br />';
        echo 'Adresse de connexion :' . $lms_url . 'sso.php?skey=' . $sso_key . '<br/>';
    } else {
        echo 'Echec de la création de la clé sso pour l\'utilisateur <br />';
    }
    */


    ?>
</body>

</html>