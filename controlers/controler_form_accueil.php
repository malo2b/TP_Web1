<?php

include_once '../class/UserCls.php';

function valid_donnees($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Vérification des données


$login = valid_donnees($_POST['login']);
$mail = valid_donnees($_POST['mail']);
$password = valid_donnees($_POST['password']);
$password = password_hash($password, PASSWORD_DEFAULT);
$name = valid_donnees($_POST['name']);
$firstname = valid_donnees($_POST['firstname']);
$birthday = valid_donnees($_POST['birthday']);
$birthday = password_hash($birthday, PASSWORD_DEFAULT);
$country = valid_donnees($_POST['country']);
$adress = valid_donnees($_POST['adress']);
$city = valid_donnees($_POST['city']);
$cp = valid_donnees($_POST['cp']);
$fav_website = valid_donnees($_POST['fav_website']);
$fav_color = valid_donnees($_POST['fav_color']);
$nb_pets = valid_donnees($_POST['nb_pets']);
$hobbie = valid_donnees($_POST['hobbie']);
$facebook = valid_donnees($_POST['facebook']);
$instagram = valid_donnees($_POST['instagram']);
$twitter = valid_donnees($_POST['twitter']);
$snapchat = valid_donnees($_POST['snapchat']);

$validate = true;

if (empty($login) || strlen($login) < 3) {
    $validate = false;
}
if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $validate = false;
}
if (empty($password) || strlen($password) < 3) {
    $validate = false;
}
if (empty($name) || strlen($name) < 2) {
    $validate = false;
}
if (empty($firstname) || strlen($firstname) < 2) {
    $validate = false;
}
if (empty($birthday) || preg_match("^[0-9]{4}-[0-9]{2}-[0-9]{2}$", $birthday)) {
    $validate = false;
} else {
    // $date_exploded = explode("-",$_POST['birthday']);
    // if (!checkdate($date_exploded($date_exploded[1], $date_exploded[2], $date_exploded[0]))) {
    //     $validate = false;
    // }
}
// if (empty($country)) {
//     $validate = false;
// }
if (empty($adress)) {
    $validate = false;
}
if (empty($city) || preg_match("^[A-Za-z\ -]+$", $city)) {
    $validate = false;
}
if (empty($cp) and preg_match("^[0-9]{5}$", $cp)) {
    $validate = false;
}
if (empty($fav_website) || preg_match("^(?:http(s)?:\/\/)?[\w.-]+(?:\.[\w\.-]+)+[\w\-\._~:/?#[\]@!\$&'\(\)\*\+,;=.]+$", $fav_website)) {
    $validate = false;
}
if (empty($nb_pets) /*&& !is_int($nb_pets)*/) {
    $validate = false;
}
if (empty($hobbie)) {
    $validate = false;
}

// Ecriture fichier XML

if ($validate) {

    echo "form valide";

    $user = new UserCls();

    $user->setLogin($login);
    $user->setMail($mail);
    $user->setPassword($password);
    $user->setName($name);
    $user->setFirstname($name);
    $user->setBirthday($birthday);
    $user->setCountry($country);
    $user->setAdress($adress);
    $user->setCity($city);
    $user->setCp($cp);
    $user->setFavWebsite($fav_website);
    $user->setFavColor($fav_color);
    $user->setPet($nb_pets);
    $user->setHobbie($hobbie);
    $user->setFacebook($facebook);
    $user->setInstagram($instagram);
    $user->setTwitter($twitter);
    $user->setSnapchat($snapchat);

    $user->save_DB();

    ## Generer XML ##

    $dom = new DOMDocument('1.0', 'utf-8');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;

    //create the main tags, without values
    $datas = $dom->createElement('datas');
    $connexionInformations = $dom->createElement('connexionInformations');
    $personnalInformations = $dom->createElement('personnalInformations');
    $residence = $dom->createElement('residence');
    $socialNetworks = $dom->createElement('socialNetworks');
    $navigationInformations = $dom->createElement('navigationInformations');

    // create connexionInformations tags with values
    $xmlLogin = $dom->createElement('login', $login);
    $xmlMail = $dom->createElement('mail', $mail);
    $xmlPassword = $dom->createElement('password', $password);

    // create personnalInformations tags with values
    $xmlName = $dom->createElement('name', $name);
    $xmlFirstname = $dom->createElement('firstname', $firstname);
    $xmlBirthday = $dom->createElement('birthday', $birthday);
    $xmlFavWebsite = $dom->createElement('favouriteWebsite', $fav_website);
    $xmlFavColor = $dom->createElement('favouriteColor', $fav_color);
    $xmlHobbie = $dom->createElement('hobbie', $hobbie);

    // create residence tags with values
    $xmlCountry = $dom->createElement('country', $country);
    $xmlAdress = $dom->createElement('adress', $adress);
    $xmlCp = $dom->createElement('cp', $cp);
    $xmlCity = $dom->createElement('city', $city);

    // create social network tags with values
    $xmlFacebook = $dom->createElement('facebook', $facebook);
    $xmlInstagram = $dom->createElement('instagram', $instagram);
    $xmlTwitter = $dom->createElement('twitter', $twitter);
    $xmlSnapchat = $dom->createElement('snapchat', $snapchat);

    // create navigationInformations tags with values
    $xmlPosition = $dom->createElement('position', $_POST['position']);
    $xmlUserAgent = $dom->createElement('userAgent', $_POST['userAgent']);
    $xmlTimeStart = $dom->createElement('timeStart', $_POST['timeStart']);
    $xmlCookies = $dom->createElement('Cookies', $_POST['cookies']);

    //create the XML structure
    $datas->appendChild($connexionInformations);
    $datas->appendChild($personnalInformations);
    $datas->appendChild($navigationInformations);

    $connexionInformations->appendChild($xmlLogin);
    $connexionInformations->appendChild($xmlMail);
    $connexionInformations->appendChild($xmlPassword);

    $personnalInformations->appendChild($xmlName);
    $personnalInformations->appendChild($xmlFirstname);
    $personnalInformations->appendChild($xmlBirthday);
    $personnalInformations->appendChild($residence);
    $personnalInformations->appendChild($socialNetworks);

    $socialNetworks->appendChild($xmlFacebook);
    $socialNetworks->appendChild($xmlInstagram);
    $socialNetworks->appendChild($xmlTwitter);
    $socialNetworks->appendChild($xmlSnapchat);

    $residence->appendChild($xmlCountry);
    $residence->appendChild($xmlAdress);
    $residence->appendChild($xmlCp);
    $residence->appendChild($xmlCp);
    $residence->appendChild($xmlFavWebsite);
    $residence->appendChild($xmlFavColor);
    $residence->appendChild($xmlHobbie);

    $navigationInformations->appendChild($xmlPosition);
    $navigationInformations->appendChild($xmlUserAgent);
    $navigationInformations->appendChild($xmlTimeStart);
    $navigationInformations->appendChild($xmlCookies);

    $dom->appendChild($datas);

    $dom->save("../xml/output.xml");
} else {
    echo "form invalide";
}