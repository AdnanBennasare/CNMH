<?php

namespace App\Http\Controllers;

class AppBaseController extends Controller
{
    public function callAction($method, $parameters){
        $controller = class_basename(get_class($this));
        $controller = str_replace('Controller', '', $controller);
        $action = $method;
        $permissions = $action . '-' . $controller;
        $this->authorize($permissions);
        return parent::callAction($method, $parameters);
    }
}
