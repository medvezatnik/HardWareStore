<?php

class View
{
    private $controllerName;

    function __construct($controllerName)
    {
        // Убираем из имени контроллера слово Controller, чтобы по-царски задать директорию в методе generate
        $this->controllerName = str_replace('Controller', '', $controllerName);         
    }

    function generate($templateView, $contentView = '', $data = 0)
    {
        $contentView = "application/views/$this->controllerName/$contentView";
        include 'templates/' . $templateView;
    }

}
