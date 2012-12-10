<?php

class ModelCart extends Model
{
    private $dbc;
 
    function __construct()
    {
      $this->dbc = PRA::connectDb();
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

    function productExists($productId)
    {
        
        try {

            $productQuery = $this->dbc->prepare("SELECT * FROM products WHERE product_id = :productId" );
            $productQuery->execute(array(':productId' => $productId));

        } catch (PDOException $expMsg) {
          die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        }
         
        if ($productQuery->rowCount() == 1) {
            $productExists = true;
        } else {
            $productExists = false;
        }
        return $productExists;
    
    }

    function getCartList($prodIdsArr)
    {
       $shopList = array();
      

       try {
            $productQuery = $this->dbc->prepare("SELECT * FROM products WHERE product_id = :productId" );
            foreach ($prodIdsArr as $productId => $productAm)
            {
                $productQuery->execute(array(':productId' => $productId));
                $product = $productQuery->fetch();
                $product['amount'] = $productAm;
                $shopList[] = $product;
                
            }
        } catch (PDOException $expMsg) {
          die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        }
         
       return $shopList;
    }

   function getUserIdByCookie($cookie)
   {
        try {

            $userQuery = $this->dbc->prepare("SELECT user_id FROM users WHERE cookie = :cookie");
            $userQuery->execute(array(':cookie' => $cookie));
            $userId = $userQuery->fetch();
          
        } catch (PDOException $expMsg) {
          die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        }

       return $userId['user_id'];
   }

   function sendOrder($userId, $products)
   {
      try {
            $this->dbc->beginTransaction();
            $orderQuery = $this->dbc->prepare("INSERT INTO orders (user_id, order_status, order_placed) VALUE (:userId, :orderStatus, NOW())");
            $orderQuery->execute(array(':userId' => $userId, ':orderStatus' => 'В обработке'));

            $orderQuery = $this->dbc->prepare("SELECT order_id FROM orders WHERE user_id = :userId ORDER BY order_placed DESC LIMIT 1 ");
            $orderQuery->execute(array(':userId' => $userId));
            $orderId = $orderQuery->fetch();
            $orderId = $orderId['order_id'];

            for($i=0;$i<count($products['cartProdIds']);$i++)
            {
                $orderQuery = $this->dbc->prepare("INSERT INTO ordprod (order_id, product_id) VALUE (:orderId, :productId)");
                $orderQuery->execute(array(':orderId' => $orderId, ':productId' => $products['cartProdIds'][$i]));
            }

            $moneyQuery = $this->dbc->prepare("SELECT money FROM users WHERE user_id = :userId");
            $moneyQuery->execute(array(':userId' => $userId));
            $money = $moneyQuery->fetch();
            $money = $money['money'];            
          
            for($i=0;$i<count($products['cartProdIds']);$i++)
            {
                $moneyQuery = $this->dbc->prepare("SELECT price FROM products WHERE product_id = :prodId ");
                $moneyQuery->execute(array(':prodId' => $products['cartProdIds'][$i]));  
                $product =  $moneyQuery->fetch();     

                $money -= $product['price'] * $products['cartProdAmount'][$i];
               
            }
            $moneyQuery = $this->dbc->prepare("UPDATE users SET money = :money WHERE user_id = :userId");
            $moneyQuery->execute(array(':money' => $money,':userId' => $userId));

            if ($this->dbc->commit()) {
                return true;
            }  else {
                return false;
            }    
        } catch (PDOException $expMsg) {
         $this->dbc->rollback(); 
          die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        }


   }

   function isOrderProcessable($userId, $products)
   {
         try {

            $orderQuery = $this->dbc->prepare("SELECT money FROM users WHERE user_id = :userId");
            $orderQuery->execute(array(':userId' => $userId));
            $money = $orderQuery->fetch();
            $money = $money['money'];            
          
            for($i=0;$i<count($products['cartProdIds']);$i++)
            {
                $orderQuery = $this->dbc->prepare("SELECT price FROM products WHERE product_id = :prodId ");
                $orderQuery->execute(array(':prodId' => $products['cartProdIds'][$i]));  
                $product =  $orderQuery->fetch();     

                $money -= $product['price'] * $products['cartProdAmount'][$i];
               
            }
        } catch (PDOException $expMsg) {
          die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        }

       if ($money < 0) {
           return 0;
       } else {
           return 1;
       }

   }


   function areParamsValid($params)
   {
       
       for($i=0;$i<count($params['cartProdAmount']);$i++)
       {
           if(!ctype_digit($params['cartProdAmount'][$i]) || !ctype_digit($params['cartProdIds'][$i])
           ) {
               return 0;
           }
           
       }
       return 1;
   }

   function getUserAddressByCookie($cookie)
   {
       try {
            $addressQuery = $this->dbc->prepare("SELECT address_id FROM users WHERE cookie = :cookie" );      
            $addressQuery->execute(array(':cookie' => $cookie)); 
            $address = $addressQuery->fetch();
   
            $addressQuery = $this->dbc->prepare("SELECT * FROM addresses WHERE address_id = :addressId" );      
            $addressQuery->execute(array(':addressId' => $address['address_id']));    
            $address = $addressQuery->fetch();
        } catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

        
          
        return $address;

   }
}
