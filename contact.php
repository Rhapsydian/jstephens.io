<?php
    $allEntered = true;
    $showThankYou = false;

    if(isset($_POST['submitted'])){
        if( strlen($_POST['emailName'])>0 && strlen($_POST['emailAddress'])>0 && strlen($_POST['emailText'])>0 )
        {
            $showThankYou=true;

            $to = "thecodechemist@gmail.com";
            $subject = "Message from a viewer of your portfolio.";

            $headers = "From: " . strip_tags($_POST['emailName']) . "\r\n";
            $headers .= "Reply-To: " . strip_tags($_POST['emailAddress']) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            $message = "<html><body>";
            $message .= "<p>You have a message from: <b>" . strip_tags($_POST['emailName']) . "</b></p>";
            $message .= "<p>" . htmlentities($_POST['emailText']) . "</p>";

            mail($to,$subject,$message,$headers);
        }
        else
        {
            $allEntered = false;
        }
    }
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>jstephens.io</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <a href="/" class="navbar-brand">JStephens.io</a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/contact.php">Contact Me</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <h1>Contact Me</h1>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php
                if($allEntered == false)
                {
                    echo "<div class=\"alert alert-danger\">All fields are required.</div>";
                }
            ?>
            <?php
                if($showThankYou == true)
                {
                    echo "<div class=\"alert alert-success\">Your message has been sent.  Thank you for contacting me.</div>";
                }
            ?>
            <div class="well">
                <form action="" method="post">
                    <input type="hidden" name="submitted" value="true">
                    <div class="form-group">
                        <label for="emailName">Name:</label>
                        <input type="text" class="form-control" id="emailName" name="emailName" placeholder="Your name">
                    </div>
                    <div class="form-group">
                        <label for="emailAddress">Email:</label>
                        <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="your_email@example.com">
                    </div>
                    <div class="form-group">
                        <label for="emailText">Message:</label>
                        <textarea class="form-control" id="emailText" name="emailText" placeholder="Please enter your message here."></textarea>
                    </div>
                    <p>All fields are required.</p>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</body>
</html>