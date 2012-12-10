<?php

class ModelCategories extends Model
{
    private $dbc;

    function __construct()
    { 
        $this->dbc = PRA::connectDB();
    }

    function getCategories()
    {   
     
        try {

            $categoryQuery = $this->dbc->prepare("SELECT * FROM categories" );      
            $categoryQuery->execute();    
        
        } catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

        $categories = $categoryQuery->fetchall();
          
        return $categories;
    }

    function doesCategoryExist($categoryId)
    {
        try {

            $categoryQuery = $this->dbc->prepare("SELECT * FROM categories WHERE category_id = :categoryId" );      
            $categoryQuery->execute(array(':categoryId' => $categoryId));  
   
            if ($categoryQuery->rowCount() == 1) {
                $result = true;
            } else {
                $result = false;
            }  
        
        } catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

       
          
        return $result;
    }

    function getCategoryById($categoryId)
    {
       try {

            $categoryQuery = $this->dbc->prepare("SELECT * FROM categories WHERE category_id = :categoryId" );      
            $categoryQuery->execute(array(':categoryId' => $categoryId));    
            
            if ($categoryQuery->rowCount() == 1) {
                $category = $categoryQuery->fetch();
            }
        } catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

        $categories = $categoryQuery->fetchall();
          
        return $category;
        
    }

    function updateCategory($category)
    {
         try {
             $requiredField = array('category_id', 'name');

             foreach($requiredField as $key => $value)
             {
                 if (!isset($category[$value])) {
                     $category[$value] = '';
                 }
             }
             $categoryQuery = $this->dbc->prepare("UPDATE categories SET category_name = :categoryName WHERE category_id = :categoryId" );      
             $categoryQuery->execute(array(':categoryId' => $category['category_id'], ':categoryName' => $category['name']. ' '));    
            
             if ($categoryQuery->rowCount() == 1) {
                 $result = true;
             } else {
                $result = false;
             }
        } catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

          
        return $result ;
    }

    function deleteCategory($categoryId)
    {
        try {
            $this->dbc->beginTransaction(); 
            $deleteQuery = $this->dbc->prepare("DELETE FROM categories WHERE category_id = :categoryId" );
            $deleteQuery->execute(array(':categoryId' => $categoryId));
            if ($deleteQuery->rowCount() == 1) {
                $result = true;
            } else {
                $result = false;
            }
            $deleteQuery = $this->dbc->prepare("UPDATE products SET category_id = :emptyCatField WHERE category_id = :categoryId" );
            $deleteQuery->execute(array(':categoryId' => $categoryId, ':emptyCatField' => 0));
            if (!$this->dbc->commit()) {
                $result = false;
            }

        } catch (PDOException $expMsg) {
          die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        }
        return $result;

    }

    function createCategory($categoryName)
    {
        try {
            $createQuery = $this->dbc->prepare("INSERT INTO categories(category_name) values (:categoryName)");
            $createQuery->execute(array(':categoryName' => $categoryName));
            
            if ($createQuery->rowCount() == 1) {
               $result = true;
            } else {
               $result = false;
            }

        } catch (PDOException $expMsg) {
          die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        }
        return $result;
        
    }


}
