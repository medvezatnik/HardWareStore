<?php

//Pre-Renderring Actions
class PRA {


    static function cookieToSessions() 
    {
        if (!empty($_COOKIE['userCookie']) ) {
            if( empty($_SESSION['userCookie']) ) {
                $dbc = PRA::connectDb();
                $userQuery = $dbc->prepare('SELECT * FROM users WHERE cookie = :cookie');
                $userQuery->execute(array(':cookie' => $_COOKIE['userCookie']));
                if ($userQuery->rowCount() == 1) {
                    $_SESSION['userCookie'] = $_COOKIE['userCookie'];
                    $_SESSION['userName'] = $_COOKIE['userName'];
                    
                }
            }
         }    
        
       
    


    }

    static function connectDb()
    {
        try {
            $dbc = new PDO('mysql:host=localhost;dbname=hardwareStore;charset=utf8','root','xtkz,f');
        } catch (PDOException $expMsg) {
            die('Не могу подключиться к базе данных<br />'.$expMsg->getMessage());
          }
       $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $dbc->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

       return $dbc;
    }

    static function isAuthorized()
    {
        $result = false;

        if (!empty($_SESSION['userCookie'])) {
                $dbc = PRA::connectDb();
                $userQuery = $dbc->prepare('SELECT * FROM users WHERE cookie = :cookie AND admin = :adminRights');
                $userQuery->execute(array(':cookie' => $_SESSION['userCookie'], ':adminRights' => 'yes' ));
                if ($userQuery->rowCount() == 1) {
                    $result = true;
                }
       
        }

        return $result;
    }

}
