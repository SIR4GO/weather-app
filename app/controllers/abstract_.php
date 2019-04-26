<?php

// This is class Make for notfound action  and show views for all classes controllers
// This is class Make TO prevent Repetition of Code in  all class controllers
// we need this code in all classes controllers

namespace PHPMVC\controllers;

use const PHPMVC\lib\NOT_FOUND_ACTION;

use const PHPMVC\lib\NOT_FOUND_CONTROL;

class Abstract_
{


    public $_control;
    public $_action;
    public $_params;
    public $_data = array();

  public function set($C ,$A ,$P )
  {
      $this->_control = $C;
      $this->_action = $A;
      $this->_params = $P;

  }

    public function notfound()
    {
        $this->_view();
    }

    protected function _view()
    {
        if($this->_action == NOT_FOUND_ACTION)
        {
            require VIEW_PATH . DS .  'notfound' . DS . 'notfound.php';   // not found action == not found function in class control
        }
        else
        {

              $View = VIEW_PATH . DS . $this->_control . DS . $this->_action .'.php';// we can use it for all  several actions and require several views.

            if(file_exists($View))
            {
               require $View;

            }
            else
            {
                require VIEW_PATH . DS .  'notfound ' . DS . 'noview.php';
            }

        }

    }

}

