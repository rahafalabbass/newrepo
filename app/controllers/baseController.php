<?php
namespace app\baseControllers;
class BaseController
{
    protected $model;
    
    public function load_view($view,$args)
    {
        require_once __DIR__.'\..\..\views\\'.$view.'.html';
        
    }
   
   
}

?>