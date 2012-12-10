<?php

class ModelStore extends Model
{
    private $dbc; 
    private $query;

    function __construct()
    {
        $this->dbc = PRA::connectDb();
    }

    function getUserData($key, $value = '')
    {
        $result = array();
        
        try {

            $query = $this->dbc->prepare("SELECT * FROM mismatch_user WHERE user_id = :value" );
            $query->bindValue(':value', '20');
            $query->execute();

        } catch (PDOException $expMsg) {
          die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        }
      
        while ($row = $query->fetch())
        {
            $result[] = $row;
        }
          
        return $result;
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


    function getContentSpecials()
    {
      
        $data = array();
     
        try {

            $specialsQuery = $this->dbc->prepare("SELECT product_id, name, picture FROM products WHERE special = 1 LIMIT 4" );
            $specialsQuery->execute();
        } catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

        while ($special = $specialsQuery->fetch())
        {
            $data[] = $special ;
        }
    
        return $data;
    }



    function getContentNewArr()
    {
        $data = array();

        try {

            $newArrQuery = $this->dbc->prepare("SELECT product_id, name, picture, price FROM products ORDER BY date_added DESC LIMIT 5" );
            $newArrQuery->execute();
        } catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

        while ($newArr = $newArrQuery->fetch())
        {
            $data[] = $newArr ;
        }
    
        return $data;
    }

    function getProductsByCat($catId, $sortParam = 'product_id', $direcParam ='ASC')
    {
        
        $data = array();
        $sortParam = strtolower($sortParam);
        $direcParam = strtolower($direcParam);

        if ( ($sortParam <> 'name') && ($sortParam <> 'price') ) {
            $sortParam = 'product_id';
            $direcParam = 'ASC';
        }
        else {
            if(($direcParam <> 'desc') && ($direcParam <> 'asc')) {
               $direcParam = 'ASC';
            }
                 
        }
       
        try {

            $productsByCatQuery = $this->dbc->prepare("SELECT product_id, name, picture, category_id, price FROM products WHERE category_id = :cat_id ORDER BY $sortParam $direcParam" );
                
            $productsByCatQuery->execute(array(':cat_id' => $catId));

        } catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

        while ($productByCat = $productsByCatQuery->fetch())
        {
            $data[] = $productByCat ;
        }

        

        return $data;
    }


    function getProductById($productId)
    {

        try {
            $productByIdQuery = $this->dbc->prepare("SELECT * FROM products WHERE product_id = :productId LIMIT 1" );
                
            $productByIdQuery->execute(array(':productId' => $productId));

        } catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

       
    
        return $productByIdQuery->fetch();
    }
    
}
