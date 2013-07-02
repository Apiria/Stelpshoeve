<?php 
function siteUrl(){
    return "http://localhost/menu";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="<?php echo siteUrl(); ?>/css/lightbox.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo siteUrl(); ?>/style.css" type="text/css">
    </head>
    <body>
        <div class="top-bar"></div>
        <div class="container">
            <div class="header cf">
                <div class="logo">
                    <h1><a href="#"><img src="images/logo.png" alt="De Stelpshoeve"></a></h1>
                </div>
                <div class="vacancies">
                    <img src="images/vacancies.png" alt="vacancies">
                </div>
            </div>
            <?php include("menu.php"); ?>
            <div class="content-frame-holder cf">
                <div class="content-frame">