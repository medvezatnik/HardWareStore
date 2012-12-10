<?php

class ControllerProducts extends Controller
{
    function __construct()
    {
        $this->modelName = "ModelProducts";
    }


    function actionIndex($actionParams)
    {   
         if (PRA::IsAuthorized()) {
             if (empty($actionParams['page'])) {
                 $actionParams['page'] = 1;
             }
             $data['products'] = $this->model->getProductList($actionParams['page'],5); // 1 аргумент - номер страницы, второй - количество позиций на странице
             $data['pr'] = $this->model->getPaginationList(5,5,$actionParams['page']);
             $this->view->generate('TemplateAdmin.php','IndexView.php', $data);
         } else {
             $this->view->generate('Template404.php','IndexView.php');
         }
    }
 
    function actionEdit($actionParams)
    {
        if (PRA::IsAuthorized()) {
            if (isset($actionParams['id'])) {
                if ($this->model->doesProductExist($actionParams['id'])) {
                    $data['product'] = $this->model->getProductById($actionParams['id']) ;
                    $data['categories'] = $this->model->getCategories();
                    $this->view->generate('TemplateAdmin.php','EditView.php', $data);
                } else {
                    $data['msg'] = 'Записи с таким идентификационным номером не существует';
                    $this->view->generate('TemplateAdmin.php','ErrorView.php', $data);
                }
            } else {
                $data['msg'] = 'Идентификационный номер редактируемой записи не указан';
                $this->view->generate('TemplateAdmin.php','ErrorView.php', $data);
            }
        } else {
            $this->view->generate('Template404.php','IndexView.php');
        }
    }

    function actionDoEdit($actionParams)
    {
        $data = array();
        $data['msg'] = '';
        if (PRA::IsAuthorized()) {
            if (isset($actionParams['id'])) {
                if ($this->model->doesProductExist($actionParams['id'])) {
                    if ($_FILES['picture']['size'] > 0) {
                        $picture = $_FILES['picture'];
                    
                         if ($picture['type'] == 'image/gif' || $picture['type'] == 'image/png' || $picture['type'] == 'image/jpeg') {
                 
                             $uploadFile = '/home/medvezatnik/sites/kinco2300/images/products/pic' . $productId . '.jpg';
                             if ($picture['size'] <= 204800) {
                                 if($this->model->updateProductPicture($picture, $productId)) {
                                     $pictureResult = true;         
                                 } else {
                                     $data['msg'] .= 'Не удается загрузить картинку на сервер. Проверьте права доступа к каталогу. ';
                                     $pictureResult = false;
                                 }
                    
                             } else {
                                 $data['msg'] .= 'Картинка должна не должна быть больше 200 кб ';
                                 $pictureResult = false;
                             }
                         } else {
                             $data['msg'] .= 'Картинка должна быть в форматах: gif, png, jpeg ';
                             $pictureResult = false;
                         }
                  
                    } else {
                        $pictureResult = true;
                    }

                    if ($this->model->updateProduct($_POST)) {
                        $productResult = true; 
                    } else {
                        $productResult = false;
                        $data['msg'] .= 'Что-то пошло не так, проверьте, пожалуйста, еще раз входные данные ';
                    }

                    if ($productResult  && $pictureResult) {
                        $_SESSION['msg'] = 'Запись успешно обновлена';
                        header('Location: /products');     
                    } else {
                        $data['product'] = $_POST;
                        $this->view->generate('TemplateAdmin.php','EditView.php', $data);
                    }
    
                } else {
                    $data['msg'] = 'Продукта с таким идентификационным номером не существует';
                    $this->view->generate('TemplateAdmin.php','ErrorView.php', $data);
                }
    
             } else {
                 $data['msg'] = 'Идентификационный номер редактируемого товара не указан';
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
                if ($this->model->doesProductExist($actionParams['id'])) {
                    $data['productId'] = $actionParams['id'];
                    $this->view->generate('TemplateAdmin.php','DeleteView.php',$data);
                } else {
                    $data['msg'] = 'Записи с таким идентификационным номером не существует';
                    $this->view->generate('TemplateAdmin.php','ErrorView.php', $data);
                }
            } else {
                $data['msg'] = 'Идентификационный номер удаляемой записи не указан';
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
                header('Location: /products/');
            } else {
                if ($_POST['submit'] == 'Да') {
                
                    if (ctype_digit($actionParams['id'])) {
                        if ($this->model->doesProductExist($actionParams['id'])) {   
                            if ($this->model->deleteProduct($actionParams['id'])) {
                                $result = true;
                             } else {
                                $result = false;
                             }
                        } else {
                            $result = false;
                        }
                      
                    } else {
                        $result = false;
                    }
    
                    if ($result) {
                        $_SESSION['msg'] = 'Запись успешно удалена';
                        header('Location: /products/');
                    } else {
                        $data['msg'] = 'Не получается удалить запись. Вы что-то делаете не так.';         
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
             $data['categories'] = $this->model->getCategories();
             $this->view->generate('TemplateAdmin.php','CreateView.php', $data);
         } else {
             $this->view->generate('Template404.php','IndexView.php');
         }         
    }

    function actionDoCreate()
    {
        if (PRA::IsAuthorized()) {
            $result = true;
            if (!empty($_POST['submit'])) {
                $requiredFields = array('name', 'categoryId', 'description', 'price', 'amount', 'special');
                foreach ($requiredFields as $field)
                {
                     if (empty($_POST[$field])) {
                         $result = false;
                         break;
                     } 
                }
                if ($result) {
                
                        if($_FILES['picture']['size'] > 0) {
                              if ($_FILES['picture']['type'] == 'image/gif' || $_FILES['picture']['type'] == 'image/png' || $_FILES['picture']['type'] == 'image/jpeg') {
                                     if ($_FILES['picture']['size'] <= 204800) {
                                         if($this->model->createProduct($_POST, $_FILES['picture'])) {
                                             $_SESSION['msg'] = 'Новый товар создан';
                                             header('Location: /products/');
                                         } else {
                                             $_SESSION['msg'] = 'Во время создания товара что-то пошло не так';
                                         }
                                     } else { 
                                         $_SESSION['msg'] = 'Картинка должна не должна быть больше 200 кб ';
                                     } 
                              } else {
                                  $_SESSION['msg'] = 'Разрешенные форматы картинок: png, gif, jpeg';
                              }
    
                        } else {
                            $_SESSION['msg'] = 'Необходимо вставить картинку для добавления продукта';
                        }
                   
                } else {
                    $_SESSION['msg'] = 'Для создания продукта продукта необходимо заполнить все поля';
                }
            } 
        } else {
            $this->view->generate('Template404.php','IndexView.php');
        }
      
    }
    


}
