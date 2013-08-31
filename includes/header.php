<?php 
function siteUrl(){
    return "http://www.destelpshoeve.nl";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="<?php echo siteUrl(); ?>/css/lightbox.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo siteUrl(); ?>/style.css" type="text/css">
    </head>
    <body>
        <div class="top-bar"></div>
        <div class="container">
            <div class="header cf">
                <div class="logo">
                    <h1><a href="<?php echo siteUrl(); ?>"><img src="<?php echo siteUrl(); ?>/images/logo.png" alt="De Stelpshoeve"></a></h1>
                </div>
                <div class="vacancies">
                    <a href="http://www.vakantieadressen.nl/beheerpanel/includes/calender.php?id=5ea1649a31336092c05438df996a3e59" target="_blank"><img src="<?php echo siteUrl(); ?>/images/vacancies.png" alt="vacancies"></a>
                </div>
            </div>
            <?php include("menu.php"); ?>
            <div class="content-frame-holder cf">
                <div class="content-frame">