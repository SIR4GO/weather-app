<?php
/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 2/26/2018
 * Time: 6:11 AM
 */

namespace PHPMVC\models;


class weatherModel
{
    private $_result;

    public function GetWeatherInfo()
    {
        $file = "http://api.openweathermap.org/data/2.5/forecast?q=" . $_SESSION['city'] . "&units=metric&APPID=25e7c598ee54ca1c3da8beef9a8042e4";
        $this->_result = @file_get_contents($file); // @ to disallow warrnig if countery wrong
        return   $this->_result;
    }

}