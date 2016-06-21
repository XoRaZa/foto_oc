<meta charset="utf-8">

<?php require('get_total.php'); ?>

<div id="uzsakymo-suma">Užsakymo suma: <span id="u-suma"><?php echo round($total, 2); ?></span> &euro;</div>
<div class="info">Įveskite savo kontaktinius duomenis ir nukreipsime Jus į apmokėjimo formą.</div>

<form action="" id="kontaktu-forma">
<!--    <label for="vardas">Vardas</label>-->
    <input required="required" type="text" name="vardas" placeholder="Vardas*">

<!--    <label for="pavarde">Pavardė</label>-->
    <input required="required" type="text" name="pavarde" placeholder="Pavardė*">

<!--    <label for="email">El. paštas</label>-->
    <input required="required" type="email" name="email" placeholder="El. paštas*">

<!--    <label for="telefonas">Tel. nr</label>-->
    <input required="required" type="text" name="telefonas" placeholder="Tel. nr.*">

<!--    <label for="adresas">Adresas</label>-->
    <input required="required" type="text" name="adresas" placeholder="Adresas*">

<!--    <label for="komentaras">Papildomas komentaras</label>-->
    <textarea name="komentaras" placeholder="Papildomas komentaras"></textarea>

    <a href="/libwebtopay/redirect.php" id="sumoketi" class="narsyti" target="_blank">Apmokėti užsakymą</a>
</form>

<div id="butina">Būtina užpildyti * pažymėtus laukelius</div>

<script type="text/javascript" src="/catalog/view/javascript/j/pay.js"></script>