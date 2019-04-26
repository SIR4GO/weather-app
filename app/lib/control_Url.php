<?php
namespace PHPMVC\lib; // namespace is wanted   to require file by autoload class successfully

use Couchbase\Exception;


const NOT_FOUND_ACTION = "notfound";
const NOT_FOUND_CONTROL="PHPMVC\controllers\\notfound";

class control_Url
{

    private $_Control ='weather';
    private $_Action ='EnterCity';
    private $_params = array();

    public function __construct()  // if no url when call page  go to default page and default control and action
    {

        $this->Parse_URl();
    }


    public function Parse_URl()
    {
        $url= explode('/' ,trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH) ,'/')  , 3);// return
        //var_dump($url);
        if(isset($url[0])  && $url[0] != '')
        {
            $this->_Control =$url[0];
        }
        if(isset($url[1]) &&  $url[1] != '')
        {
            $this->_Action = $url[1];
        }
        if(isset($url[2]) &&  $url[2] != '')
        {
            $this->_params = explode('/' , $url[2]);
        }


        //var_dump($this);
    }


    public function Send_URl_INFO_TO_Controller_Class()
    {

        $ClassName = 'PHPMVC\controllers\\' . $this->_Control ;// make class name to be ready to make object  to start send data to class controller
        $MethodName = $this->_Action ;                        // dynamic  make class name so we should write name space


        if(!class_exists($ClassName))
        {
            //var_dump($ClassName);
            $this->_Control= $ClassName = NOT_FOUND_CONTROL;  // if class not found direct me to class notfound

        }


        $Control = new $ClassName();  // object from class control


        if(!method_exists($Control , $MethodName))    // if action not found  direct me function notfound
        {
            //var_dump($MethodName);
             $this->_Action = $MethodName = NOT_FOUND_ACTION;
        }




         ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $Control->set($this->_Control ,$this->_Action ,$this->_params);  // now we send date to object after check every thing to do process after show view
        //var_dump($Control);


        $Control->$MethodName();      // Try to access on methods on my class to show view
                                     //  if Method not found  we will directed to  Method notfound  at abstract class


    }


}

