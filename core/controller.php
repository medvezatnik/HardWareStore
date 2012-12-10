<?php

class Controller 
{
    public $view;
    public $model;
    public $modelName;
    protected $registry;

    function __construct()
    {
       $this->modelName = 'Model';
    }

    function initialize($registry)
    {
        $this->registry = $registry; 
        if (!empty($this->modelName)) {
           $this->model = new $this->modelName();
        }

       
        $this->view = new View(get_class($this));
        
    }

    function actionIndex()
    {
    }

    


}
