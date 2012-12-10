<?php

class ModelLogin
{
   private $dbc;

    function __construct()
    {
        try {
            $this->dbc = new PDO('mysql:host=localhost;dbname=hardwareStore;charset=utf8','root','xtkz,f');
        } catch (PDOException $expMsg) {
              die('Не могу подключиться к базе данных<br />'.$expMsg->getMessage());
          }
       $this->dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $this->dbc->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    function getTemplateCategories()
    {
       $data = array();
     
        try {

            $categoryQuery = $this->dbc->prepare("SELECT * FROM categories" );      
            $categoryQuery->execute();    
        
        } catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

        while ($category = $categoryQuery->fetch())
        {
            $data[] = $category ;
        }
          
        return $data;
    }

    function getUsersNumByEmail($email)
    {

        try {
            $emailQuery = $this->dbc->prepare("SELECT * FROM users WHERE email = :mail");
            $emailQuery->execute(array(':mail' => $email));
            $userNum = $emailQuery->rowCount();
        } catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 
        return $userNum;
    }

    function addNewUser($userInfo)
    {
        try {
            $this->dbc->beginTransaction();
            $addUserQuery = $this->dbc->prepare("INSERT INTO users (firstname, lastname, password,email, rights, phone, mobile_phone) VALUES (:firstname, :lastname, MD5(:password),:email, :rights, :phone, :mobile_phone)");   
   
            $addUserQuery->execute(array(':firstname' => $userInfo['firstname'], ':lastname' => $userInfo['lastname'], ':password' => $userInfo['password1'] . 'solikamsk' ,':email' => $userInfo['email'], ':rights' => 0, ':phone' => $userInfo['phone'], ':mobile_phone' => $userInfo['mobile_phone']));   

            $userIdQuery = $this->dbc->prepare('SELECT user_id FROM users WHERE email = :email');
            $userIdQuery->execute(array(':email' => $userInfo['email']));
            $userId = $userIdQuery->fetch();
            $userId = $userId['user_id'];

            $addAddressQuery = $this->dbc->prepare('INSERT INTO addresses (user_id, country, city, region, postcode, street_address) VALUE (:userId, :country, :city, :region, :postcode, :street_address)');
            $addAddressQuery->execute(array(':userId' => $userId, ':country' => $userInfo['country'], ':city' => $userInfo['city'], ':region' => $userInfo['region'],  ':postcode' => $userInfo['postcode'], ':street_address' => $userInfo['street_address']));    

            $addressIdQuery = $this->dbc->prepare('SELECT address_id FROM addresses WHERE user_id = :userId');
            $addressIdQuery->execute(array(':userId' => $userId));
            $addressId = $addressIdQuery->fetch();
            $addressId = $addressId['address_id'];
 
            $userAddressQuery = $this->dbc->prepare('UPDATE users SET address_id = :addressId WHERE user_id = :userId');
            $userAddressQuery->execute(array(':addressId' => $addressId, 'userId' => $userId));
 
            $this->dbc->commit();
        } catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

    }


    function userExists($email, $password)
    {
        
        try {

                $userQuery = $this->dbc->prepare("SELECT * FROM users WHERE email = :email AND password = MD5(:password)" );      
                $userQuery->execute(array(':email' => $email, ':password' => $password . 'solikamsk')); 

                          

            }   
        
            catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

        return $userQuery->rowCount();
    }

    function insertNewUserCookie($email, $password)
    {
        try {
                $cookie = md5(time().$email.$password);

                $newCookieQuery = $this->dbc->prepare("UPDATE users SET cookie = :cookie WHERE email = :email AND password = MD5(:password)" );      
                $newCookieQuery->execute(array(':email' => $email, ':password' => $password . 'solikamsk', ':cookie' => $cookie)); 

                if ($newCookieQuery->rowCount() == 1) {
                    $newCookie = $cookie;
                } else {
                    $newCookie = false;
                }             

            }   
        
            catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 
        return $newCookie;
    }


    function checkUserCookie($cookie)
    {
        try {

                $cookieQuery = $this->dbc->prepare("SELECT firstname, lastname,email, rights, phone, mobile_phone FROM users WHERE cookie = :cookie" );      
                $cookieQuery->execute(array(':cookie' => $cookie)); 

                if ($cookieQuery->rowCount() == 1) {
                    $cookieSet = 1;
                } else {
                    $cookieSet = 0;
                }             

            }   
        
            catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

        return $cookieSet;   

    }

    function getUserDataByCookie($cookie)
    {

        try {

                $cookieQuery = $this->dbc->prepare("SELECT user_id, firstname, lastname, email, rights, address_id, phone, mobile_phone FROM users WHERE cookie = :cookie" );      
                $cookieQuery->execute(array(':cookie' => $cookie)); 

                if ($cookieQuery->rowCount() == 1) {
                    $userData = $cookieQuery->fetch();
                } else {
                    $cookieSet = 0;
                }   

                $addressQuery = $this->dbc->prepare("SELECT * FROM addresses WHERE user_id = :userId" );      
                $addressQuery->execute(array(':userId' => $userData['user_id']));
                
                          
                $userData = array_merge($userData, $addressQuery->fetch());
            }   
        
            catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

        return $userData;   

    }


    function changeUserData($userData)
    {
        print_r($userData);
    }
}


