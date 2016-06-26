<?php
    if (isset($_POST["submit"])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $human = intval($_POST['human']);
        $from = 'Vinyl Dev Contact Form'; 
        $to = 'hello@vinyldev.com'; 
        $subject = 'New Message!';
        
        $body ="From: $name\n E-Mail: $email\n\n Message:\n $message";

        // Check if name has been entered
        if (!$_POST['name']) {
            $errName = 'Please enter your name.';
        }
        
        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid e-mail address.';
        }
        
        //Check if message has been entered
        if (!$_POST['message']) {
            $errMessage = "Please enter a message.";
        }

        //Check if simple anti-bot test is correct
        if ($human !== 3) {
            $errHuman = 'Are you sure?';
        }

        // If there are no errors, send the email
        if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
            if (mail ($to, $subject, $body, $from)) {
                $result='<div class="alert alert-success text-center">Thank You! We will be in touch soon.</div>';
            } else {
                $result='<div class="alert alert-danger text-center">Sorry, there appears to be an error. Please E-mail us directly: hello@vinyldev.com.</div>';
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Vinyl</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="page-header">
                    <h1 class="text-center">Vinyl</h1>
                </div>
            </div>
            <div class="row">
                <img src="Vinyl-Dev-Logo-350.png" class="img-responsive center-block" alt="Vinyl Dev Logo">
            </div>
            <div class="row">
                <p class="lead text-center">
                    <br>
                    <br>
                    A music app for collectors. 
                    <br>
                    <br>
                </p>
            </div>
            <form class="form-horizontal" role="form" method="post" action="index.php">
                <div class="form-group">
                    <label for="name" class="col-sm-4 control-label">Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="name" name="name" placeholder="first &amp; last" value="">
                        <?php echo "<p class='text-danger'>$errName</p>";?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">E-Mail</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" id="email" name="email" placeholder="me@mydomain.com" value="">
                        <?php echo "<p class='text-danger'>$errEmail</p>";?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message" class="col-sm-4 control-label">Message</label>
                    <div class="col-sm-4">
                        <textarea class="form-control" rows="4" name="message" placeholder="questions, feature requests, words of wisdom; even a simple Hello"></textarea>
                        <?php echo "<p class='text-danger'>$errMessage</p>";?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="human" class="col-sm-4 control-label">1 + 2 = </label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="human" name="human" placeholder="answer">
                        <?php echo "<p class='text-danger'>$errHuman</p>";?>
                    </div>
                </div>
                <div class="form-group">
                    <input class="btn btn-primary center-block" id="submit" name="submit" type="submit" value="Submit">
                </div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-4">
                        <?php echo $result; ?>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-1 col-md-offset-5">
                    <a href="https://twitter.com/vinyldevc" target="_blank">
                        <img src="Twitter-Logo-50.png" class="center-block" alt="Twitter Logo"> 
                    </a>
                </div>
                <div class="col-md-1">
                    <a href="http://www.facebook.com/vinyldev" target="_blank">
                        <img src="Facebook-Logo-50.png" class="center-block" alt="Facebook Logo"> 
                    </a>
                </div>
            </div>
            <div class="row">
                <p class="text-center">
                    <br>
                    <br>
                    <small>Copyright <span class="glyphicon glyphicon-copyright-mark"></span> 2016 Matthew Cibulka. All rights reserved.</small>
                </p>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Google Analytics -->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-65015127-1', 'auto');
            ga('send', 'pageview');
        </script>
    </body>
</html>