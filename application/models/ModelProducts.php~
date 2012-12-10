<?php 
class ModelProducts extends Model
{
    private $dbc;

    function __construct()
    {
        $this->dbc = PRA::connectDb();
    }

    function getProductList($page, $pageProd)
    {
       try {
            
            $productQuery = $this->dbc->prepare("SELECT * FROM products" );
            $productQuery->execute();
            $products = $productQuery->rowCount();
            
            if (ceil($products / $pageProd) < $page) {
                $page = ceil($products / $pageProd);
            }
            
            $productQuery = $this->dbc->prepare("SELECT * FROM products LIMIT :startProd, :pageProd" );
            
            $productQuery->bindValue(':startProd', ($page-1)*$pageProd, PDO::PARAM_INT);
            $productQuery->bindValue(':pageProd', $pageProd, PDO::PARAM_INT);
            $productQuery->execute();

            $products = array();
            while($product = $productQuery->fetch())
            {
                $products[] = $product;
            }

        } catch (PDOException $expMsg) {
          die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        }

        
         
    
        return $products;
    }

    function getPaginationList($prodOnPage, $neighbours=0, $page=0)
    {
        try {

            $productQuery = $this->dbc->prepare("SELECT COUNT(*) AS 'counter' FROM products" );
            $productQuery->execute();
            $products = $productQuery->fetch();
            $products = $products['counter'];
            

        } catch (PDOException $expMsg) {
          die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        }
        $pages = ceil($products/$prodOnPage);

         if ($page <  0) { 
             $page = 1;
         } elseif ($page > $pages) {
             $page = $pages;
         }
         $leftNeighbour = $page - $neighbours;
         if ($leftNeighbour < 1) {   
             $leftNeighbour = 1;
         }
         $rightNeighbour = $page + $neighbours;
         if ($rightNeighbour > $pages) {
             $rightNeighbour = $pages;
         }
         $pageArr = array();
         for ($i=$leftNeighbour;$i<=$rightNeighbour;$i++)
         {
             $pageArr[] = $i;
         }
         
        
        return $pageArr;
    }

    function getProductById($productId) 
    {
          try {

            $productQuery = $this->dbc->prepare("SELECT * FROM products WHERE product_id = :productId LIMIT 1" );
            $productQuery->execute(array(':productId' => $productId));
            $product = $productQuery->fetch();
            
            if ($productQuery->rowCount() == 1) {
                return $product;
            } else {
                return 0;
            }

        } catch (PDOException $expMsg) {
          die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        }
  

    }

    function getCategories()
    {
         try {

            $categoriesQuery = $this->dbc->prepare("SELECT * FROM categories" );
            $categoriesQuery->execute();
            $categories = $categoriesQuery->fetchAll();
            
            

        } catch (PDOException $expMsg) {
          die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        }
          
        return $categories;
    }

    function updateProduct($product)
    {
          
            $acceptedKeys = array('name','description','сategoryId','price','amount','special','productId');

            foreach ($acceptedKeys as $key)
            {
                if (!isset($product[$key])) {
                    $product[$key] = ' ';
                }
            }
           
        try {
            $productQuery = $this->dbc->prepare("UPDATE products SET name = :name, description = :description, category_id = :categoryId, price = :price, amount = :amount, special = :special WHERE product_id = :product_id" );
            $productQuery->execute(array(':name' => $product['name'], ':description' => $product['description'] . ' ', ':categoryId' => $product['сategoryId'], ':price' => $product['price'], ':amount' => $product['amount'], ':special' => $product['special'], ':product_id' => $product['product_id']));
            
            if ($productQuery->rowCount() == 1) { 
                $result = true;
            } else {
                $result = false;
            }

        } catch (PDOException $expMsg) {
          die('Не могу выполнить запрос<br />' . $expMsg->__toString());
          $result = false;
        }

        return $result;    
    }

    function updateProductPicture($picture, $productId)
    {
      
        $uploadFile = '/home/medvezatnik/sites/kinco2300/images/products/pic' . $productId . '.jpg';    
        if (move_uploaded_file($picture['tmp_name'], $uploadFile)) {
            $result = true;
        }
             
        return $result;
    }

    function deleteProduct($productId)
    {
        try {

            $deleteQuery = $this->dbc->prepare("DELETE FROM products WHERE product_id = :productId" );
            $deleteQuery->execute(array(':productId' => $productId));
            if ($deleteQuery->rowCount() == 1) {
                $result = true;
            } else {
                $result = false;
            }
            

        } catch (PDOException $expMsg) {
          die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        }
        return $result;
    }

    function doesProductExist($productId)
    {
        try {

            $deleteQuery = $this->dbc->prepare("SELECT * FROM products WHERE product_id = :productId" );
            $deleteQuery->execute(array(':productId' => $productId));
            if ($deleteQuery->rowCount() == 1) {
                $result = true;
            } else {
                $result = false;
            }
            

        } catch (PDOException $expMsg) {
          die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        }
        return $result;
    }


    function createProduct($productArr, $picture) 
    {

         $uploadPath = '/home/medvezatnik/sites/kinco2300/';
         $uploadFile = 'images/products/pic' . (time() - rand(-1000000, 1000000000)) . '.jpg';
   
         if (move_uploaded_file($picture['tmp_name'], $uploadPath.$uploadFile)) {
             $pictureResult = true;
         }
         
         
         try {
            $this->dbc->beginTransaction();
            $createQuery = $this->dbc->prepare("INSERT INTO products(name, description, picture, category_id, price, amount, special, date_added) VALUES (:productName, :productDescription, :productPicture, :productCategoryId, :productPrice, :productAmount, :productSpecial, NOW())" );
            $productParams = array(':productName' => $productArr['name'],':productDescription' => $productArr['description'], ':productPicture' => $uploadFile , ':productCategoryId' => $productArr['categoryId'], ':productPrice' => $productArr['price'], ':productAmount' => $productArr['amount'], ':productSpecial' => $productArr['special']);
            
            if ($createQuery->execute($productParams)) {
                $productResult = true;
            } else {
                $productResult = false;
            }
            
            if ($pictureResult && $productResult) {
                $result = true;
                $this->dbc->commit();
            }

        } catch (PDOException $expMsg) {
          die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        }
        return $result;

    }

  
} 
