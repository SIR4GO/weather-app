<?php

namespace PHPMVC\controllers;


use PHPMVC\models\weatherModel;

class weather extends abstract_
{
    private $_city;
    private $_modelInfo;
    public $_dataArr ;


    public function EnterCity()
    {
        $this->_view();
        if(isset($_POST['submit']))
        {
            $this->_city = filter_input(INPUT_POST , 'city' ,FILTER_SANITIZE_STRING);
            $_SESSION['city'] =  $this->_city ;
            header("Location: /weather/CurrentWeather");
        }

    }

    public function CurrentWeather()
    {
      if(isset($_SESSION['city']))
      {
          $instance = new weatherModel(); //

          $this->_modelInfo = $instance->GetWeatherInfo(); // string json file
          $_SESSION['info'] =  $this->_modelInfo;
          if($this->_modelInfo != false) // to disallow view if country wrong
          {
              $this->_dataArr =  json_decode($this->_modelInfo , true); // array of data
              $this->_view();

          }
          else
              header("Location: /weather/NoWeather");



      }
      else
          header("Location: /weather/NoWeather");



    }
    public function NoWeather()
    {
        if($_SESSION['info'] == false )  // to disallow render view if there is city info about weather
            $this->_view();
        else
            header("Location: /weather/CurrentWeather");

        //session_unset();
    }

}