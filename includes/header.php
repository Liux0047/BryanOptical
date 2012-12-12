<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 10px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
        width:230px;
      }
    </style>
    <link rel="shortcut icon" type="image/x-icon" href="./img/bryan_logo.png"> 

    <?php      
        if (isset($_SERVER['HTTP_USER_AGENT']) && 
            (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) {
            //detect browser
            echo "<script src=\"http://html5shim.googlecode.com/svn/trunk/html5.js\"></script>";
    }
    ?>      
