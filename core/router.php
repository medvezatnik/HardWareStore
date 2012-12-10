<?php 

class Route 
{
    function start()
    {
        // Инициализируем контролер и действие по-умолчанию       
        $action = 'Index';
        $controller = 'Store';
        $registry = new Registry(); 
        $actionParams = array();
        session_start();
        PRA::cookieToSessions();
        //Выраваем из урла имена контроллера и действия     
        $uriParams = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        
        if (!empty($uriParams[0])) {
            $controller = $uriParams[0];
        }

        if (!empty($uriParams[1])) {
            $action = $uriParams[1];
        }
        $errorFile = 'application/templates/Template404.php';
        
        // Отставляем в массиве только параметры для всего экшена
        $uriParams = array_slice($uriParams, 2, count($uriParams));
      
        for ($i=0;$i<=count($uriParams)-1;$i=$i+2)
        {
          if (!array_key_exists($uriParams[$i], $actionParams)) {
              if(isset($uriParams[$i+1])) {
                  $actionParams[$uriParams[$i]] = $uriParams[$i+1];
             }
          }
        }
        $registry['uriParams'] = $uriParams;

        //Собираем имена контролера и действия
        $controllerName = 'Controller' . ucfirst($controller);
        $actionName = 'action' . ucfirst($action);
        
        //Расчехляем требуемый контроллер
        $controllerFile = 'application/controllers/' . $controllerName . '.php';
        if (!is_file($controllerFile)) {
             $controllerFile = 'application/controllers/ControllerError.php';
             $controllerName = 'ControllerError'; 
             $actionName = 'actionIndex';
        }

        include $controllerFile;
        //Создаем экземлер контроллера
 
        $controller = new $controllerName();
        

       //Вынимаем из чулана модель связанную с вызванным контроллером
       $model_name = $controller->modelName;
       if (!empty($model_name)) {
           $modelFile = 'application/models/' . $model_name . '.php';

            if (is_file($modelFile)) {
                include $modelFile; 
            }
       }
      
       //Инициализируем контроллер и производим действие
       $controller->initialize($registry); 
       $controller->$actionName($actionParams);  


          
                 

    }

    





}

?>
