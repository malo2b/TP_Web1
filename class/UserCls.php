<?php

class UserCls {
    private $login;
    private $mail;
    private $password;
    private $name;
    private $firstname;
    private $birthday;
    private $country;
    private $adress;
    private $city;
    private $cp;
    private $fav_website;
    private $fav_color;
    private $pet;
    private $hobbie;
    private $facebook;
    private $instagram;
    private $snapchat;
    private $twitter;
    private $position;
    private $user_agent;
    private $time_start;
    private $cookies;

    public function save_DB() : Boolean{

        $req = sprintf("
        INSERT INTO users (login, mail, password, name, firstname, birthday, country, adress, city, cp, fav_website, fav_color, pet, hobbie, facebook, instagram, twitter, snapchat, position, user_agent, time_start, cookies)
        VALUES ('%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d')
        ",
        $this->login,
        $this->mail,
        $this->password,
        $this->name,
        $this->firstname,
        $this->birthday,
        $this->country,
        $this->adress,
        $this->city,
        $this->cp,
        $this->fav_website,
        $this->fav_color,
        $this->hobbie,
        $this->facebook,
        $this->instagram,
        $this->twitter,
        $this->snapchat,
        $this->position,
        $this->user_agent,
        $this->time_start,
        $this->cookies
        );
        $db->exec($req);

        return True or False;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @param mixed $adress
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @param mixed $fav_website
     */
    public function setFavWebsite($fav_website)
    {
        $this->fav_website = $fav_website;
    }

    /**
     * @param mixed $fav_color
     */
    public function setFavColor($fav_color)
    {
        $this->fav_color = $fav_color;
    }

    /**
     * @param mixed $pet
     */
    public function setPet($pet)
    {
        $this->pet = $pet;
    }

    /**
     * @param mixed $hobbie
     */
    public function setHobbie($hobbie)
    {
        $this->hobbie = $hobbie;
    }

    /**
     * @param mixed $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @param mixed $instagram
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;
    }

    /**
     * @param mixed $snapchat
     */
    public function setSnapchat($snapchat)
    {
        $this->snapchat = $snapchat;
    }

    /**
     * @param mixed $twitter
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @param mixed $user_agent
     */
    public function setUserAgent($user_agent)
    {
        $this->user_agent = $user_agent;
    }

    /**
     * @param mixed $time_start
     */
    public function setTimeStart($time_start)
    {
        $this->time_start = $time_start;
    }

    /**
     * @param mixed $cookies
     */
    public function setCookies($cookies)
    {
        $this->cookies = $cookies;
    }

}
