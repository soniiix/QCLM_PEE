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

    $lms_url = 'https://afpadpc.elmg.net/ws.php?wsdl';
    $options = ['stream_context' => stream_context_create(['http' => ['header' => "x-api-key: c28fee5256e3d10c09fafd2bca08ba6ee44f269e2c8c2620902cb82f6baea665"]]),];
    $client = new SoapClient($lms_url, $options);
    $userId = array();
    $userId[0] = $_POST["userid"];
    $userInfos = ($client->__soapCall("getUserInfosByUserId5_2_1", $userId));

    if ($userInfos->level_id == 1) {
        $url = 'gestion.php?mb542lvl=' . $userInfos->level_id;
        header("Location: $url");
    } else {
        addUser($bdd, $userInfos->user_id, $userInfos->lastname, $userInfos->firstname);

        $url = 'pages/aliments.php?mb542vds=' . $userInfos->user_id;
        header("Location: $url");
    }

    
    /* ====  version pour dev en local =====

    $lms_url = 'https://demo.dgtlms.fr/';
    $client = new soapclient($lms_url . 'ws.php?wsdl');
    $userId = array();
    $userId[0] = $_POST["userid"];
    $userInfos = ($client->__call("getUserInfosByUserId5_2_1", $userId));

    if ($userInfos->level_id == 1) {
        $url = 'gestion.php?mb542lvl=' . $userInfos->level_id;
        header("Location: $url");
    } else {
        addUser($bdd, $userInfos->user_id, $userInfos->lastname, $userInfos->firstname);
        
        $url = 'pages/aliments.php?mb542vds=' . $userInfos->user_id;
        header("Location: $url");
    }

    */

    ?>
</body>

</html>