<?php

class ControllerAdmin extends Controller
{
    function __construct()
    {
        $this->modelName = "ModelProducts";
    }


    function actionIndex($actionParams)
    {   
         if (PRA::IsAuthorized()) {
             $this->view->generate('TemplateAdmin.php','IndexView.php');
         } else {
             $this->view->generate('Template404.php','IndexView.php');
         }
    }

    

}  

