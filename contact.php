<?php include("includes/header.php"); ?>
<div class="content-header">
    <h1>Contact</h1>
</div>
<div class="content cf">
    <p>vul het onderstaande formulier in en wij nemen zo spoedig mogelijk contact met u op</p>
    <div class="naam">
        <label>Naam:</label>
        <input type="text" id="Name" name="Name" />
    </div>
    <div class="email">
        <label>Email adres:</label>
        <input type="email" id="email" name="email" />
    </div>
    <div class="vraag">
        <label class="labelvraag">Uw vraag aan ons:</label>
        <textarea name="textarea" id="textarea" rows="20" cols="60">Stel hier uw vraag aan ons</textarea>
    </div>
    <div class="submit">
        <input type="submit" id="submit" name="submit" value="verzenden" />
    </div>
</div>
    <?php include("includes/footer.php"); ?>