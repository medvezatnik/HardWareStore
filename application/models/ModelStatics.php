<?php

class ModelStatics extends Model
{

    private $dbc;
 
    function __construct()
    {
      $this->dbc = PRA::connectDb();
    }

    function getStaticPages()
    {
       try {

            $staticPagesQuery = $this->dbc->prepare("SELECT * FROM static_pages" );      
            $staticPagesQuery->execute();    
        
        } catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

        $staticPages = $staticPagesQuery->fetchall();
          
        return $staticPages;
    }

    function doesStaticPageExist($staticPageId)
    {
        try {

            $staticPageQuery = $this->dbc->prepare("SELECT * FROM static_pages WHERE page_id = :staticPageId" );      
            $staticPageQuery->execute(array(':staticPageId' => $staticPageId));  
   
            if ($staticPageQuery->rowCount() == 1) {
                $result = true;
            } else {
                $result = false;
            }  
        
        } catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

       
          
        return $result;
    }

    function getStaticPageById($staticPageId)
    {
       try {

            $staticPageQuery = $this->dbc->prepare("SELECT * FROM static_pages WHERE page_id = :staticPageId" );      
            $staticPageQuery->execute(array(':staticPageId' => $staticPageId));    
            
            if ($staticPageQuery->rowCount() == 1) {
                $staticPage = $staticPageQuery->fetch();
            }
        } catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

       
          
        return $staticPage;
    }

    function updateStaticPage($staticPage) 
    {
        try {

             $requiredFields = array('pageId', 'pageTitle', 'pageContent', 'pageUrl');

             foreach($requiredFields as $key => $value)
             {
                 if (!isset($staticPage[$value])) {
                     $staticPage[$value] = '';
                 }
             }
             $staticPageQuery = $this->dbc->prepare("UPDATE static_pages SET page_title = :pageTitle, page_content = :pageContent, page_url = :pageUrl WHERE page_id = :pageId" );      
             $staticPageQuery->execute(array(':pageId' => $staticPage['pageId'], ':pageTitle' => $staticPage['pageTitle']. ' ', ':pageContent' => $staticPage['pageContent'], ':pageUrl' => $staticPage['pageUrl']));    
            
             if ($staticPageQuery->rowCount() == 1) {
                 $result = true;
             } else {
                $result = false;
             }
        } catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

          
        return $result ;
    }


    function deleteStaticPage($pageId)
    {
        try {

            $deleteQuery = $this->dbc->prepare("DELETE FROM static_pages WHERE page_id = :pageId" );
            $deleteQuery->execute(array(':pageId' => $pageId));
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

    function createStaticPage($staticPage)
    {
        try {

             $requiredFields = array('pageTitle', 'pageContent', 'urlTitle', 'page_url');

             foreach($requiredFields as $key => $value)
             {
                 if (!isset($staticPage[$value])) {
                     $staticPage[$value] = '';
                 }
             }
             $staticPageQuery = $this->dbc->prepare("INSERT INTO static_pages(page_title, page_url, page_content) VALUES (:pageTitle, :urlTitle , :pageContent)");      
             $staticPageQuery->execute(array(':pageTitle' => $staticPage['pageTitle'], ':urlTitle' => $staticPage['urlTitle'], ':pageContent' => $staticPage['pageContent']));    
            
             if ($staticPageQuery->rowCount() == 1) {
                 $result = true;
             } else {
                $result = false;
             }
        } catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 

          
        return $result ;

    }
 
    function isStaticPageNameUnique($pageTitle) 
    {
       try {

            $staticPageQuery = $this->dbc->prepare("SELECT * FROM static_pages WHERE page_title = :staticPageTitle" );      
            $staticPageQuery->execute(array(':staticPageTitle' => $pageTitle));  
   
            if ($staticPageQuery->rowCount() == 1) {
                $result = true;
            } else {
                $result = false;
            }  
        
        } catch (PDOException $expMsg) {

            die('Не могу выполнить запрос<br />' . $expMsg->__toString());
        } 
    }

}
