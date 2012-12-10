<?php

class ControllerStore extends Controller
{

    function __construct()
    {
      $this->modelName = 'ModelStore';
        
    }
 
 
    function actionIndex ()
    {
      $data = array();
      $data['categories'] = $this->model->getTemplateCategories();
      $data['specials'] = $this->model->getContentSpecials();
      $data['newArrs'] = $this->model->getContentNewArr();      // New arrivals - новые поставки
   
      
      $this->view->generate('TemplateMain.php','IndexView.php', $data);
    }

    function actionCategory($actionParams)
    {  

       // Нужно написать еще тучу всяких тестов и в случае чего сразу кидать 404. Обработка ошибок не нужна.
        if (isset($actionParams['order']) && ($actionParams['order'] == 'asc' || $actionParams['order'] == 'desc')) {
            $data['order'] = $actionParams['order'];
        } else {
            $actionParams['order'] = '';
            $data['order'] = '';
        }
        
        if (isset($actionParams['by']) && ($actionParams['by'] == 'name' || $actionParams['by'] == 'price')) {
            $data['by'] = $actionParams['by'];
        } else {
            $actionParams['by'] = '';
            $data['by'] = ''; 
            
        }
        
        $data['products'] = $this->model->getProductsByCat($actionParams['id'],$actionParams['by'], $actionParams['order']);
     
            $data['categories'] = $this->model->getTemplateCategories();
            $this->view->generate('TemplateMain.php','CategoryView.php', $data);
            
        

    }

    function actionProduct($actionParams)
    {   
        $result = true;
        if(ctype_digit($actionParams['id'])) {
           $data['product'] = $this->model->getProductById($actionParams['id']);
            if(!empty($data['product'])) {
                $data['categories'] = $this->model->getTemplateCategories();
                $this->view->generate('TemplateMain.php','ProductView.php', $data);
                $_SESSION['msg'] = '';
            } else {
                $this->view->generate('Template404.php','IndexView.php');
            }
        } else {
            $this->view->generate('Template404.php','IndexView.php');
        }

        
    }


}
