<?php

class ControllerCategories extends Controller
{

    function __construct()
    {
         $this->modelName = "ModelCategories";
    }

    function actionIndex()
    {
        if (PRA::IsAuthorized()) {
        $data['categories'] = $this->model->getCategories();
        $this->view->generate('TemplateAdmin.php','IndexView.php',$data);
        } else {
            $this->view->generate('Template404.php','IndexView.php');
        }

    }

    function actionEdit($actionParams)
    {
        if (PRA::IsAuthorized()) {
        if (isset($actionParams['id'])) {
            if ($this->model->doesCategoryExist($actionParams['id'])) {
            $data['category'] = $this->model->getCategoryById($actionParams['id']);
            $this->view->generate('TemplateAdmin.php','EditView.php',$data);
            } else {
                $data['msg'] = 'Категории с таким идентификационным номером не существует';
                $this->view->generate('TemplateAdmin.php','ErrorView.php', $data);
            }
        } else {
            $data['msg'] = 'Идентификационный номер редактируемой категория не указан';
            $this->view->generate('TemplateAdmin.php','ErrorView.php', $data);
        }
        } else {
            $this->view->generate('Template404.php','IndexView.php');
        }

    }

    function actionDoEdit($actionParams) 
    {
         if (PRA::IsAuthorized()) {
         if (isset($actionParams['id'])) {
            if ($this->model->doesCategoryExist($actionParams['id'])) {
                if($this->model->updateCategory($_POST)) {
                    $_SESSION['msg'] = 'Категория успешно переминована';
                    header('Location: /categories/');
                }
            } else {
                $data['msg'] = 'Категории с таким идентификационным номером не существует';
                $this->view->generate('TemplateAdmin.php','ErrorView.php', $data);
            }
        } else {
            $data['msg'] = 'Идентификационный номер редактируемой категория не указан';
            $this->view->generate('TemplateAdmin.php','ErrorView.php', $data);
        }
        } else {
            $this->view->generate('Template404.php','IndexView.php');
        }

    }

    function actionDelete($actionParams)
    {
         if (PRA::IsAuthorized()) {
         if (isset($actionParams['id'])) {
            if ($this->model->doesCategoryExist($actionParams['id'])) {
                $data['categoryId'] = $actionParams['id'];
                $this->view->generate('TemplateAdmin.php','DeleteView.php', $data);
            } else {
                $data['msg'] = 'Категории с таким идентификационным номером не существует';
                $this->view->generate('TemplateAdmin.php','ErrorView.php', $data);
            }
         } else {
            $data['msg'] = 'Идентификационный номер редактируемой категория не указан';
            $this->view->generate('TemplateAdmin.php','ErrorView.php', $data);
         }
         } else {
            $this->view->generate('Template404.php','IndexView.php');
         }
         
         
    }
 
    function actionDoDelete($actionParams)
    {
         if (PRA::IsAuthorized()) {
             if ($_POST['submit'] == 'Нет' || !isset($_POST['submit'])) {
                 header('Location: /categories/');
             } else {
                  if ($_POST['submit'] == 'Да') {      
                      if ($this->model->doesCategoryExist($actionParams['id'])) {   
                          if ($this->model->deleteCategory($actionParams['id'])) {
                              $result = true;
                          } else {
                              $result = false;
                          }
                  
                      } else {
                          $result = false;
                      }
    
                      if ($result) {
                          $_SESSION['msg'] = 'Запись успешно удалена';
                          header('Location: /categories/');
                      } else {
                          $data['msg'] = 'Не получается удалить категорию. Вы что-то делаете не так.';          
                          $this->view->generate('TemplateAdmin.php','DeleteView.php', $data);
                      }
            }
    
            }
       } else {
            $this->view->generate('Template404.php','IndexView.php');
       }

   }

   function actionCreate()
   {
       if (PRA::IsAuthorized()) {
           $this->view->generate('TemplateAdmin.php','CreateView.php');
       } else {
           $this->view->generate('Template404.php','IndexView.php');
       }
   }
       function actionDoCreate()
       {
           if (PRA::IsAuthorized()) {
           if (!empty($_POST['categoryName'])) {
               if ($this->model->createCategory($_POST['categoryName'])) {
                   $result = true;
                   $_SESSION['msg'] = 'Новая категория добавлена';
               }
           } else {
               $result = false;
               $data['msg'] = 'Вы не указали название новой категории';  
           }
           if ($result) {
               header('Location: /categories/');
           } else {
               $this->view->generate('TemplateAdmin.php','ErrorView.php', $data);
           }
       } else {
            $this->view->generate('Template404.php','IndexView.php');
       }

   }
}  
