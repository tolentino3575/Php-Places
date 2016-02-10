<?php

class Places
{
    private $cityname;
    private $description;

    function __construct($cityname, $description)
    {
        $this->cityname = $cityname;
        $this->description = $description;
    }

    function setDescription($newDescription)
    {
        $this->description = (string) $newDescription;
    }

    function getDescription()
    {
        return $this->$description;
    }

    function setCityName($newCityName)
    {
        $this->cityname = (string) $newCityName;
    }

    function getCityName()
    {
        return $this->cityname;
    }

    function save()
    {
        array_push($_SESSION['list_of_places'], $this);
    }//$_SESSION is a superglobal variable like $_GET. Remember, superglobal means we can access it from anywhere in our code.

    static function getAll()
    {
        return $_SESSION['list_of_places'];
    }//Now, we need some way to loop through all of our saved tasks in $_SESSION['list_of_places']. To do this we will write a special kind of method called a static method. It's a getter, but it works on the whole class: its job will be to return the list of all our tasks.

    static function deleteAll()
    {
        $_SESSION['list_of_places'] = array();
    }
}
 ?>
