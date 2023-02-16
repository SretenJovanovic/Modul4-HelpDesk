<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Jquery,popper,bootsrap js -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap 4 css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- My css -->
    <link rel="stylesheet" href="css/style.css">

    <title>HelpDesk</title>
</head>

<body class="bg-light">


    <!-- CONTAINER -->
    <div id="container">
        <!-- TO DO
            Different include depending on logged user TYPE 
        -->
        <?php include_once('view/administrator/administrator.view.php') ?>


        <!-- FOOTER -->
        <footer>
            <div class="text-white text-center pt-1">
                <p>Copyright &copy; 2023 by ProjectX </p>
            </div>
        </footer>
    </div>

    <!-- My JS -->
    <script src="js/main.js"></script>
    <script src="js/administrator.js"></script>
</body>

</html>