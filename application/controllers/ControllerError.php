<?php

class ControllerError extends Controller
{

   
    function actionIndex()
    {
        $this->view->generate('Template404.php');
    }
}
