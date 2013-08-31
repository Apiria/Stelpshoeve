<?php 
function siteUrl(){
    return "http://www.destelpshoeve.nl";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>De Stelpshoeve | Groeps Accomodatie in Friesland</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
                    <a href="http://www.vakantieadressen.nl/beheerpanel/includes/calender.php?id=5ea1649a31336092c05438df996a3e59" target="_blank"><img src="images/vacancies.png" alt="vacancies"></a>
                </div>
            </div>
            <?php include("includes/menu.php"); ?>
            <div class="slider">
                <img src="images/slider-test-pic.jpg" alt="De Stelpshoeve" class="sliderimg">	    
            </div>
            <div class="content-frame-holder cf">
                <div class="content-frame">
                    <div class="content-header">
                        <h1>De Stelpshoeve</h1>
                    </div>
                    <div class="content">
                        <p>U vindt groepsaccommodatie De Stelpshoeve,  Stelpspad 10 aan de rand van het rustieke Friese dorp Holwerd. De Stelpshoeve staat bekend als gastvrij en gezellig en wij willen u daar graag kennis mee laten maken. De accommodatie is te boeken voor 2 tot 30 personen.</p>
                        <h2>De Accomodatie</h2>
                        <p>De Stelpshoeve is een orginele stolpboerderij aan de rand van het dorp. In 2007 verbouwd tot een mooie comfortabele groepsruimte die van alle gemakken is voorzien. Beneden vindt u een grote groepsruimte met eetgelegenheid, gezellige zitjes, bar met tap, t.v./speelhoek. en 2 kamers, douche en toiletten.</p>
                        <p>Een ruime keuken met een groot gasfornuis, oven, koelkast, magnetron e.d. Alles wat u nodig heeft om te koken kunt u er vinden.
                            Op de eerste verdieping vind u een ruime gang met 9 slaapkamers voor 2, 3 of 4 personen die voorzien zijn van douche en toilet.</p>
                        <p>Naast de boerderij is een grote tuin waar u gebruik van kunt maken. Daar staan piknicktafels en is er ruimte voor de kinderen om te spelen. Het voorste gedeelte van de boerderij wordt door ons bewoond en is gescheiden van de groepsruimte. Bij het privegedeelte van de boerderij hoort ook een Cafetaria waar maaltijden besteld kunnen worden. </p>
                        <h2>De omgeving</h2>
                        <p>De meeste mensen kennen Holwerd als de aanlegplaats voor de boot naar  Ameland. Holwerd heeft zelf echter ook veel te bieden. In het dorpje achter de dijk kunt U volop genieten van de rust en de schoonheid van het waddengebied. In de omgeving van het dorp zijn veel mogelijkheden om interessante en leuke uitstapjes te maken, te wandelen en te fietsen.</p>
                            <p>Als u door het dorp zelf loopt krijgt u het gevoel in vroegere tijden te verkeren. De kern van het dorp heeft een bijzonder karater dankzij de vele oude huisjes en de gezellige straatjes die worden gekenmerkt door de hoogteverschillen in stoepen en trappen en kleine steegjes.
                            Holwerd is een uiterst geschikte plaats voor een mooie vakantie in fries Waddengebied.</p>
                        <img class="image" src="<?php echo siteUrl(); ?>/images/omgeving-holwerd.jpg" alt="Omgeving Holwerd">
                    </div>
                <?php include("includes/footer.php"); ?>