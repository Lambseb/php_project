<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/style/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <script defer src="./public/script/index.Js"></script>
    <title>TODO LIST</title>
</head>

<body>
    <div class="container">
        
        <!-- call component header -->
        <?php require_once './components/header.php' ?>
        <!-- call component form -->
        <?php require_once './components/todoForm.php' ?>
        <!-- call component footer -->
        <?php require_once './components/footer.php' ?>
    </div>
</body>

</html>