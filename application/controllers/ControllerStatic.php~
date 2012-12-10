<?php

class ControllerStatic extends Controller 
{
  
    function __construct()
    {
        $this->modelName = 'ModelStatic';

    }


    function actionContext($actionParams)
    {
        $data['categories'] = $this->model->getTemplateCategories();
        if (isset($actionParams['page'])) {
            // или контент или 0 
            $data['content'] =  $this->model->getPageContentByUrl($actionParams['page']);
            if ($data['content']) {
               $this->view->generate('TemplateMain.php','StaticView.php', $data);
            }  else {
               $this->view->generate('Template404.php','StaticView.php', $data);
            }          
           
       }
    }

}
