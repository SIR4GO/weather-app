<?php

namespace PHPMVC\lib ;

class AutoRequire
{
    public static function auto($className)  // called automatic when i want define object from any class and send class name so use it to require class file
    {
        $name = $className;
        $arr = explode('\\' , str_replace('PHPMVC\\' , '' , $className)  ); // [0] access      [1] add
        //var_dump($arr);


        $className = APP_PATH. DS .  $arr[0] . DS . lcfirst( $arr[1] ). '.php' ;
        //var_dump($className);

        $className =  str_replace('\\' , '/' , $className);

        if (file_exists($className)) {  // to solve problem require class not Exist
            require $className ;
        }
        else
        {
            echo $name .".php" . " Not require";
        }


    }

}

$Function = __NAMESPACE__ .'\AutoRequire::auto';

spl_autoload_register($Function);   // take class name but function static so


                                           // we should write namespace after name of class
                                                                             //  register auto as autoload original