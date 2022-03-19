<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP WEB</title>
    <link rel="stylesheet" href="./dist/spectre.min.css">
<body>
<div class="container">
    <form action="controlers/controler_form_accueil.php" method="post" id="accueilForm">
        <div class="columns">
            <div class="column col-4">
                <label class="form-label">Login *</label>
                <input class="form-input" type="text" placeholder="Login" name="login">
            </div>
            <div class="column col-4">
                <label class="form-label">Mail *</label>
                <input class="form-input" type="mail" placeholder="e-mail" name="mail">
            </div>
            <div class="column col-4">
                <label class="form-label">Mot de passe *</label>
                <input class="form-input" type="password" placeholder="mot de passe" name="password">
            </div>
        </div>
        <div class="columns">
            <div class="column col-4">
                <label class="form-label" >Nom *</label>
                <input class="form-input" type="text" placeholder="Nom" name="name">
            </div>
            <div class="column col-4">
                <label class="form-label" >Prénom *</label>
                <input class="form-input" type="text" placeholder="Prénom" name="firstname">
            </div>
            <div class="column col-4">
                <label class="form-label" >Date de naissance *</label>
                <input class="form-input" type="date" placeholder="Date naissance" name="birthday">
            </div>
        </div>
        <div class="columns">
            <div class="column col-4">
                <label class="form-label" >Pays</label>
                <select class="form-select" type="text" placeholder="Pays" name="country" id="selectCountry">
                    <!-- <option>Hipchat</option> -->
                </select>
            </div>
            <div class="column col-4">
                <label class="form-label" >Adresse *</label>
                <input class="form-input" type="text" placeholder="Adresse" name="adress">
            </div>
            <div class="column col-2">
                <label class="form-label" >Ville *</label>
                <input class="form-input" type="text" placeholder="Ville" name="city">
            </div>
            <div class="column col-2">
                <label class="form-label" >CP *</label>
                <input class="form-input" type="text" placeholder="Code Postal" name="cp">
            </div>
        </div>
        <div class="columns">
            <div class="column col-3">
                <label class="form-label" >Url site web favori</label>
                <input class="form-input" type="url" placeholder="site web favori" name="fav_website">
            </div>
            <div class="column col-3">
                <label class="form-label" >Couleur préférée</label>
                <input class="form-input" type="color"  name="fav_color">
            </div>
            <div class="column col-3">
                <label class="form-label" >Nombre annimaux de compagnie</label>
                <input class="form-input" type="number" placeholder="nombre annimaux de compagnie"  name="nb_pets">
            </div>
            <div class="column col-3">
                <label class="form-label" >Hobbie</label>
                <input class="form-input" type="text" placeholder="hobbie" name="hobbie">
            </div>
        </div>
        <div class="columns">
            <div class="column col-3">
                <label class="form-label" >Facebook</label>
                <input class="form-input" type="text" placeholder="facebook" name="facebook">
            </div>
            <div class="column col-3">
                <label class="form-label" >Instagram</label>
                <input class="form-input" type="text" placeholder="instagram" name="instagram">
            </div>
            <div class="column col-3">
                <label class="form-label" >Twitter</label>
                <input class="form-input" type="text" placeholder="twitter" name="twitter">
            </div>
            <div class="column col-3">
                <label class="form-label" >Snapchat</label>
                <input class="form-input" type="text" placeholder="snapchat" name="snapchat">
            </div>
        </div>

        <input id="formPosition" name="position" type="hidden">
        <input id="formUA" name="userAgent" type="hidden">
        <input id="formTS" name="timeStart" type="hidden">
        <input id="formCookies" name="cookies" type="hidden">
        <br>
        <button class="btn btn-primary" type="submit">Valider</button>


    </form>
</div>
</body>
<script src="script/accueil.js"></script>
</html>