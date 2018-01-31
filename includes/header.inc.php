<?php
    ob_start();
    require("db/db.php");
    if(isset($_GET['page'])) {
        $page = $_GET['page'];

        if($page == 'homepage') {
            $title = "CodersBD - Let's build a web app of PHP!";
        } elseif ($page == 'blog') {
            $title = "CodersBD - Welcome to our blog Feed!";
        } elseif ($page == 'contact') {
            $title = "CodersBD - Feel free to Contact US!";
        } elseif ($page == 'dashboard') {
            $title = "CodersBD - Welcome to your Dashboard!";
        } elseif ($page == 'login') {
            $title = "CodersBD - Welcome to our Journey!";
        } elseif ($page == 'register') {
            $title = "CodersBD - Join us in our Journey!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="images/icon/circular-button-with-two-arrows-pointing-both-laterals.png" type="image/png" rel="icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Pragati+Narrow:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
