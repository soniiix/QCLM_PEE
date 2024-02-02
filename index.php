<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include('include/head.php'); 
    if (isset($_POST['btn-submit'])) {
        var_dump($_POST);
        header("Location: index.php?success=1");
    }?>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="test">
        <button type="submit" name="btn-submit">yay</button>
    </form>
</body>
</html>

