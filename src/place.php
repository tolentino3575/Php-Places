<?php

class Places
{
    private $cityname;

    function __construct($cityname)
    {
        $this->cityname = $cityname;
    }

    function setCityName($newCityName)
    {
        $this->cityname = (string) $newCityName;
    }

    function getCityName()
    {
        return $this->cityname;
    }
}
 ?>
